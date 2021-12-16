<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolutionRequest;
use App\Http\Resources\AutoResources;
use App\Http\Resources\ServiceResources;
use App\Http\Resources\SolutionResources;
use App\Models\Auto;
use App\Models\Service;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return SolutionResources::collection(Solution::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SolutionRequest $request
     * @return SolutionResources
     */
    public function store(SolutionRequest $request)
    {
        $create_solution = Solution::create($request->validated());
        return new SolutionResources($create_solution);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return SolutionResources
     */
    public function show(int $id): SolutionResources
    {
        return new SolutionResources(Solution::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SolutionRequest $request
     * @return string[]
     */
    public function update(SolutionRequest $request): array
    {
        $solition = Solution::find($request -> id);
        $solition -> solution = $request -> solution;
        $solition -> request_jobs_id = $request -> request_jobs_id;
        $result = $solition -> save();
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
        $solution = Solution::find($id);
        $result = $solution -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
