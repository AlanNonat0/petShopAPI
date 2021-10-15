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
    protected $fillable = ['name', 'age', 'animal', 'breed', 'owner'];

    public function owner(){
        return $this->hasOne(Owner::class, 'pet');
    }

    public function animalType(){
        return $this->hasOne(AnimalType::class, 'pet');
    }

}
