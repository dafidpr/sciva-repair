<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;


class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model\Product|null
     */
    public function model(array $row)
    {
        return new Product([
            //
            'barcode' => $row[1],
            'name' => $row[2],
            'selling_price' => $row[3],
            'purchase_price' => $row[4],
            'member_price' => $row[5],
            'stock' => 0,
            'limit' => $row[6],
            'supplier_id' => $row[7]
        ]);
    }
}
