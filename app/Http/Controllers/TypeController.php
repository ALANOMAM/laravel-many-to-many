<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        //mi porta alla vista index dei tipi
        return view('admin/types/index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/types/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
                  // dd($request);

                   $request->validated();

                  $newTypeElement = new Type();
          
                   
                  $newTypeElement->title = $request['title'];  
                  $newTypeElement->description = $request['description'];

                  $newTypeElement->save();
          
                  return redirect()->route("admin.types.show", $newTypeElement->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {   
        //con questo commando posso avere accesso a tutti i posts che hanno un determinato tip
        // questo grazie al fatto che nel model "Type.php" ho creato una relazione 
        // dd($type->posts);


        //mi porta alla vista index dei tipi
        return view('admin/types/show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {

       
        return view("admin/types/edit",compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTypeRequest $request, string $id)
    {
        // dd($request);

        $request->validated();

        $newTypeElement2 = Type::find($id);

         
        $newTypeElement2->title = $request['title'];  
        $newTypeElement2->description = $request['description'];

        $newTypeElement2->save();

        return redirect()->route("admin.types.show", $newTypeElement2->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}
