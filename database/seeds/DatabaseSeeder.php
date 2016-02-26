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
                'enabled' => 1,
                'name' => 'home',
                'body' => 'home content',
            ),
            array(
                'id' => 2,
                'slug' => '/about-us',
                'enabled' => 1,
                'name' => 'About us',
                'body' => 'About us content',
            ),
            array(
                'id' => 3,
                'slug' => '/delivery',
                'enabled' => 1,
                'name' => 'Delivery',
                'body' => 'Delivery content',
            ),
            array(
                'id' => 4,
                'slug' => '/payment',
                'enabled' => 1,
                'name' => 'Payment',
                'body' => 'Payment content',
            ),
        );

        DB::table('contents')->insert($content);

    }
}