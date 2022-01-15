<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Family;
use App\Continent;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals=Animal::all();
        return view('Animal.index',compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families=Family::all();
        $continents=Continent::all();
        return view('Animal.create',compact('families','continents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        ['name'=>'required|string',
         'description'=>'required|string'
        ]
        );
        $path=$request->file('image')->store('public/files');
        Animal::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$path,
            'family_id'=>$request->family,
        ]);
        Session::put('message','Animal created successfully');
        return redirect()->route('home.animal.index')->with('message','Animal created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal=Animal::find($id);
        $family=Family::find($animal->family_id);
        // dd($family->libelle);
        return view('Animal.show',compact('animal','family'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal=Animal::find($id);
        $famili=Family::find($animal->family_id);
        // dd($famili->libelle);
        $families=Family::all();
        $continents=Continent::all();
        return view('Animal.edit',compact('animal','families','continents','famili'));
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
        $animal=Animal::find($id);
        $image=$animal->image;
        // dd($image);
        if($request->file('image'))
        {
            Storage::delete($image);
            $image=$request->file('image')->store('public/files');
        }
        $animal->name=$request->name;
        $animal->description=$request->description;
        $animal->image=$image;
        $animal->family_id=$request->family;
        $animal->save();
        return redirect()->route('home.animal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal=Animal::find($id)->delete();
        return redirect()->route('home.animal.index');
    }
}
