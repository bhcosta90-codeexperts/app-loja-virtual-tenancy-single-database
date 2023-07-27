<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\Product;
use App\Models\Scopes\TenantScope;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tenant = Tenant::factory(10)
            ->hasStores(1)
            ->create();
        
        foreach (Store::withoutGlobalScope(TenantScope::class)->get() as $store) {
            $tenantAndStoreIds = ['store_id' => $store->id, 'tenant_id' => $store->tenant_id];
            Product::factory(20, $tenantAndStoreIds)->create();
            Category::factory(5, $tenantAndStoreIds)->create();
        }

        Store::factory()->create(['tenant_id' => $idTenant = $tenant->first()->id]);
        
        \App\Models\User::factory()->create([
            'tenant_id' => $idTenant,
            'name' => 'Bruno Henrique da Costa',
            'email' => 'bhcosta90@gmail.com',
            'password' => '$2y$10$PIJZtBunEhcN16tHLW3Owui6CO10fDHTHy6CR6XDXSnOxw5Fv2mgC',
        ]);
    }
}
