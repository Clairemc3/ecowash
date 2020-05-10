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
            ['position' => 'top-bar'],
            [
            'help_text' => 'This promotion will appear at the top of page',
            'body' => 'Tumble drying starts from 50p',
            'active' => false,
           ]
        );
    }
}
