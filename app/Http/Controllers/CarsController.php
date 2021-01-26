<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Http\Request\CreateCar;
use Illuminate\Http\Request\UpdateCar;

class CarsController extends Controller
{
    //GET -> MOSTRAR LISTADO DE COCHES
    public function index(Request $request)
    {
        if($request->has('search'))
        {
            $search_car = Cars::where('name', 'like', '%' . $request->search . '%')->get();
        }
        else{
            $search_car = Cars::all();
        }
        return $search_car;
    }

    //POST -> CREAR UN COCHE
    public function store(CreateCar $request)
    {
        $create_car = $request->all();
        Cars::create($create_car);
        return response()->json([
            'res' => true,
            'message' => 'Added Car'
        ], 200);
    }

    //GET -> DEVUELVE UN SOLO COCHE
    public function show(Cars $car)
    {
        return $car;
    }

    //PUT -> ACTUALIZAR COCHES
    public function update(UpdateCar $request, Cars $car)
    {
        $update_car = $request->all();
        $car->update($update_car);
        return response()->json([
            'res' => true,
            'message' => 'Updated Car'
        ], 200);
    }

    //DELETE -> ELIMINAR COCHES
    public function destroy($id)
    {
        Cars::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Deleted Car'
        ], 200);
    }
}
