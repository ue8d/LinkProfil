<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    public function show(User $user)
    {
        $links = $user->getUserLinks(auth()->user()->id);

        return view('users.show', [
            'user'      => $user,
            'user_links'    => $links
        ]);
    }
}
