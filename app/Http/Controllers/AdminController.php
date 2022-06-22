<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function login()
    {
       return view('layouts.login');
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:7',

        ]);
        $remember=$request['remember'];
        try {
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']],$remember)) {
                Session::flash('success', 'Login Successfully');
                return redirect('dashboard');
            } else {
                Session::flash('error', 'Login Failed');
                return redirect('login');
            }
        } catch (\Exception $e) {
            return $e->getMessage() . "on line" . $e->getLine();

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function index()
    {
        $total_user=User::all()->count();
        return view('layouts.dashboard',compact('total_user'));
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


    public function logout(Request $request)
    {
        Auth::logout();
        Session::flash('success','Logout Successfully');
        return redirect('login');
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
