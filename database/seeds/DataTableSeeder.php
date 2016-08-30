<?php

use Illuminate\Database\Seeder;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => '1', 'email' => 'webmaster@femip.org', 'password' => bcrypt('admin'), 'active' => '1']
        ]);

        DB::table('user_profiles')->insert([
            ['id' => '1', 'user_id' => '1', 'nombres' => 'Femip', ]
        ]);

    }
}
