<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user){

        return view('profiles.show')
        ->with('user',$user)
        ->with('tweets',$user->tweets()->paginate(10));

    }

    public function edit(User $user){

        $this->authorize('edit',$user);
        return view('profiles.edit',compact('user'));

    }

    public function update(User $user){

        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],

            'name' => ['string', 'required', 'max:255'],

            'avatar' => ['file'],

            'cover' => ['file'],

            'bio' => ['string','max:500'],

            'country' => ['string'],

            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
                //will ignore current user , Rule for unique
            ],

            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);


        if (request('avatar')) {

            $avatar_file = request('avatar');

            $new_avatar = time().$avatar_file->getClientOriginalName();

            $avatar_file->move('public/storage/avatars/',$new_avatar);

            $attributes['avatar'] = 'public/storage/avatars/'.$new_avatar;
        }

        if (request('cover')) {

            $cover_file = request('cover');

            $new_cover = time().$cover_file->getClientOriginalName();

            $cover_file->move('public/storage/avatars/',$new_cover);

            $attributes['cover'] = 'public/storage/avatars/'.$new_cover;
        }


        $user->update($attributes);

        return redirect()->route('profile',compact('user'));

    }
}
