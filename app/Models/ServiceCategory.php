<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = 'servicecategories';
    protected $fillable = ['name'];

    public function services(){
        return $this->hasMany(Service::class, 'servicecategory_id');
    }

    public function projectCategories()
    {
        return $this->hasMany(ProjectCategory::class, 'servicecategory_id');
    }


}
