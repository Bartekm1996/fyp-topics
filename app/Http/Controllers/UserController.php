<?php

namespace App\Http\Controllers;

use App\Logging\LoggerFactory;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {

        $users = User::all();
        return view('users.index')->with('users', $users);
    }


    public function changeAdminRights()
    {
        $USER_NOT_FOUND = 0;
        $ADMIN_REMOVED = 1;
        $ADMIN_ADDED = 3;
        $FAILED_TO_REMOVE_ADMIN = 2;

        $response = null;
        $user = User::find(request()->get('admin_id'));
        $ops = request()->get('ops');

        if(!$user){
            $response = array('result'=>$USER_NOT_FOUND);
        }else{

            if($ops == 'add'){
                $user->role = 2;
                $res = $user->save();
                $response =  array('result' => $res == 1 ? $ADMIN_REMOVED : $FAILED_TO_REMOVE_ADMIN);
            }elseif($ops == 'remove') {
                $user->role = 1;
                $res = $user->save();
                $response =  array('result' => $res == 1 ? $ADMIN_ADDED : $FAILED_TO_REMOVE_ADMIN);

            }

            LoggerFactory::getLogger(LoggerFactory::LOGGER_DB)
                ->info('UserController::changeAdminRights', "{$user->email} has been ".$ops == 'remove' ? 'removed' : 'added'." as admin");

        }

        return json_encode($response);
    }


}
