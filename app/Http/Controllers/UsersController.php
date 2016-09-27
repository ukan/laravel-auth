<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Hash;
use Session;
use App\Http\Requests\UsersRequesrt;

use App\User;
use Sentinel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequesrt $request)
    {

        $data = new User();
        $data = $request->all();
        $user = Sentinel::RegisterAndActivate($data);
 //       dd($data);
        $user->save();
        Session::flash('notice', 'Signup Success');
/*
        $data = $request->all();
        $validate = Validator::make($data, User::valid());
        if($validate->fails()) {
          return redirect()->to('users/create')->withErrors($validate)->withInput();
        } else {
          $user = new User;
          $user->email = $request->email;
          $user->username = $request->username;
          $user->password = Hash::make($request->password);
          $user->save();
          */
          return redirect()->to('/login');
          // return Redirect::to('users/create');
        //}
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function login(){
        return view('sessions.create');
    }

    public function home(){
        return view('home');
    }
}