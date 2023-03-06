<?php

namespace Database\Seeders;

use App\Models\Donate;
use Illuminate\Database\Seeder;

class DonateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donate::factory(10000)->Create();
    }
}
