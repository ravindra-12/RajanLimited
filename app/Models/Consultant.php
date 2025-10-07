<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;

    protected $table = 'consultant';
    
    protected $fillable = ['Title', 'Description', 'consultant_id'];
    

    public function consultantcategory()
    {
        return $this->belongsTo(ConsultantCategory::class, 'consultant_id');
    }



}
