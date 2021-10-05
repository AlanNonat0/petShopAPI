<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    use HasFactory;

    /**
     * @var $fillable For bulk data entry
     */
    protected $fillable = ['type'];

    public function pet(){
        return $this->belongsTo('App\Models\Pet');
    }
}
