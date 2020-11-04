<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Transmission;
use Illuminate\Http\Request;

class CarController extends Controller
{

   public function listFilters(){

       $res = new \Illuminate\Http\Response();

       $filters = [
            'brands'=>$res->setContent(Brand::all()),
            'models'=>$res->setContent(CarModel::all()),
            'transmissions'=>$res->setContent(Transmission::all()),
           'colors'=>$res->setContent(Color::all()),
       ];

       return $filters;
   }

   public function applyFilters(Request $request){

       $filters = $request->all();
       return $filters;
   }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
