<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_thnajaran')->insert([
            [
                'idthnajaran' => 1,
                'thnajaran' => '2022/2023',
                'tglmulai' => '2022-07-01',
                'tglakhir' => '2023-06-30',
            ],
            [
                'idthnajaran' => 2,
                'thnajaran' => '2023/2024',
                'tglmulai' => '2023-07-01',
                'tglakhir' => '2024-06-30',
            ],
            [
                'idthnajaran' => 3,
                'thnajaran' => '2024/2025',
                'tglmulai' => '2024-07-01',
                'tglakhir' => '2025-06-30',
            ],
            [
                'idthnajaran' => 4,
                'thnajaran' => '2025/2026',
                'tglmulai' => '2025-07-01',
                'tglakhir' => '2026-06-30',
            ],
            [
                'idthnajaran' => 5,
                'thnajaran' => '2026/2027',
                'tglmulai' => '2026-07-01',
                'tglakhir' => '2027-06-30',
            ],
            [
                'idthnajaran' => 6,
                'thnajaran' => '2027/2028',
                'tglmulai' => '2027-07-01',
                'tglakhir' => '2028-06-30',
            ],
        ]);
    }
}
