<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Project;
use App\Models\Projectcategory;
class ProjectController extends Controller
{
    public function StoreProject(Request $request) {

        // dd("Hello");
        $validation = $request->validate([
            'title' => 'string|required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required|string',
            'category_id' => 'required'
        ]);

        // dd($validation );
    
        try {

            if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('projects', 'public');
                $validation['image'] = $imagePath;
            }


            $project = Project::create($validation);
    
            if ($project) {
                return redirect()->route('project.index');
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong');
            }
    
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Exception occurred!');
        }
    }

    public function Project()
    {
        try {
            $categories = Projectcategory::all() ;
            // dd($category);
            $projects = Project::latest()->get(); 
            // dd($projects);
            return view('dashboard.project', compact('projects', 'categories'));
        } catch (\Exception $e) {
            Log::error('Failed to load projects: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load projects.');
        }
    }


    public function Projectdetails($id)
    {
        try {
            $projects = Projectcategory::with('projects', 'projectOverview')->find($id);

            //  dd($projects->toJson(JSON_PRETTY_PRINT));
    //    dd($projects->projectOverview->title );
            
            // if (!$projects) {
            //     return redirect()->back()->with('error', 'Project not found.');
            // }
    
            return view('project.projectdetails', compact('projects'));
        } catch (\Exception $e) {
            Log::error('Failed to load projects: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load projects.');
        }
    }


    // Make method for updating project
    public function UpdateProject(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'string|required|max:255',
            'image' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required|string',
            'category_id' => 'required'
        ]);

        try {
            $project = Project::findOrFail($id);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('projects', 'public');
                $validation['image'] = $imagePath;
            }

            $project->update($validation);

            return redirect()->route('project.index')->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Unable to update project.');
        }
    }

    
    public function DeleteProject($id)
    {
        $projects = Project::find($id);
    
        if ($projects) {
            $projects->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Category not found.');
    }


}
