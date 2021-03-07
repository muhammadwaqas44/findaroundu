<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $currencies = [
            [ 'currency' => 'USD','price' => 1000,],
            [ 'currency' => 'PKS','price' => 3000,],
            [ 'currency' => 'IND','price' => 2000,],
            [ 'currency' => 'UEI','price' => 1000,],
            [ 'currency' => 'USD','price' => 1000,],
            [ 'currency' => 'USD','price' => 1000,],
            [ 'currency' => 'USD','price' => 1000,],


        ];
        foreach($currencies as $currency){
            \App\MainCurrency::create(['currency'=>$currency['currency'],'price'=>$currency['price']]);
        }

    }
}
