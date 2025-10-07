<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpcommingProjectName;
use Illuminate\Support\Facades\Log;

class UpcommingProjectNameController extends Controller
{
    public function StoreUpcommingProjectName(Request $request){
     
        $validation = $request->validate(
            [
               'name' => 'required|max:255',

            ]
            );
 
        try{

       $upcommingprojectname =  UpcommingProjectName::create($validation);

    //    dd($category );

        return redirect()->back()->with('success', 'Consultant Category created successfully.');


        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
 
    }

    // View ServiceCategory
    
    public function ShowUpCommingProjectName(){
        try{

        $upcommingprojectname = UpcommingProjectName::all();

        // dd($category);

        return view('dashboard.upcommingprojectname', compact('upcommingprojectname'));


        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    // update Service Category
    public function UpdateProjectName(Request $request, $id)
    {

        try {
            $updateprojectname = UpcommingProjectName::find($id);
            // Check if the consultant category exists
            if (!$updateprojectname) {
                return redirect()->back()->with('error', 'Upcomming Project not found.');
            }

            $validation = $request->validate([
                'name' => 'required|max:255',
            ]);

            $updateprojectname->update($validation);
            return redirect()->back()->with('success', 'Update Project Name');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the category.');
        }
    }


    // Delete Project Category

    public function DeleteProjectName($id)

{
    
    $updateprojectname = UpcommingProjectName::find($id);
 
    if ($updateprojectname) {
        $updateprojectname->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    return redirect()->back()->with('error', 'Category not found.');
}
}
