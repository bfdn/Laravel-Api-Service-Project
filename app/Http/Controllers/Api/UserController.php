<?php

namespace App\Http\Controllers\Api;


use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserController\CreateRequest;
use App\Http\Requests\UserController\DeleteRequest;
use App\Http\Requests\UserController\GetAllRequest;
use App\Http\Requests\UserController\GetByIdRequest;
use App\Http\Requests\UserController\GetProfileRequest;
use App\Http\Requests\UserController\UpdateRequest;
use App\Interfaces\Eloquent\IUserService;
use http\Env\Request;

class UserController extends Controller
{
    use HttpResponse;
    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll(GetAllRequest $request)
    {
        $response = $this->userService->getAll();
        return $this->httpResponse($response);
    }

    public function getById(GetByIdRequest $request)
    {
        $response = $this->userService->getById(
            id: $request->id
        );
        return $this->httpResponse($response);
    }

    // public function create(string $name, string $email, string $password)
    public function create(CreateRequest $request)
    {
        $response = $this->userService->create(
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );
        return $this->httpResponse($response);
    }

    public function update(UpdateRequest $request)
    {
        $response = $this->userService->update(
            id: $request->id,
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );
        return $this->httpResponse($response);
    }

    public function delete(DeleteRequest $request)
    {
        $response = $this->userService->delete(
            id: $request->id
        );
        return $this->httpResponse($response);
    }

    public function getProfile(GetProfileRequest $request)
    {
        $response = $this->userService->getProfile();
        return $this->httpResponse($response);
    }
}
