<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultantCategory extends Model
{
    use HasFactory;

    protected $table = 'consultant_category';
    protected $fillable = ['consultant_name'];

   public function consultants()
    {
        return $this->hasMany(Consultant::class, 'consultant_id');
    }

    
}
