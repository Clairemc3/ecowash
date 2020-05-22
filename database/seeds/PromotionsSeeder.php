<?php

use App\Promotion;
use Illuminate\Database\Seeder;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::updateOrCreate(
            ['slug' => 'top'],
            [
            'name' => 'Top',
            'body' => '<p>Tumble drying starts from 50p</p>',
            'active' => false,
            'theme' => 'red'
           ]
        );

        Promotion::updateOrCreate(
            ['slug' => 'middle'],
            [
            'name' => 'Middle',
            'body' => '<p>Tumble drying starts from 50p</p>',
            'active' => false,
            'theme' => 'green'
           ]
        );


        Promotion::updateOrCreate(
            ['slug' => 'bottom'],
            [
            'name' => 'Bottom',
            'body' => '<p>Tumble drying starts from 50p</p>',
            'active' => false,
            'theme' => 'red'
           ]
        );
    }
}
