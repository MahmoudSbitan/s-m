<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\item;
use Gate;

class ItemController extends Controller
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
            $check = item::all();
                @$data = array(
                    'items' => $check,
                    'title' => "Item Panel",
                );
                return view('admin.items.index')->with($data);
        }
        
        if(Gate::allows('isEmployee')){
            $check = item::all();
                @$data = array(
                    'items' => $check,
                    'title' => "Item Panel",
                );
                return view('admin.items.index')->with($data);
        }
        
        abort(404,"There is error!!");
    }

    public function itemspanel()
    {
        if(Gate::allows('isAdmin')){
            $check = item::all();
                @$data = array(
                    'items' => $check,
                    'title' => "Item Panel",
                );
                return view('seller.items.itemsPanel')->with($data);
        }
        
        if(Gate::allows('isSeller')){
            $check = item::all()->where('user_id',auth()->user()->id);
                @$data = array(
                    'items' => $check,
                    'title' => "Items Panel",
                );
                return view('seller.items.itemsPanel')->with($data);
        }
        
        abort(404,"There is error!!");
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
                    'title' => "Add New Item",
                );
                return view('seller.items.create')->with($data);
        }
        
        if(Gate::allows('isSeller')){
            $check = category::all();
                @$data = array(
                    'categories' => $check,
                    'title' => "Add New Item",
                );
                return view('seller.items.create')->with($data);
        }
        
        abort(404,"There is error!!");
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
        if($request->hasFile('img2')){
        //لحفظ اسم الصورة مع المصدر
        $filenameWithExt = $request->file('img2')->getClientOriginalName();
        //اسم الصورة
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //اسم المصدر
        $extension = $request->file('img2')->getClientOriginalExtension();
        //حفظ الصورة في ملف 
        $fileNameToStore2=$filename.'_'.time().'.'.$extension;
        $path = $request->file('img2')->storeAs('public/photos' , $fileNameToStore2);
        }else{
            $fileNameToStore2 = '--';
        }
        if($request->hasFile('img3')){
        //لحفظ اسم الصورة مع المصدر
        $filenameWithExt = $request->file('img3')->getClientOriginalName();
        //اسم الصورة
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //اسم المصدر
        $extension = $request->file('img3')->getClientOriginalExtension();
        //حفظ الصورة في ملف 
        $fileNameToStore3=$filename.'_'.time().'.'.$extension;
        $path = $request->file('img3')->storeAs('public/photos' , $fileNameToStore3);
        }else{
            $fileNameToStore3 = '--';
        }
        if($request->hasFile('img4')){
        //لحفظ اسم الصورة مع المصدر
        $filenameWithExt = $request->file('img4')->getClientOriginalName();
        //اسم الصورة
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //اسم المصدر
        $extension = $request->file('img4')->getClientOriginalExtension();
        //حفظ الصورة في ملف 
        $fileNameToStore4=$filename.'_'.time().'.'.$extension;
        $path = $request->file('img4')->storeAs('public/photos' , $fileNameToStore4);
        }else{
            $fileNameToStore4 = '--';
        }

        $items = new item;
        $items->title = $request->input('title');
        $items->description = $request->input('description');
        $items->price = $request->input('price');
        if ($request->input('discount') != null) {
            $items->discount = $request->input('discount');
        } else {
            $items->discount = 0;
        }
        
        $items->contact_number = $request->input('contact_number');
        $items->img = $fileNameToStore;
        $items->img2 = $fileNameToStore2;
        $items->img3 = $fileNameToStore3;
        $items->img4 = $fileNameToStore4;
        $items->available = $request->input('available');
        $items->category_id = $request->input('category_id');
        $items->status = "1";
        $items->user_id = auth()->user()->id;
        $items->employee_id = auth()->user()->id;
        $items->save();

        return redirect('/seller/itemPanel')->with('success', 'Added Successfully!!');
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
}
