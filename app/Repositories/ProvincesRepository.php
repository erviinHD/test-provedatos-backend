<?php

namespace App\Repositories;

use App\Interfaces\ProvincesRepositoryInterface;
use App\Models\Province;

class ProvincesRepository implements ProvincesRepositoryInterface
{
    public function index()
    {
        return Province::all();
    }
}
