<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $branch = array(
            [
                'id_branch' => 110,
                'branch' => 'PDB1',
                'nama' => 'Alia Hospital Pondok Bambu'
            ],
            [
                'id_branch' => 117,
                'branch' => 'DPK1',
                'nama' => 'Alia Hospital Depok'
            ]
        );

        Branch::insert($branch);
    }
}
