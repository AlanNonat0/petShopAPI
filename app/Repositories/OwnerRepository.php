<?php

namespace App\Repositories;

use App\Models\Owner;

class OwnerRepository extends AbstractRepository
{
    protected $model = Owner::class;
    protected $pivot = ['pet'];
}