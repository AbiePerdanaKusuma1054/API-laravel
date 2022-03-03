<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(RoleSeeder::class);
        $this->call(TipeSeeder::class);
        $this->call(DiagnosaSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(IntervensiSeeder::class);
        $this->call(KategoriUraianSeeder::class);
        $this->call(RiwayatSeeder::class);
    }
}
