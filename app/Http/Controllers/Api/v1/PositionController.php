<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use App\Http\Resources\InvoiceResources;
use App\Http\Resources\PositionResources;
use App\Models\Auto;
use App\Models\Education;
use App\Models\Invoice;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return PositionResources::collection(Position::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionRequest $request
     * @return PositionResources
     */
    public function store(PositionRequest $request)
    {
        $create_position = Position::create($request->validated());
        return new PositionResources($create_position);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return PositionResources
     */
    public function show(int $id): PositionResources
    {
        return new PositionResources(Position::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionRequest $request
     * @return string[]
     */
    public function update(PositionRequest $request)
    {
        $position = Position::find($request -> id);
        $position -> name = $request -> name;
        $position -> salary = $request -> salary;
        $position -> role = $request -> role;
        $result = $position -> save();
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
        $position = Position::find($id);
        $result = $position -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
