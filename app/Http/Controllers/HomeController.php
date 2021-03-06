<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserLink;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function show($userId, UserLink $userLink)
    {
        $currentUserInfo = DB::table('users')->where('name', $userId)->first();
        $data['userInfo'] = $currentUserInfo;
        $links = $userLink->getUserLinks($data['userInfo']->id);
        $data['links'] = $links;

        $data['created_at'] = substr($data['userInfo']->created_at, 0, -3);

        //最終更新日
        $lastUpdateDate = $data['userInfo']->updated_at;
        foreach($links as $link) {
            if ($link->updated_at > $lastUpdateDate){
                $lastUpdateDate = $link->updated_at;
            }
        }
        $lastUpdateDate = substr($lastUpdateDate, 0, -3);

        $data['lastUpdateDate'] = $lastUpdateDate;
        return view('home', $data);
    }
}
