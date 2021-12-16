<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResources;
use App\Models\Auto;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return EmployeeResources::collection(Employee::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     * @return EmployeeRequest
     */
    public function store(EmployeeRequest $request): EmployeeRequest
    {
        $create_employee = Employee::create($request->validated());
        return new EmployeeRequest($create_employee);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return EmployeeResources
     */
    public function show(int $id): EmployeeResources
    {
        return new EmployeeResources(Employee::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @return string[]
     */
    public function update(EmployeeRequest $request): array
    {
        $employee = Employee::find($request -> id);
        $employee -> email = $request -> email;
        $employee -> phone = $request -> phone;
        $employee -> name = $request -> name;
        $employee -> surname = $request -> surname;
        $employee -> patronymic = $request -> patronymic;
        $employee -> pass = $request -> pass;
        $employee -> passport_series = $request -> passport_series;
        $employee -> passport_number = $request -> passport_number;
        $employee -> date = $request -> date;
        $employee -> depart = $request -> depart;
        $employee -> depart_code = $request -> depart_code;
        $employee -> date_accept = $request -> date_accept;
        $employee -> positions_id = $request -> positions_id;
        $employee -> education_id = $request -> education_id;
        $employee -> solutions_id = $request -> solutions_id;
        $result = $employee -> save();
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
        $employee = Employee::find($id);
        $result = $employee -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
