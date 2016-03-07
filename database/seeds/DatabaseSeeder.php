<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ContentTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}


class ContentTableSeeder extends Seeder
{
    public function run(){
        DB::table('contents')->delete();

        $content = array(
            array(
                'id' => 1,
                'slug' => '/',
                'sub_id' => NULL,
                'enabled' => 1,
                'name' => 'home',
                'body' => 'home content',
                'sort' => 1,
            ),
            array(
                'id' => 2,
                'sub_id' => NULL,
                'slug' => '/about-us',
                'enabled' => 1,
                'name' => 'About us',
                'body' => 'About us content',
                'sort' => 2,
            ),
            array(
                'id' => 3,
                'sub_id' => NULL,
                'slug' => '/delivery',
                'enabled' => 1,
                'name' => 'Delivery',
                'body' => 'Delivery content',
                'sort' => 3,
            ),
            array(
                'id' => 4,
                'sub_id' => NULL,
                'slug' => '/payment',
                'enabled' => 1,
                'name' => 'Payment',
                'body' => 'Payment content',
                'sort' => 4,
            ),
        );

        DB::table('contents')->insert($content);

    }
}


class UserTableSeeder extends Seeder
{
    public function run(){
        DB::table('users')->delete();

        $content = array(
            array(
                'id' => 1,
                'name' => 'adminName',
                'email' => 'admin@mail.ru',
                'password' => bcrypt('secret'),
                'admin' => 1,
                'enabled' => 1,
            ),
            array(
                'id' => 2,
                'name' => 'userName',
                'email' => 'user@mail.ru',
                'password' => bcrypt('secret'),
                'admin' => 0,
                'enabled' => 1,
            ),
        );

        DB::table('users')->insert($content);

    }
}