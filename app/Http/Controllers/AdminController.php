<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\category;
use Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
     * Show the the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function userspanel()
    {
        if(Gate::allows('isAdmin')){
            $check = User::all();
                @$data = array(
                    'users' => $check,
                    'title' => "Users Panel",
                );
                return view('admin.users.index')->with($data);
        }else{
            abort(404,"There is error!!");
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::allows('isAdmin')){
            $check = User::find($id);
            if ($check != null) {
                @$data = array(
                    'user' => $check,
                    'categories' => category::all()->where('user_id',$check->id),
                    'title' => "Graduation Project",
                );
                return view('admin.users.userInfo')->with($data);
            } else {
                return redirect('/panels/usersPanel')->with('error', 'Error, please try agin later');
            }
        }

        if(Gate::allows('isEmployee')){
            $check = User::find($id);
            if ($check != null) {
                @$data = array(
                    'user' => $check,
                    'categories' => category::all()->where('user_id',$check->id),
                    'title' => "Graduation Project",
                );
                return view('admin.users.userInfo')->with($data);
            } else {
                return redirect('/')->with('error', 'Error, please try agin later');
            }
        }

        abort(404,"There is error!!");
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
        if(Gate::allows('isAdmin')){
            $this->validate($request,[
                'user_type' => 'required',
            ]);
            
            $user = User::find($id);
            $user->user_type = $request->input('user_type');
            $user->save();
            
            return redirect('/panels/usersPanel')->with('success', 'Updated successfully!!');
        }

        abort(404,"There is error!!");
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
