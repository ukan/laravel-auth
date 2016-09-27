<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Http\Requests\UsersRequesrt;
use Hash;
use Session;
use Auth;
use Sentinel;

class SessionsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creds = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if ($user = Sentinel::authenticate($creds)){
            dd($user);
            if (Sentinel::inRole('admin')) {
                return redirect('articles');
            }
            return redirect('articles/create');
        }
        else {
            return redirect('login')->with("error","Username or Password incorrect.")->withInput($request->except('password'));
        }
        
        Session::flash('error', 'Login Fails, User or Password is wrong.');
/*
        $user = Sentinel::getUser();


        $valid = array(
          'email' => 'required',
          'password' => 'required'
        );
        $validate = Validator::make($request->all(), $valid);
        if($validate->fails()) {
          return redirect()->to('login')->withErrors($validate)->withInput();
        }
        if(Auth::attempt(array('email' => $request->email, 'password' => $request->password), ($request->remember ? true : false))) {
          Session::flash('notice', 'Login Success,' . $request->username);
          return redirect()->to('/articles');
          } else {
            Session::flash('error', 'Login Fails, User or Password is wrong.');
            return redirect()->to('/login');
            
          }*/
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
        Auth::logout();
        Session::flash('notice', 'Success Logout');
        return Redirect::to('/');
    }

    public function logout() {
      Auth::logout(); // logout user
      return redirect()->to('login'); //redirect back to login
    }
}
