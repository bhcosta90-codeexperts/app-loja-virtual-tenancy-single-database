<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Store;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tenant = Tenant::factory()->create();
        Store::factory()->create(['tenant_id' => $tenant->id]);
        
        \App\Models\User::factory()->create([
            'tenant_id' => $tenant->id,
            'name' => 'Bruno Henrique da Costa',
            'email' => 'bhcosta90@gmail.com',
            'password' => '$2y$10$PIJZtBunEhcN16tHLW3Owui6CO10fDHTHy6CR6XDXSnOxw5Fv2mgC',
        ]);
    }
}
