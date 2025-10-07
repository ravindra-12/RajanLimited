<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;
use App\Models\ConsultantCategory;
use Illuminate\Support\Facades\Log;

class ConsultantDetailsController extends Controller
{
     public function StoreConsultant(Request $request) {
     
      $validation = $request->validate([
            'Title' => 'string|required|max:255',
           'Description' => 'required|string',
            'consultant_id' => 'required'
        ]);

    
        try {

           $consultant = Consultant::create($validation);
        //    dd($consultant);
    
            if ($consultant) {
                return redirect()->route('consultantdetails.index');
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong');
            }
    
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Exception occurred!');
        }
    }

    public function Consultant()
    {
       
        try {
            $consultantname = ConsultantCategory::all() ;
            // dd($category);
           $consultant = Consultant::with('consultantcategory')->get();
            // dd($consultant);
            return view('dashboard.consultantdetails', compact('consultant', 'consultantname'));
        } catch (\Exception $e) {
            Log::error('Failed to load consultants: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load consultants.');
        }
    }


    public function Consultantdetails($id)
    {

        // dd("Hello Jii");

        try {
            $consultant = Consultant::latest()->find($id);
            //dd($consultant);
            return view('consultantdetailspage', compact('consultant'));
        } catch (\Exception $e) {
            Log::error('Failed to load consultants: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load consultants.');
        }
    }


    // Make method for updating project
    public function UpdateConsultant(Request $request, $id)
    {

        

        $validation = $request->validate([
            'Title' => 'string|required|max:255',
             'Description' => 'required|string',
             'consultant_id' => 'required'
        ]);

     

        try {
            $consultant = Consultant::findOrFail($id);

           $consultant->update($validation);

            return redirect()->route('consultantdetails.index')->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Unable to update project.');
        }
    }

    
   public function DeleteConsultant($id)
    {
        $consultant = Consultant::find($id);
    
        if ($consultant) {
            $consultant->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Category not found.');
    }

}
