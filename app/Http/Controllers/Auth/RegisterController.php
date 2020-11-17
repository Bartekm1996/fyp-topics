<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Logging\LoggerFactory;
use App\Models\FypEvent;
use App\Models\FypEventState;
use App\Models\Profile;
use App\Models\Progress;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->createUserAndProfile($user);
        if($user->role == 0) {
            $this->createFypUserEvents($user);
        }

        return $user;
    }

    private function createFypUserEvents($user) {
        $events = FypEvent::orderBy('startdate','asc')->get();
        $isFirst = false;

        /*
         * The user must complete all the events in the fyp event list
         */
        foreach ($events as $event) {
            $state = new FypEventState();
            $state->fypevent_id = $event->id;
            $state->user_id = $user->id;
            $state->save();

            if(!$isFirst) {
                //Set progress to the first item in the list
                $progress = new Progress();
                $progress->fypevent_state_id = $state->id;
                $progress->user_id = $state->user_id;
                $progress->lastupdated = now();
                $progress->save();
                $isFirst = true;
            }
        }
    }
    private function createUserAndProfile($user) {

        //Create default profile for user
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->qca = 0;
        $profile->course = '';
        $profile->image = '';

        if(strpos($user->email, '@studentmail.ul.ie') == true) {
            $profile->student_id = str_replace('@studentmail.ul.ie','', $user->email);
            $user->role = 0;
        } else if (strpos($user->email, '@ul.ie') == true) {
            $user->role = 1;
        }

        $profile->save();
        $user->save();//update the role for user

        LoggerFactory::getLogger(LoggerFactory::LOGGER_DB)
            ->info('RegisterController::create', "{$user->email} has registered. Role:{$user->role}");
    }
}
