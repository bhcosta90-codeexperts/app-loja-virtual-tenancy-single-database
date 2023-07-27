<?php

namespace App\Models\Traits;

use App\Models\Scopes\TenantScope;

trait TenantTrait
{
    public static function bootTenantTrait()
    {
        static::addGlobalScope(new TenantScope);
    }
}
