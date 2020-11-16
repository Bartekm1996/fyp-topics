<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Logging\DbLogger;
use App\Logging\LoggerFactory;
use App\Models\Profile;
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

        //Create default profile for user
        $profile = new Profile();
        $profile->user_id = $user->id; //link to user
        $profile->qca = 0; //link to user
        $profile->course = ''; //link to user
        $profile->image = 'data:image/jpeg;base64,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'; //link to user

        if(strpos($user->email, '@studentmail.ul.ie') == true) {
            $profile->student_id = str_replace('@studentmail.ul.ie','', $user->email);
            $user->role_id = 0;
        } else if (strpos($user->email, '@ul.ie') == true) {
            $user->role_id = 1;
        }

        $profile->save();
        LoggerFactory::getLogger(DbLogger::LOGGER_CODE)
            ->info('RegisterController::create', "{$user->email} has registered. Role:{$user->role_id}");
        return $user;
    }
}
