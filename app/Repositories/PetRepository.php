<?php

namespace App\Repositories;

use App\Models\Pet;

class PetRepository extends AbstractRepository
{
    protected $model = Pet::class;
}