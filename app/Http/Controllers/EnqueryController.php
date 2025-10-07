<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Enquirie;

class EnqueryController extends Controller
{
    public function StoreEnquery(Request $request){

        $validation =   $request->validate([
            'firsname' => 'string|required',
            'lastname' => 'string|required',
            'company' => 'string|required',
            'email' => 'string|required',
            'phoneno' => 'required',
            'servicerequest' => 'required',
            'comments' => 'required'

        ]);

        // dd($validation);

        try{
            // dd("Hello");
            $enquiries = Enquirie::create($validation);

            // dd( $enquiries);

            if($enquiries){
                return redirect()->back()->with('success', 'Service Request Added Successfully');
            }else{
                return redirect()->back()->with('success', 'Service Request Added Successfully');
            }


        }catch (\Exception $e) {
            Log::error('Failed to load : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Somethin Went Wrong.');
        }



    }


    public function GetAllEnquery(){

        try{
     
            $enquiries = Enquirie::latest()->get();

            //  dd($enquiries);
    
            if($enquiries){
               return view('dashboard.enquiries', compact('enquiries'));
            }
    
    
        }catch (\Exception $e) {
            Log::error('Failed to load : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Somethin Went Wrong.');
        }
      }


      public function DeleteEnquiry($id)
{
    $enquiry = Enquirie::find($id);

    if ($enquiry) {
        $enquiry->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    return redirect()->back()->with('error', 'Category not found.');
}


}
