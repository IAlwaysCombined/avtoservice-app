<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\AutoResources;
use App\Http\Resources\EducationResources;
use App\Models\Auto;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return EducationResources::collection(Education::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EducationRequest $request
     * @return EducationResources
     */
    public function store(EducationRequest $request): EducationResources
    {
        $create_education = Education::create($request->validated());
        return new EducationResources($create_education);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return EducationResources
     */
    public function show(int $id): EducationResources
    {
        return new EducationResources(Education::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EducationRequest $request
     * @return string[]
     */
    public function update(EducationRequest $request): array
    {
        $education = Education::find($request -> id);
        $education -> range = $request -> range;
        $education -> date = $request -> date;
        $education -> faculty = $request -> faculty;
        $education -> speciality = $request -> speciality;
        $result = $education -> save();
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
        $education = Education::find($id);
        $result = $education -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
