<?php

use Illuminate\Database\Seeder;
use DymaVDomeNet\Chimney;

class ChimneysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chimney::truncate();
        factory(Chimney::class, 50)->create();
    }
}
