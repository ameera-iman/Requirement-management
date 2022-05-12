<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuss';
    protected $fillable = ['name', 'progress'];

    public function requirement()
    {
    	return $this->hasOne(Requirement::class);
    }
}
