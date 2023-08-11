<?php

namespace Modules;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class CustomModel extends Model
{

    public function newEloquentBuilder($query): Builder
    {
        throw new \LogicException(sprintf(
            "Model %s must define 'newEloquentBuilder'",
            get_class()));
    }
}