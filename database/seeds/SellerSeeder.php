<?php

use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Seller::class, 10)->create()
            ->each(function ($seller){
                $seller->products()->saveMany(
                    factory(\App\Product::class, 20)
                        ->make(['seller_id'=>null])
                );
            });
    }
}
