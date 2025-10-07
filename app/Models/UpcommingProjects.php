<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpcommingProjects extends Model
{
    use HasFactory;

    protected $table = 'upcomingproject';

     protected $fillable = ['Title', 'Description', 'upcommingproject_id'];
    
	
    public function upcommingprojectname(){
        return $this->belongsTo(UpcommingProjectName::class, 'upcommingproject_id');
    }
}
