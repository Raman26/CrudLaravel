<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([ 
            [
                'name'=>'John Smith',
                'email'=>'info@john.com',
                'company_id'=>'1',
                'phone'=>'983793729',
                'created_at' => now()
            ],
            [
                'name'=>'Peter',
                'email'=>'info@peter.com',
                'company_id'=>'2',
                'phone'=>'96888686',
                'created_at' => now()
            ]
            ]);
    }
}
