<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KantorCabangPembantuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_kantor' => '54',
                'kantor_cabang_id' => '14',
                'nama_kantor' => 'Cikini',
                'jenis_kantor' => 'KCP',
                'klasifikasi_kantor' => 'Kelas 1',
                'alamat' => 'Jl. Raden Saleh Raya No. 39 Jakarta Pusat 10430',
                'no_telp' => '021-31923053',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ]
        ];

        $this->db->table('kantor_cabang_pembantu')->insertBatch($data);
    }
}
