<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Dive;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(Dive::class, 50)->create();
    }
}
