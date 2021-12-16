<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResources;
use App\Models\Auto;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ServiceResources::collection(Service::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return ServiceResources
     */
    public function store(ServiceRequest $request): ServiceResources
    {
        $create_service = Service::create($request->validated());
        return new ServiceResources($create_service);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ServiceResources
     */
    public function show(int $id): ServiceResources
    {
        return new ServiceResources(Service::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @return string[]
     */
    public function update(ServiceRequest $request): array
    {
        $service = Service::find($request -> id);
        $service -> name = $request -> name;
        $service -> coast = $request -> coast;
        $service -> time = $request -> time;
        $result = $service -> save();
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
        $service = Service::find($id);
        $result = $service -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
