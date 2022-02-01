<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResources;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResources::collection($this->user->get());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return UserResources
     */
    public function show(int $id): UserResources
    {
        return new UserResources($this->user->findOrFail($id));
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
