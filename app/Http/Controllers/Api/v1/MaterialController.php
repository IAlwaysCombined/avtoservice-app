<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Http\Resources\EducationResources;
use App\Http\Resources\InvoiceResources;
use App\Http\Resources\MaterialResources;
use App\Models\Auto;
use App\Models\Education;
use App\Models\Invoice;
use App\Models\Material;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return MaterialResources::collection(Material::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MaterialRequest $request
     * @return MaterialResources
     */
    public function store(MaterialRequest $request): MaterialResources
    {
        $create_material = Material::create($request -> validated());
        return new MaterialResources($create_material);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MaterialResources
     */
    public function show(int $id): MaterialResources
    {
        return new MaterialResources(Material::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MaterialRequest $request
     * @return string[]
     */
    public function update(MaterialRequest $request): array
    {
        $material = Material::find($request -> id);
        $material -> date = $request -> date;
        $material -> wight = $request -> wight;
        $material -> code = $request -> code;
        $result = $material -> save();
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
        $material = Material::find($id);
        $result = $material -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
