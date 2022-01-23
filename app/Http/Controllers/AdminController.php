<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->status != 'admin') {
            return abort(404);
        }
        $foods = Food::get();
        return view('admin.food', compact('foods'));
    }

    public function food()
    {
        return view('admin.home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inputFood');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'namefood' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'required',
        ];

        $messages = [
            'namefood.required' => 'Nama harus diisi',
            'namefood.string' => 'Nama harus berupa text',
            'stock.required' => 'Stok harus diisi',
            'stock.integer' => 'Stok harus berupa angka',
            'price.required' => 'Harga harus diisi',
            'price.integer' => 'Harga harus berupa angka',
            'category.required' => 'Kategori harus diisi',
            'category.string' => 'Kategori harus berupa text',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

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
            return redirect()->route('admin');
        } else {
            Session::flash('error', 'Input Gagal!');
            return redirect()->route('admin-add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('admin.details', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('admin.editFood', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $rules = [
            'namefood' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category' => 'required|string',
            'description' => 'required|string',
        ];

        $messages = [
            'namefood.required' => 'Nama harus diisi',
            'namefood.string' => 'Nama harus berupa text',
            'stock.required' => 'Stok harus diisi',
            'stock.integer' => 'Stok harus berupa angka',
            'price.required' => 'Harga harus diisi',
            'price.integer' => 'Harga harus berupa angka',
            'category.required' => 'Kategori harus diisi',
            'category.string' => 'Kategori harus berupa text',
            'description.required' => 'Deskripsi harus diisi',
            'description.string' => 'Deskripsi harus berupa text',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if ($request->image == null || $request->image == '') {
            $food = Food::find($food->id);
            $food->namefood = $request->namefood;
            $food->stock = $request->stock;
            $food->price = $request->price;
            $food->description = $request->description;
            $food->category = $request->category;
        } else {
            $destination = 'images/foods/';
            File::delete(public_path($destination . '/' . $food->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/foods/'), $imageName);
            $food = Food::find($food->id);
            $food->namefood = $request->namefood;
            $food->stock = $request->stock;
            $food->price = $request->price;
            $food->description = $request->description;
            $food->category = $request->category;
            $food->image = $imageName;
        }





        $save = $food->save();

        if ($save) {
            Session::flash('success', 'Input Berhasil!');
            return redirect()->route('admin');
        } else {
            Session::flash('error', 'Input Gagal!');
            return redirect()->route('admin/edit/{id}');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $destination = 'images/foods/';
        File::delete(public_path($destination . '/' . $food->image));
        $food->delete();
        return redirect()->route('admin');
    }
}
