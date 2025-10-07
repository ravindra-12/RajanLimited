<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpcommingProjects;
use App\Models\UpcommingProjectName;
use Illuminate\Support\Facades\Log;

class UpcommingProjectsController extends Controller
{
    public function StoreUpcommingProjects(Request $request) {
     
      $validation = $request->validate([
            'Title' => 'string|required|max:255',
           'Description' => 'required|string',
            'upcommingproject_id' => 'required'
        ]);

    
        try {

           $upcommingprojects = UpcommingProjects::create($validation);
        //    dd($consultant);
    
            if ($upcommingprojects) {
                return redirect()->back()->with('success', 'UpcoomingProjects Created Successfully');
                
             }else {
                return redirect()->back()->with('error', 'Something Went Wrong');
            }
    
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Exception occurred!');
        }
    }

    public function ShowUpCommingProject()
    {
       
        try {
            $upcommingprojectsname = UpcommingProjectName::all();
        //    dd($upcommingprojectsname);
           $upcommingprojects = UpcommingProjects::with('upcommingprojectname')->get();
            // dd($consultant);
            return view('dashboard.upcommingprojectsdetails', compact('upcommingprojectsname', 'upcommingprojects'));
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
            // dd($consultant);
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

    

    public function UpdateUpcommingProject(Request $request, $id)
    {

      
        try {
            // Validate the request
            $validation = $request->validate([
                'Title' => 'required|string|max:255',
                'Description' => 'required',
                'upcommingproject_id' => 'required'
            ]);

            

            $project = UpcommingProjects::findOrFail($id);

          
            
            // Update the project with validated data
            
           $data =  $project->update($validation);

              
            
            return redirect()->back()->with('error', 'Failed to update project.');
        } catch (\Exception $e) {
            Log::error('Error updating project: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the project.');
        }
    }

    public function DeleteUpcommingProject($id)
    {
        try {
            $project = UpcommingProjects::findOrFail($id);
            $project->delete();
            
            return redirect()->back()->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete project: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to delete project.');
        }
    }

    public function ShowUpcommingProjectDetails($id)
    {
        try {
            // Get all projects for this category
            $projects = UpcommingProjects::where('upcommingproject_id', $id)->get();
            $category = UpcommingProjectName::findOrFail($id);
            
            return view('upcommingprojectdetailspage', compact('projects', 'category'));
        } catch (\Exception $e) {
            Log::error('Failed to load project details: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Projects not found.');
        }
    }

}
