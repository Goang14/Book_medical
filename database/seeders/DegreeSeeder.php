<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degree')->insert([
            [
                'id' => 1,
                'name' => 'GS.TS',
            ],
            [
                'id' => 2,
                'name' => 'Tiến sĩ',
            ],
            [
                'id' => 3,
                'name' => 'Thạc sĩ',
            ],
            [
                'id' => 4,
                'name' => 'PGS.TS',
            ],
        ]);
    }
}
