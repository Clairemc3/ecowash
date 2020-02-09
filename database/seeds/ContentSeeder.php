<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::updateOrCreate(
            ['slug' => 'prices-extra'],
            [
            'help_text' => 'Pricing',
            'body' => 'Tumble drying starts from 50p'
           ]
        );

        Content::updateOrCreate(
            ['slug' => 'service-washes'],
            [
            'help_text' => 'Service washes',
            'body' => ' <p class="uppercase red">Please ring first for availability</p>
            <p>Additional £4.00* for medium load,
                <br>Additional £6.00* for large load
                <br>Additional £7.00* for extra large load
                <br>or <br>
                £8* for ultra large load Duvets
                <br>
                 £5* first duvet and £3* each additional duvet</p>
            <p class="lightweight italic">* This is in addition to standard wash & drying costs - see PRICES</p>'
           ]
        );

        Content::updateOrCreate(
            ['slug' => 'find-us'],
            [
            'help_text' => 'Find us',
            'body' => '<h3>Train</h3>
                    <p>Get a train from xyy</p>
                    <h3>Car</h3><p>You can get here in this way</p>
                    <h3>Buses</h3>
                    <p>Get a bus in this way</p>'
           ]);
    }
}
