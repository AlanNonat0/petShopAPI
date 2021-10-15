<?php

namespace App\Models;

use App\Models\Owner;
use App\Models\AnimalType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'age', 'animal_type_id', 'breed', 'owner_id'];

    public function owner(){
        return $this->hasOne(Owner::class, 'id','owner_id', 'owners');
    }

    public function animalType(){
        return $this->hasOne(AnimalType::class, 'id', 'animal_type_id', 'animal_types');
    }

}
