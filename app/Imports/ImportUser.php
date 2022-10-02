<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
 
class ImportUser implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
     
        return new User([
            'name' => $row["nama"],
            'email' => $row["email"],
            'password' => bcrypt($row["password"]),
        ]);
       
    }
}
