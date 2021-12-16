<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\SolutionResources;
use App\Http\Resources\UserResources;
use App\Models\Auto;
use App\Models\Solution;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResources::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return UserResources
     */
    public function store(UserRequest $request): UserResources
    {
        $create_user = User::create($request->validated());
        return new UserResources($create_user);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return UserResources
     */
    public function show(int $id): UserResources
    {
        return new UserResources(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @return string[]
     */
    public function update(UserRequest $request): array
    {
        $user = User::find($request -> id);
        $user -> name = $request -> name;
        $user -> surname = $request -> surname;
        $user -> email = $request -> email;
        $user -> pass = $request -> pass;
        $user -> profile_photo_path = $request -> profile_photo_path;
        $result = $user -> save();
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
        $user = User::find($id);
        $result = $user -> delete();
        if($result){
            return ['result' => 'Удалено'];
        }
        else{
            return ['result' => 'Ошибка удаления'];
        }
    }
}
