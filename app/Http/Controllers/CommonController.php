<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projectcategory;
use Illuminate\Support\Facades\Log;

class CommonController extends Controller
{
    public function ProjectMenu(){
        try{

            $projectcategory = Projectcategory::all();

            if($projectcategory){
                return view('partial.menu', compact('projectcategory'));
            }

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Exception occurred!');
        }
    }
}
