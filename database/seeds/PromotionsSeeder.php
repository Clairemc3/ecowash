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
            ['position' => 'top'],
            [
            'name' => 'Top',
            'body' => '<p>Tumble drying starts from 50p</p>',
            'active' => false,
           ]
        );

        Promotion::updateOrCreate(
            ['position' => 'middle'],
            [
            'name' => 'Middle',
            'body' => '<p>Tumble drying starts from 50p</p>',
            'active' => false,
           ]
        );


        Promotion::updateOrCreate(
            ['position' => 'bottom'],
            [
            'name' => 'Bottom',
            'body' => '<p>Tumble drying starts from 50p</p>',
            'active' => false,
           ]
        );
    }
}
