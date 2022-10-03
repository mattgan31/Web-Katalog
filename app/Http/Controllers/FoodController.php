<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::get();
        // $foods = DB::table('foods')->get();
        return view('User.food', compact('foods'));
        // dd($foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.inputFood');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/foods/'), $imageName);

        $food = new Food;
        $food->namefood = $request->namefood;
        $food->stock = $request->stock;
        $food->image = $imageName;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->category = $request->category;

        $save = $food->save();

        if ($save) {
            Session::flash('success', 'Input Berhasil!');
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Input Gagal!');
            return redirect()->route('add-food');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
