<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('foods')->insert([
            'namefood' => 'Sate Madura',
            'stock' => '19',
            'image' => '1642812618.jpg',
            'price' => '18000',
            'description' => 'Dibuat dari daging ayam dari peternakan sendiri, yang terawat dengan baik dan menjamin kualitas daging yang baik serta balutan bumbu saus kacang yang nikmat dapat membuat citarasa semakin nikmat',
            'category' => 'Makanan',
            'created_at' => '2022-01-22 00:50:19',
            'updated_at' => '2022-01-22 00:50:19'
        ]);

        DB::table('users')->insert([
            'name' => 'Rahmat',
            'email' => '19',
            'email_verified_at' => '1642812618.jpg',
            'password' => 'alam',
            'description' => 'Dibuat dari daging ayam dari peternakan sendiri, yang terawat dengan baik dan menjamin kualitas daging yang baik serta balutan bumbu saus kacang yang nikmat dapat membuat citarasa semakin nikmat',
            'category' => 'Makanan',
            'created_at' => '2022-01-22 00:50:19',
            'updated_at' => '2022-01-22 00:50:19'
        ]);
    }
}
