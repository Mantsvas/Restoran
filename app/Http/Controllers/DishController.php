<?php

namespace App\Http\Controllers;


use App\Dish;
use App\Main;
use App\Http\Requests\StoreDishRequest;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes = Dish::all();
      return view('dishes.dishList', compact('dishes'));
    }

    public function adminIndex()
    {
      $dishes = Dish::all();
      

      return view('admin.dishList', compact('dishes','mains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mains = Main::all();
        return view('dishes.dishForm',compact('mains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {

      Dish::create([
        'name' =>$request->input('name'),
        'description'=>$request->input('description'),
        'price'=>$request->input('price'),
        'main_id'=>$request->input('main_id'),
        'photourl'=>$request->input('photourl'),

      ]);
      return redirect()->route('adminDishes.page')->with('success','Dish Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('dishes.dish', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {

        $mains = Main::all();
        return view('dishes.dishForm',compact('dish','mains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDishRequest $update, Dish $dish)
    {

      $dish->update([
        'name' =>$update->input('name'),
        'description'=>$update->input('description'),
        'price'=>$update->input('price'),
        'main_id'=>$update->input('main_id'),
        'photourl'=>$update->input('photourl')
      ]);

      return redirect()->route('adminDishes.page')->with('success','Dish Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {

      $dish->delete();
      return redirect()->route('adminDishes.page')->with('success','Dish Deleted');
    }
}
