<?php

namespace App\Models;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;

    /**
     * @var $fillable For bulk data entry
     */
    protected $fillable = ['name', 'telephone'];

    public function pet(){
        return $this->hasMany(Pet::class);
    }
}
