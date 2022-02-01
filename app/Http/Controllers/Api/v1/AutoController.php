<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\AutoRequest;
use App\Http\Resources\AutoResources;
use App\Models\Auto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AutoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return AutoResources::collection($this->user->auto()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AutoRequest $request
     * @return AutoResources
     */
    public function store(AutoRequest $request): AutoResources
    {
        $create_auto = Auto::create($request->validated());
        return new AutoResources($this->user->auto()->save($create_auto));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return AutoResources
     */
    public function show(int $id): AutoResources
    {
        return new AutoResources($this->user->auto()->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AutoRequest $request
     * @return string[]
     */
    public function update(AutoRequest $request): array
    {
        $auto = Auto::find($request -> id);
        $auto -> vin = $request -> vin;
        $auto -> model = $request -> model;
        $auto -> brand = $request -> brand;
        $auto -> color = $request -> color;
        $auto -> eco = $request -> eco;
        $auto -> user_id = $request -> user_id;
        $result = $auto -> save();
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
        $auto = Auto::find($id);
        $result = $auto -> delete();
        if ($result){
            return ['result' => 'Deleted.'];
        }
        else{
            return ['result' => 'Error.'];
        }
    }
}
