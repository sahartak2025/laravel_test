<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Event::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Event::create([
                'name' => $faker->sentence,
                'date' => $faker->dateTime,
                'holding' => $faker->sentence,
                'city' => $faker->city,
            ]);
        }
    }
}
