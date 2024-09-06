<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserSearchResource;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepositoryInterface;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function index()
    {
        $data = $this->userRepositoryInterface->index();

        return ApiResponseClass::sendResponse(UserResource::collection($data), '', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $imagePath = 'images/' . $imageName;
            } else {
                $imagePath = null;
            }

            $dateOfBirth = $request->date_birth;
            $age = \Carbon\Carbon::parse($dateOfBirth)->age;
            $status = ($age > 50) ? 'RETIRADO' : 'VIGENTE';


            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'code' => rand(1000, 9999),
                'status' => $status,
                'last_name' => $request->last_name,
                'dni' => $request->dni,
                'province' => $request->province,
                'date_birth' => $request->date_birth,
                'observation' => $request->observation,
                'date_start' => $request->date_start,
                'role' => $request->role,
                'department' => $request->department,
                'province_work' => $request->province_work,
                'salary' => $request->salary,
                'part_time' => filter_var($request->part_time, FILTER_VALIDATE_BOOLEAN),
                'observation_work' => $request->observation_work,
                'image' => $imagePath
            ];
            DB::beginTransaction();

            $user = $this->userRepositoryInterface->store($details);

            DB::commit();
            return ApiResponseClass::sendResponse(new UserResource($user), 'User Create Successful', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = $this->userRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new UserResource($user), '', 200);
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $name = $request->query('name');
        $code = $request->query('code');

        try {
            $data = $this->userRepositoryInterface->getBySearch($name, $code);

            return ApiResponseClass::sendResponse(UserSearchResource::collection($data), 'Search Successful', 200);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request,  $id)
    {
        try {
          
            $dateOfBirth = $request->date_birth;
            $age = \Carbon\Carbon::parse($dateOfBirth)->age;
            $status = ($age > 50) ? 'RETIRADO' : 'VIGENTE';

            $updateDetails = [
                'name' => $request->name,
                'email' => $request->email,
                'status' => $status,
                'last_name' => $request->last_name,
                'dni' => $request->dni,
                'province' => $request->province,
                'date_birth' => $request->date_birth,
                'observation' => $request->observation,
                'date_start' => $request->date_start,
                'role' => $request->role,
                'department' => $request->department,
                'province_work' => $request->province_work,
                'salary' => $request->salary,
                'part_time' => filter_var($request->part_time, FILTER_VALIDATE_BOOLEAN),
                'observation_work' => $request->observation_work,
            ];
            DB::beginTransaction();

            $user = $this->userRepositoryInterface->update($updateDetails, $id);

            DB::commit();
            return ApiResponseClass::sendResponse('User Update Successful', '', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->userRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('User Delete Successful', '', 204);
    }
}
