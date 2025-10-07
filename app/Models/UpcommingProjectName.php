<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcommingProjectName extends Model
{
    use HasFactory;

    protected $table = 'upcommingprojectname';
    protected $fillable = ['name'];

    public function upcommingprojects()
    {
        return $this->hasMany(UpcommingProjects::class, 'upcommingproject_id');
    }
}
