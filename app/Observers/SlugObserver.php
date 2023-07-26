<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class SlugObserver
{
    public function saving(Model $model)
    {
        $model->slug = str()->slug($model->name);
    }
}
