<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Http\Resources\AutoResources;
use App\Http\Resources\EducationResources;
use App\Http\Resources\EmployeeResources;
use App\Http\Resources\InvoiceResources;
use App\Models\Auto;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return InvoiceResources::collection(Invoice::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InvoiceRequest $request
     * @return InvoiceResources
     */
    public function store(InvoiceRequest $request): InvoiceResources
    {
        $crete_invoice = Invoice::create($request->validated());
        return new InvoiceResources($crete_invoice);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return InvoiceResources
     */
    public function show(int $id): InvoiceResources
    {
        return new InvoiceResources(Invoice::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InvoiceRequest $request
     * @return string[]
     */
    public function update(InvoiceRequest $request)
    {
        $invoice = Invoice::find($request -> id);
        $invoice -> date = $request -> date;
        $invoice -> coast = $request -> coast;
        $invoice -> requests_id = $request -> requests_id;
        $result = $invoice -> save();
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
        $invoice = Invoice::find($id);
        $result = $invoice -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
