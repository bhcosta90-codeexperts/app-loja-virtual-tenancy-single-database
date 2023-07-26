<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    public function creating(Model $model)
    {
        if (empty($model->tenant_id)) {
            $model->tenant_id = session()->get('tenant');
        }
    }
}
