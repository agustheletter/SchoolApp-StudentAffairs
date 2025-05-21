<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_siswa')->insert([
            [
                'idsiswa' => 1,
                'nis' => '123456',
                'nisn' => '9876543210',
                'namasiswa' => 'Ahmad Rafi',
                'tempatlahir' => 'Bandung',
                'tgllahir' => '2005-07-15',
                'jk' => 'L',
                'alamat' => 'Jl. Merdeka No. 10, Bandung',
                'idagama' => 1,
                'tlprumah' => '0221234567',
                'hpsiswa' => '081234567890',
                'photosiswa' => 'ahmad_rafi.jpg',
                'idthnmasuk' => 3,
            ],
            [
                'idsiswa' => 2,
                'nis' => '123457',
                'nisn' => '9876543211',
                'namasiswa' => 'Siti Aisyah',
                'tempatlahir' => 'Jakarta',
                'tgllahir' => '2006-02-20',
                'jk' => 'P',
                'alamat' => 'Jl. Sudirman No. 5, Jakarta',
                'idagama' => 1,
                'tlprumah' => '0217654321',
                'hpsiswa' => '082345678901',
                'photosiswa' => 'siti_aisyah.jpg',
                'idthnmasuk' => 3,
            ],
            [
                'idsiswa' => 3,
                'nis' => '123458',
                'nisn' => '9876543212',
                'namasiswa' => 'Budi Santoso',
                'tempatlahir' => 'Surabaya',
                'tgllahir' => '2007-10-10',
                'jk' => 'L',
                'alamat' => 'Jl. Diponegoro No. 12, Surabaya',
                'idagama' => 2,
                'tlprumah' => '0316543210',
                'hpsiswa' => '083456789012',
                'photosiswa' => 'budi_santoso.jpg',
                'idthnmasuk' => 3,
            ],
            [
                'idsiswa' => 4,
                'nis' => '123459',
                'nisn' => '9876543213',
                'namasiswa' => 'Dewi Lestari',
                'tempatlahir' => 'Semarang',
                'tgllahir' => '2005-12-05',
                'jk' => 'P',
                'alamat' => 'Jl. Pahlawan No. 11, Semarang',
                'idagama' => 3,
                'tlprumah' => '0242233445',
                'hpsiswa' => '081378912345',
                'photosiswa' => 'dewi_lestari.jpg',
                'idthnmasuk' => 3,
            ],
            [
                'idsiswa' => 5,
                'nis' => '123460',
                'nisn' => '9876543214',
                'namasiswa' => 'Rizky Maulana',
                'tempatlahir' => 'Yogyakarta',
                'tgllahir' => '2006-08-18',
                'jk' => 'L',
                'alamat' => 'Jl. Malioboro No. 3, Yogyakarta',
                'idagama' => 1,
                'tlprumah' => '0274123456',
                'hpsiswa' => '085678912345',
                'photosiswa' => 'rizky_maulana.jpg',
                'idthnmasuk' => 3,
            ],
            [
                'idsiswa' => 6,
                'nis' => '123461',
                'nisn' => '9876543215',
                'namasiswa' => 'Lina Sari',
                'tempatlahir' => 'Medan',
                'tgllahir' => '2007-04-25',
                'jk' => 'P',
                'alamat' => 'Jl. Gatot Subroto No. 17, Medan',
                'idagama' => 2,
                'tlprumah' => '0617654321',
                'hpsiswa' => '081234123456',
                'photosiswa' => 'lina_sari.jpg',
                'idthnmasuk' => 3,
            ]
        ]);
    }
}
