<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room')->insert([
            [
                'id' => 1,
                'department_id' => 1,
                'name_room' => 'A101',
            ],

            [
                'id' => 2,
                'department_id' => 1,
                'name_room' => 'A102',
            ],

            [
                'id' => 3,
                'department_id' => 2,
                'name_room' => 'A103',
            ],

            [
                'id' => 4,
                'department_id' => 2,
                'name_room' => 'A104',
            ],

            [
                'id' => 5,
                'department_id' => 3,
                'name_room' => 'A105',
            ],

            [
                'id' => 6,
                'department_id' => 3,
                'name_room' => 'A106',
            ],

            [
                'id' => 7,
                'department_id' => 4,
                'name_room' => 'A201',
            ],

            [
                'id' => 8,
                'department_id' => 4,
                'name_room' => 'A202',
            ],

            [
                'id' => 9,
                'department_id' => 5,
                'name_room' => 'A203',
            ],

            [
                'id' => 10,
                'department_id' => 5,
                'name_room' => 'A204',
            ],

            [
                'id' => 11,
                'department_id' => 6,
                'name_room' => 'A205',
            ],


            [
                'id' => 12,
                'department_id' => 6,
                'name_room' => 'A206',
            ],

            [
                'id' => 13,
                'department_id' => 7,
                'name_room' => 'B101',
            ],

            [
                'id' => 14,
                'department_id' => 7,
                'name_room' => 'B102',
            ],

            [
                'id' => 15,
                'department_id' => 8,
                'name_room' => 'B103',
            ],

            [
                'id' => 16,
                'department_id' => 8,
                'name_room' => 'B104',
            ],

            [
                'id' => 17,
                'department_id' => 9,
                'name_room' => 'B105',
            ],
            [
                'id' => 18,
                'department_id' => 9,
                'name_room' => 'B106',
            ],

            [
                'id' => 19,
                'department_id' => 10,
                'name_room' => 'B201',
            ],

            [
                'id' => 20,
                'department_id' => 10,
                'name_room' => 'B202',
            ],

        ]);
    }
}
