<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projectcategory;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;

class ProjectCategoryController extends Controller
{

    // Store Category 

    public function StoreCategory(Request $request){
     
        $validation = $request->validate(
            [
               'name' => 'required|max:255',
              'servicecategory_id' => 'required',
            ]
            );
 
        try{
 
       $category =  Projectcategory::create($validation);

    //    dd($category );

        return redirect()->route('project.category');
 
 
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
 
    }

    // View Category
    
    public function ProjectCategory(){
        try{

        $category = Projectcategory::all();
       
         $scategory = ServiceCategory::all();
        //  dd($scategory);

        // dd($category);

        return view('dashboard.category', compact('category', 'scategory'));


        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }


    // Delete Project Category

    public function DeleteProjectCategory($id)
{
    $category = Projectcategory::find($id);

    if ($category) {
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    return redirect()->back()->with('error', 'Category not found.');
}

    // Edit Project Category

    // public function EditProjectCategory($id)
    // {
    //     $category = Projectcategory::find($id);

    //     if ($category) {
    //         return view('dashboard.edit_category', compact('category'));
    //     }

    //     return redirect()->back()->with('error', 'Category not found.');
    // }

    // Update Project Category

    public function UpdateProjectCategory(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
            ]
        );

        try {
            $category = Projectcategory::find($id);
            if ($category) {
                $category->update($validation);
                return redirect()->route('project.category')->with('success', 'Category updated successfully.');
            }
            return redirect()->back()->with('error', 'Category not found.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the category.');
        }
    }
  
    
   


}
