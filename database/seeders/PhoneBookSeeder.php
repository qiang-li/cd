<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PhoneBookSeeder extends Seeder
{
    private $faker;

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct () {
        $this->faker = $this->makeFaker();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persons = [];
        for ($i=0; $i<10; ++$i) {
            $persons [] = [
                'last' => $this->faker->firstName (),
                'first' => $this->faker->lastName (),
                'email' => $this->faker->freeEmail (),
                'phone' => $this->faker->numerify ('###-###-####'),
                'created_at' => Carbon::now()
            ];
        }

        DB::table('phone_books')->insert($persons);
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeFaker () {
        return Container::getInstance()->make(Faker::class);
    }
}
