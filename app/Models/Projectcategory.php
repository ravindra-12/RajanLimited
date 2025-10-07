<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectcategory extends Model
{
    use HasFactory;

    protected $table = 'projectcategory';
    protected $fillable = ['name', 'servicecategory_id'];


    public function projects(){
        return $this->hasMany(Project::class, 'category_id');
    }

    public function projectOverview(){
        return $this->hasOne(ProjectOverview::class, 'category_id');
    }

    
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'servicecategory_id');
    }



}
