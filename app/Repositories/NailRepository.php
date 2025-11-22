<?php

namespace App\Repositories;

use App\Models\Nail;

class NailRepository
{
    protected $model;

    public function __construct(Nail $model)
    {
        $this->model = $model;
    }

    public function getAllWithUsers()
    {
        return $this->model->with('user')->get();
    }
}
