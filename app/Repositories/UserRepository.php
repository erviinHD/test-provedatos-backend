<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function getBySearch($name = null, $code = null)
    {
        $query = User::query();
        if ($code) {
            $query->where('code', $code);
        }
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        $result = $query->select('id','name', 'last_name','code', 'status')->get();

        return $result;
    }

    public function store(array $data)
    {
        return User::create($data);
    }

    public function update(array $data, $id)
    {
        return User::whereId($id)->update($data);
    }

    public function delete($id)
    {
        User::destroy($id);
    }
}
