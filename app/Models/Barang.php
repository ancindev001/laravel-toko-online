<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [];


    function getAllBarang()
    {
        return $this->all();
    }


    function saveBarang(array $data)
    {
        return $this->create($data);
    }

    function getBarang($id)
    {
        return $this->find($id)->first();
    }

    function deleteBarang($id)
    {
        return $this->destroy($id);
    }

    function updateBarang(array $data, int $id)
    {
        return $this::where('id', $id)->update($data);
    }
}
