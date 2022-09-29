<?php

namespace App\Imports;

use App\Models\MasterHarga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasterHargaImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $harga=[];
        $estimasi=[];
        foreach(config('servis') as $key => $servis){
            // dd($request["harga_".$key]);
            $harga[$key] = $row["tarif_".strtolower($key)];
            $estimasi[$key] = $row["leadtime_".strtolower($key)];
            
        }

        //dd($row['tarif_reg']);
        $alamat_asal= $row['provinsi_o'].", ".$row['kota_o'].", ".$row['kecamatan_o'].", ".$row['kelurahan_o'];
        $alamat_tujuan= $row['provinsi_d'].", ".$row['kota_d'].", ".$row['kecamatan_d'].", ".$row['kelurahan_d'];
        return new MasterHarga([
            'id'  => "",
            'asal_id'  => $row['asal_id'],
            'tujuan_id' => $row['tujuan_id'],
            'asal_area' => $row['kode_area_o'],
            'tujuan_area' => $row['kode_area_d'],
            'alamat_asal' => $alamat_asal,
            'alamat_tujuan' => $alamat_tujuan,
            'harga' => json_encode($harga),
            'estimasi' => json_encode($estimasi),
        ]);
    }
}
