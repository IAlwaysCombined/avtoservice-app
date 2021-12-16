<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestJobRequest;
use App\Http\Resources\RequestJobResources;
use App\Http\Resources\RequestResources;
use App\Models\Employee;
use App\Models\RequestJob;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RequestJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return RequestJobResources::collection(RequestJob::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RequestJobRequest $request
     * @return RequestJobResources
     */
    public function store(RequestJobRequest $request): RequestJobResources
    {
        $create_request_job = RequestJob::create($request->validated());
        return new RequestJobResources($create_request_job);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RequestJobResources
     */
    public function show(int $id): RequestJobResources
    {
        return new RequestJobResources(RequestJob::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RequestJob $request
     * @return string[]
     */
    public function update(RequestJob $request): array
    {
        $request_job = RequestJob::find($request -> id);
        $request_job -> email = $request -> email;
        $request_job -> phone = $request -> phone;
        $request_job -> name = $request -> name;
        $request_job -> surname = $request -> surname;
        $request_job -> patronymic = $request -> patronymic;
        $request_job -> pass = $request -> pass;
        $request_job -> passport_series = $request -> passport_series;
        $request_job -> passport_number = $request -> passport_number;
        $request_job -> date = $request -> date;
        $request_job -> depart = $request -> depart;
        $request_job -> depart_code = $request -> depart_code;
        $request_job -> date_accept = $request -> date_accept;
        $request_job -> positions_id = $request -> positions_id;
        $request_job -> education_id = $request -> education_id;
        $request_job -> solutions_id = $request -> solutions_id;
        $result = $request_job -> save();
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
        $requestjob = RequestJob::find($id);
        $result = $requestjob -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
