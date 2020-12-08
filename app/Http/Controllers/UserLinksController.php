<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserLink;

class UserLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserLink $userLink)
    {
        $user = auth()->user();
        $linkLists = $userLink->getUserLinks($user->id);

        return view('links.index', [
            'user'      => $user,
            'linkLists' => $linkLists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        return view('links.create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserLink $userLink)
    {
        $user = auth()->user();
        $data = $request->all();
        $validator = Validator::make($data, [
            'link_name' => ['required', 'string', 'max:140'],
            'link'      => ['required', 'string', 'max:255']
        ]);

        $validator->validate();
        $userLink->linkStore($user->id, $data);

        return redirect($user->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, UserLink $userLink)
    {
        $user = auth()->user();
        $links = $userLink->getEditLink($user->id, $id);

        if (!isset($userLink)) {
            return redirect('links');
        }

        return view('links.edit', [
            'user'   => $user,
            'links' => $links
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLink $userLink, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'link_name' => ['required', 'string', 'max:255'],
            'link'      => ['required', 'string', 'max:255']
        ]);

        $validator->validate();
        $userLink->linkUpdate($id, $data);

        return redirect('links');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
