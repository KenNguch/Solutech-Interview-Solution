<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailsSeeder extends Seeder
{

    public function run()
    {
        OrderDetail::factory()->count(10)->create();

    }
}
