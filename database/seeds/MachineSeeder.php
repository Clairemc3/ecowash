<?php

use App\Machine;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Machine::updateOrCreate(
            ['name' => 'Small machines'],
            [
            'price' => '£4.00 for a 20lb wash',
            'description' => 'suitable for large bag of mixed clothes or small Duvet',
           ]
        );

        Machine::updateOrCreate(
            ['name' => 'Large machines'],
            [
            'price' => '£5.60 for a 35lb wash',
            'description' => 'suitable for heavy duvets, family wash, curtains & medium rugs',
           ]
        );

        Machine::updateOrCreate(
            ['name' => 'Ex-Large machines'],
            [
            'price' => '£6.80 with extra large door for a 40lb wash',
            'description' => 'suitable for King Size duvets, Very Large family wash, Sofa Covers etc',
           ]
        );

        Machine::updateOrCreate(
            ['name' => 'Ultra-Large machines'],
            [
            'price' => '£7.60 with extra large door for a 45lb wash',
            'description' => 'suitable for King Size duvets, Very Large family wash, Sofa Covers etc',
           ]
        );
    }
}
