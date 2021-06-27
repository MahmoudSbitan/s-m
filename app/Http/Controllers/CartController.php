<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        @$data = array(
            'title' => "Cart",
        );
        return view('cart.cart')->with($data);
    }

    public function payment()
    {
        @$data = array(
            'title' => "Payment",
        );
        return view('cart.payment')->with($data);
    }

    public function addToCart($id)
    {
        $item = item::find($id);

        if(!$item) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "id" => $item->id,
                        "title" => $item->title,
                        "quantity" => 1,
                        "price" => $item->price,
                        "img" => $item->img
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Added successfully!!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Added successfully!!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $item->id,
            "title" => $item->title,
            "quantity" => 1,
            "price" => $item->price,
            "img" => $item->img
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Added successfully!!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Updated successfully!!');
        }
    }

    public function buy(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Delete successfully!!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Delete successfully!!');
        }
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
     
    *public function update(Request $request, $id)
    *{

    *}
    */

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
