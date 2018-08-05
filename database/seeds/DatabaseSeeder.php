<?php

use Illuminate\Database\Seeder;
use App\Model\user\User;
use App\Model\user\blogpost;
use App\Model\user\categorie;
use App\Model\user\tag;

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
        factory(blogpost::class, 25)->create();
        factory(categorie::class, 25)->create();
        factory(tag::class, 25)->create();
    }
}
