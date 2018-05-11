<?php

namespace App\Http\Controllers;

use App\Main;
use App\Http\Requests\StoreMainRequest;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Main::all();
      return view('categories.categoriesList', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('categories.categoryForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainRequest $request)
    {
      Main::create([
        'title' =>$request->input('title')
      ]);
      return redirect()->route('adminCategories.page')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $category)
    {
      return view('categories.categoryForm',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMainRequest $update, Main $category)
    {
      $category->update([
        'title' =>$update->input('title'),

      ]);

      return redirect()->route('adminCategories.page')->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main $category)
    {
      $category->delete();
      return redirect()->route('adminCategories.page')->with('success','Category Deleted');
    }
}
