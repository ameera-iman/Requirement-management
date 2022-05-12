<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'labels';
    protected $fillable = ['name', 'type'];

    public function requirements()
    {
        return $this->belongsToMany(Requirement::class);
    }
}
