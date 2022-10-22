<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Project;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Ponsiano De Loor',
            'email' => 'ponsianodeloor@gmail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password'=>Hash::make('ponsiano'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Project::create([
            'project' => 'CONSTRUCCIÓN DE INFRAESTRUCTURA DEL MATADERO METROPOLITANO DE QUITO-(CAMAL DE URGENCIAS Y CUBIERTAS DE CORRALES DE GANADO MAYOR)',
            'contractor'=> 'ING. ISABEL CARRILLO MEZA',
            'inspection' => 'ARQ. PATRICIO SERRANO',
            'place' => 'Quito - Camal Metropolitano',
            'user_id' => 1,
            'date_start' => '2022-10-22',
            'date_end' => '2023-05-30',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
