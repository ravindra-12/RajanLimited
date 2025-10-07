<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;

class ServiceCategoryController extends Controller
{
    public function StoreServiceCategory(Request $request){
     
        $validation = $request->validate(
            [
               'name' => 'required|max:255',
            ]
            );
 
        try{
 
       $servicecategory =  ServiceCategory::create($validation);

    //    dd($category );

        return redirect()->route('service.category');
 
 
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
 
    }

    // View ServiceCategory
    
    public function ServiceCategory(){
        try{

        $servicecategory = ServiceCategory::all();

        // dd($category);

        return view('dashboard.servicecategory', compact('servicecategory'));


        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    // update Service Category
    public function UpdateServiceCategory(Request $request, $id)
    {
        $servicecategory = ServiceCategory::find($id);

        if ($servicecategory) {
            $validation = $request->validate([
                'name' => 'required|max:255',
            ]);

            $servicecategory->update($validation);
            return redirect()->route('service.category')->with('success', 'Category updated successfully.');
        }

        return redirect()->back()->with('error', 'Category not found.');
    }


    // Delete Project Category

    public function DeleteServiceCategory($id)
{
    $servicecategory = ServiceCategory::find($id);

    if ($servicecategory) {
        $servicecategory->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    return redirect()->back()->with('error', 'Category not found.');
}
  
}
