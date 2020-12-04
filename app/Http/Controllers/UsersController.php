<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\UserLink;

class UsersController extends Controller
{
    //ユーザー一覧の表示
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);

        return view('users.index', [
            'all_users'  => $all_users
        ]);
    }
    //ユーザー詳細画面の表示
    public function show(User $user, UserLink $userLink)
    {
        //リンク情報の取得
        $links = $userLink->getUserLinks($user->id);

        //最終更新日
        $lastUpdateDate = $user->updated_at;
        foreach($links as $link) {
            if ($link->updated_at > $lastUpdateDate){
                $lastUpdateDate = $link->updated_at;
            }
        }

        return view('users.show', [
            'user'      => $user,
            'links'    => $links,
            'lastUpdateDate'  => $lastUpdateDate
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit',[
            'user'      => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'screen_name'   => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
            'name'          => ['required', 'string', 'max:255'],
            'profile_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)]
        ]);
        $validator->validate();
        $user->updateProfile($data);

        return redirect('users/'.$user->id);
    }
}
