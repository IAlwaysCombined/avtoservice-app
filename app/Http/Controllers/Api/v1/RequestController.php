<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRequest;
use App\Http\Resources\AutoResources;
use App\Http\Resources\PositionResources;
use App\Http\Resources\RequestResources;
use App\Models\Auto;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return RequestResources::collection(\App\Models\Request::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RequestRequest $request
     * @return RequestResources
     */
    public function store(RequestRequest $request): RequestResources
    {
        $create_request = \App\Models\Request::create($request->validated());
        return new RequestResources($create_request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RequestResources
     */
    public function show(int $id): RequestResources
    {
        return new RequestResources(\App\Models\Request::with('material')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RequestRequest $request
     * @return string[]
     */
    public function update(RequestRequest $request): array
    {
        $request_request = \App\Models\Request::find($request -> id);
        $request_request -> decs = $request -> decs;
        $request_request -> autos_id = $request -> autos_id;
        $request_request -> employees_id = $request -> employees_id;
        $result = $request_request -> save();
        if($result){
            return (['result' => 'Данные обновленны']);
        }
        else{
            return  (['result' => 'Неудачно']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string[]
     */
    public function destroy(int $id): array
    {
        $request = \App\Models\Request::find($id);
        $result = $request -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
