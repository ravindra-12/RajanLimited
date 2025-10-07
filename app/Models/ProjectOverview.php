<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOverview extends Model
{
    use HasFactory;
   
    protected $table = 'projectoverciews';

    protected $fillable = ['title',  'description', 'category_id'];

    public function category(){
        return $this->belongsTo(Projectcategory::class);
    }

}
