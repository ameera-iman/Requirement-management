<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['title', 'intro', 'startdate', 'duedate'];

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
}
