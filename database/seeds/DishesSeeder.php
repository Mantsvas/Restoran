<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Main;
use App\Dish;
class DishesSeeder extends Seeder
{
    protected $dish;
    protected $main_id;
    protected $faker;

    public function __construct(Dish $dish, Main $main,Faker $faker)
    {
      $this->dish = $dish;
      $this->main_id = $main;
      $this->faker = $faker;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      for ($i=0; $i <30 ; $i++) {
        

        $faker =$this->faker->create();
        $this->dish->create([
          'name' => $faker->word(),
          'description' => $faker->text($maxNbChars=200),
          'price'=> $faker->buildingNumber(),
          'photourl'=>$faker->imageUrl(800,600,'food'),
          'main_id'=> rand(1,4),

        ]);
      }
    }
}
