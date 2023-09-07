<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KantorCabangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'regional' => '1',
                'kode_kantor' => '14',
                'nama_kantor' => 'Jakarta Harmoni',
                'jenis_kantor' => 'KC',
                'alamat' => 'Menara Bank BTN, Jl. Gajah Mada No. 1 Jakarta Pusat 10130',
                'no_telp' => '(021) 6336789, 6332666, 2310490',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ]
        ];

        $this->db->table('kantor_cabang')->insertBatch($data);
    }
}
