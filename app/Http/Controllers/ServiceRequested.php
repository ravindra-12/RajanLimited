<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceRequest;

class ServiceRequested extends Controller
{
    public function Store(Request $request){

    $validation =    $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try{

            $servicerequest = ServiceRequest::create($validation);

            if($servicerequest){
                return redirect()->route('service.request')->with('success', 'Service Request Added Successfully');
            }else{
                return redirect()->back()->with('success', 'Service Request Added Successfully');
            }


        }catch (\Exception $e) {
            Log::error('Failed to load slider: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Somethin Went Wrong.');
        }


    }

  public function Index(){

    try{
 
        $servicerequest = ServiceRequest::all();

        if($servicerequest){
           return view('dashboard.servicerequest', compact('servicerequest'));
        }


    }catch (\Exception $e) {
        Log::error('Failed to load slider: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Somethin Went Wrong.');
    }
  }


  public function DeleteServiceRequest($id)
  {
      $servicerequest = ServiceRequest::find($id);
  
      if ($servicerequest) {
          $servicerequest->delete();
          return redirect()->back()->with('success', 'Service Request deleted successfully.');
      }
  
      return redirect()->back()->with('error', 'Category not found.');
  }


}
