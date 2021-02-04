<?php

namespace Database\Seeders;

use App\Models\SupplierProduct;
use Illuminate\Database\Seeder;

class SupplierProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierProduct::factory()->times(50)->create();
    }
}
