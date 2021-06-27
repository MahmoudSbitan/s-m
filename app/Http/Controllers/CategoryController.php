<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Gate;

class CategoryController extends Controller
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
        if(Gate::allows('isAdmin')){
            $check = category::all();
                @$data = array(
                    'categories' => $check,
                    'title' => "Category Panel",
                );
                return view('admin.categories.index')->with($data);
        }else{
            abort(404,"There is error!!");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('isAdmin')){
            $check = category::all();
                @$data = array(
                    'categories' => $check,
                    'title' => "Add New Category",
                );
                return view('admin.categories.create')->with($data);
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
        $this->validate($request, [
            'title' => 'required',
            'img' => 'required',
        ]);
        if($request->hasFile('img')){
        //لحفظ اسم الصورة مع المصدر
        $filenameWithExt = $request->file('img')->getClientOriginalName();
        //اسم الصورة
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //اسم المصدر
        $extension = $request->file('img')->getClientOriginalExtension();
        //حفظ الصورة في ملف 
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        $path = $request->file('img')->storeAs('public/photos' , $fileNameToStore);
        }else{
            $fileNameToStore = '--';
        }

        $categories = new category;
        $categories->title = $request->input('title');
        $categories->img = $fileNameToStore;
        $categories->status = $request->input('status');
        $categories->user_id = auth()->user()->id;
        $categories->save();

        return redirect('/panels/categoryPanel')->with('success', 'Added Successfully!!');
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
        if(Gate::allows('isAdmin')){
            $check = category::find($id);
                @$data = array(
                    'category' => $check,
                    'title' => "Update category number $check->id",
                );
                return view('admin.categories.edit')->with($data);
        }else{
            abort(404,"There is error!!");
        }
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
        $categories = category::find($id);
        if($request->hasFile('img')){
        //لحفظ اسم الصورة مع المصدر
        $filenameWithExt = $request->file('img')->getClientOriginalName();
        //اسم الصورة
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //اسم المصدر
        $extension = $request->file('img')->getClientOriginalExtension();
        //حفظ الصورة في ملف 
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        $path = $request->file('img')->storeAs('public/photos' , $fileNameToStore);
        }else{
            $fileNameToStore = $categories->img;
        }
        if ($request->input('title') != null) {
            $categories->title = $request->input('title');
        }
        if ($request->input('status') != null) {
            $categories->status = $request->input('status');
        }
        if ($request->hasFile('img')) {
            $categories->img = $fileNameToStore;
        }
        $categories->save();

        return redirect('/panels/categoryPanel')->with('success', 'Updated Successfully!!');
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
