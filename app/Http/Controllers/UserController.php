<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{

    public function index()
    {
        return view('layouts.Users.index');
    }
    public function list()
    {
        $users = User::whereUserType(2)->get();
        return DataTables::of($users)
            ->editColumn('created_at',function ($row){
                return   Carbon::create($row->created_at)->format('Y-m-d');
            })
            ->addColumn('action',function ($users){
                $button='';
                if ($users->status == "0"){
                    $button.=' <a href="'. url("change/status/".$users->id) .' "button" class="btn btn-success">Active</a>';
                }else{
                    $button.=' <a href="'. url("change/status/".$users->id) .' " type="button" class="btn btn-danger">Suspend</a>';
                }
                return $button;
            })
            ->editColumn('profile_image',function ($users){
                return ' <img src="'.asset($users->profile_image) .' " height="150px" width="150px" class="ml-5" alt="profile_image">';

            })->editColumn('status',function ($users){
                return $users->status==='0'?"suspend":"active";
            })->rawColumns(['action','profile_image'])->make(true);
    }

    public function ChangeStatus($id){
         $user=User::whereId($id)->first();
         if($user->status==='0'){

             $user->update([
                 'status'=> '1',
             ]);
         }else{
             $user->update([
                 'status'=> '0',
             ]);
         }
        Session::flash('success', 'Status change Successfully');
        return redirect('users');
    }



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
}
