<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function StoreService(Request $request) {

      
        $validation = $request->validate([
            'title' => 'string',
            // 'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required|string',
            'servicecategory_id' => 'required'
        ]);

        // dd($validation );
    
        try {

           $service = Service::create($validation);
    
            if ($service) {
                return redirect()->route('service.index');
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong');
            }
    
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Exception occurred!');
        }
    }

    public function Service()
    {
        try {
            $servicecategory = ServiceCategory::all();
            // dd($category);
            $services = Service::latest()->get(); 
            return view('dashboard.service', compact('services', 'servicecategory'));
        } catch (\Exception $e) {
            Log::error('Failed to load services: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load projects.');
        }
    }

    public function UpdateService(Request $request, $id)
    {
        $service = Service::find($id);

        if ($service) {
            $validation = $request->validate([
                'title' => 'string',
                // 'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'description' => 'required|string',
                'servicecategory_id' => 'required'
            ]);

            try {
                $service->update($validation);
                return redirect()->route('service.index')->with('success', 'Service updated successfully.');
            } catch (\Exception $e) {
                Log::error('Failed to update service: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Unable to update service.');
            }
        }

        return redirect()->back()->with('error', 'Service not found.');
    }


    public function Servicedetails($id)
    {
        try {
            
            $services = ServiceCategory::with('services')->find($id);

        //    dd($services->toJson(JSON_PRETTY_PRINT));
         //dd($projects->projectOverview->title);
            
            // if (!$projects) {
            //     return redirect()->back()->with('error', 'Project not found.');
            // }
    
            return view('service.servicedetails', compact('services'));
        } catch (\Exception $e) {
            Log::error('Failed to load projects: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load projects.');
        }
    }


   


    
    public function DeleteService($id)
    {
        $services = Service::find($id);
    
        if ($services) {
            $services->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Category not found.');
    }

}
