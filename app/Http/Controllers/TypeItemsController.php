<?php

namespace App\Http\Controllers;

use App\Models\TypeItems;
use Illuminate\Http\Request;

class TypeItemsController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $type_item = new TypeItems();

        $type_item->type_item = $request->type_item;
        $type_item->volume_id = $request->volume_id;

        $type_item->save();

        return redirect()->route('projects.volumes.show', $request->volume_id);
    }

    public function show(TypeItems $typeItems){

    }

    public function edit(TypeItems $typeItems){

    }

    public function update(Request $request, TypeItems $typeItems){

    }

    public function destroy(TypeItems $typeItems){

    }
}
