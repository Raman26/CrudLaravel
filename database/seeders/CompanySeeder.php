<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([ 
            [
                'name'=>'Soni',
                'email'=>'info@soni.com',
                'website'=>'www.soni.com',
                'logo'=>'logos\1624576309-soni.jpg',
                'address'=>'H54 RD',
                'created_at' => now()
            ],
            [
                'name'=>'LG',
                'email'=>'info@lg.com',
                'website'=>'www.lg.com',
                'logo'=>'logos\1624576249-lg.jpg',
                'address'=>'H54 RD CA',
                'created_at' => now()
            ],
            [
                'name'=>'HP',
                'email'=>'info@hp.com',
                'website'=>'www.hp.com',
                'logo'=>'logos\1624585604-hp.jpg',
                'address'=>'USA',
                'created_at' => now()
            ]
            ]);
    }
}
