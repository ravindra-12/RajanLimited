<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    
    protected $fillable = ['title', 'description', 'servicecategory_id'];
    

    public function servicecategory(){
        return $this->belongsTo(Service::class);
    }



}
