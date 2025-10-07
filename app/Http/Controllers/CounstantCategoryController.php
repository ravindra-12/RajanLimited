<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultantCategory;

class CounstantCategoryController extends Controller
{
    public function StoreConsultantCategory(Request $request){
     
        $validation = $request->validate(
            [
               'consultant_name' => 'required|max:255',

            ]
            );
 
        try{

       $consultantcategory =  ConsultantCategory::create($validation);

    //    dd($category );

        return redirect()->back()->with('success', 'Consultant Category created successfully.');


        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
 
    }

    // View ServiceCategory
    
    public function ShowConsultantCategory(){
        try{

        $consultantcategory = ConsultantCategory::all();

        // dd($category);

        return view('dashboard.consultantcategory', compact('consultantcategory'));


        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }
    
    
     public function GetAllConsultantCategory(){
        
        try{

        $consultant = ConsultantCategory::all();

        //  dd($consultant);

        return view('consultantpage', compact('consultant'));


        }catch(\Exception $e){
           dd("Hello");
        }
    }

    // update Service Category
    public function UpdateConsultantCategory(Request $request, $id)
    {

        try {
            $consultantcategory = ConsultantCategory::find($id);
            // Check if the consultant category exists
            if (!$consultantcategory) {
                return redirect()->back()->with('error', 'Consultant Category not found.');
            }

            $validation = $request->validate([
                'consultant_name' => 'required|max:255',
            ]);

            $consultantcategory->update($validation);
            return redirect()->route('consultant.category')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the category.');
        }
    }


    // Delete Project Category

    public function DeleteConsultantCategory($id)
{
    $consultantcategory = ConsultantCategory::find($id);

    if ($consultantcategory) {
        $consultantcategory->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    return redirect()->back()->with('error', 'Category not found.');
}
}
