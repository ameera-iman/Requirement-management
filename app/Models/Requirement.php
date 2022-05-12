<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirements';
    protected $fillable = ['name'];

    public function status()
    {
    	return $this->belongsTo(Status::class);
    }

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }
}
