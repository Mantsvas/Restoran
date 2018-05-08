<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Main;

class MainsSeeder extends Seeder
{
    protected $main;


    public function __construct(Main $main )
    {
        $this->main = $main;

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->main->create([
          'title' => 'Sriubos'
        ]);

        $this->main->create([
          'title' => 'Desertai'
        ]);

        $this->main->create([
          'title' => 'Karsti patiekalai'
        ]);

        $this->main->create([
          'title' => 'Salti Patiekalai'
        ]);
    }
}
