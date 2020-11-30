<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Profile;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();
        $profile = Profile::all()->where('user_id', '=', auth()->id())->first();

        $req = \App\TopicRequests\Request::all()
            ->where('user_id', $user->id)
            ->where('state', \App\TopicRequests\Request::SUCCESS)
            ->first();

        if($req) {
            $topic = Topic::all()->where('id', $req->topic_id)->first();
            $supervisor = User::all()->where('id', $req->supervisor_id)->first();

            return view('profile.edit')
                ->with([
                    'user' => $user,
                    'profile' => $profile,
                    'topic' => $topic,
                    'supervisor' => $supervisor,
                ]);
        }

        return view('profile.edit')
            ->with(['user' => $user,
                'profile' => $profile,
                'topic' => null,
                'supervisor' => null
            ]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
