<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        //mi porta alla vista index dei tipi
        return view('admin/technologies/index',compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/technologies/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        // dd($request);

        $request->validated();

        $newTechElement = new Technology();

         
        $newTechElement->titolo = $request['titolo'];  
        $newTechElement->colore = $request['colore'];

        $newTechElement->save();

        return redirect()->route("admin.technologies.show", $newTechElement->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //con questo commando posso avere accesso a tutti i posts che hanno una determinata tecnologia
        // questo grazie al fatto che nel model "Technology.php" ho creato una relazione 
        // dd($technology->posts);


        //mi porta alla vista index dei tipi
        return view('admin/technologies/show',compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view("admin/technologies/edit",compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTechnologyRequest $request, string $id)
    {
          // dd($request);

         $request->validated();

         $newTechElement = Technology::find($id);
 
          
         $newTechElement->titolo = $request['titolo'];  
         $newTechElement->colore = $request['colore'];
 
         $newTechElement->save();
 
         return redirect()->route("admin.technologies.show", $newTechElement->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        //
    }
}
