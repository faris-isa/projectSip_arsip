<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_barang' => $this->nama_barang,
            'harga_satuan' => $this->harga_satuan,
            'photo' => $this->photo,
            'created_at' => $this->created_date,
            'updated_at' => $this->updated_at,
        ];
    }
}
