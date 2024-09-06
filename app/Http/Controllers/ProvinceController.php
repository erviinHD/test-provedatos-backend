<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\ProvinceResource;
use App\Interfaces\ProvincesRepositoryInterface;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    private ProvincesRepositoryInterface $provinceRepositoryInterface;
    public function __construct(ProvincesRepositoryInterface $provinceRepositoryInterface)
    {
        $this->provinceRepositoryInterface = $provinceRepositoryInterface;
    }

    public function index()
    {
        $data = $this->provinceRepositoryInterface->index();

        return ApiResponseClass::sendResponse(ProvinceResource::collection($data), '', 200);
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
    public function store() {}

    /**
     * Display the specified resource.
     */
    public function show($id) {}

    /**
     * Display the specified resource.
     */
    public function search(Request $request) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update() {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
