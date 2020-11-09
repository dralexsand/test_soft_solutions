<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Requests\PostRequests\PostRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Transmission;
use Illuminate\Http\Request;

class CarController extends ApiController
{

    /**
     * CarController constructor.
     * @param Car $model
     */
    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function listFilters()
    {

        $res = new \Illuminate\Http\Response();

        $filters = [
            'brands' => $res->setContent(Brand::all()),
            'models' => $res->setContent(CarModel::all()),
            'transmissions' => $res->setContent(Transmission::all()),
            'colors' => $res->setContent(Color::all()),
        ];

        return $filters;
    }

    public function applyFilters(Request $request)
    {

        $filters = $request->all();
        return $filters;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return parent::delete($id);
    }

    public function create(PostRequest $request)
    //public function create(CarRequest $request)
    {
        $model = new Car();
        $model = $this->fillModelData($model, $request);
        $model->save();
        //return response()->json($model, 201);
        return $this->sendResponse(
            $model,
            'Data successfully validated and has been saved',
            201
        );
    }

    public function getCars(CarRequest $request){

    }

    /*public function index()
    {
        return Car::paginate(20);
    }*/





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



}
