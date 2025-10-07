<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectOverview;
use App\Models\Projectcategory;
use Illuminate\Support\Facades\Log;

class ProjectOverviewController extends Controller
{
    public function Store(Request $request){

           $validation =    $request->validate([
                'title' => 'required|string|max:255',
                 'description' => 'required|string',
                 'category_id' => 'required'
            ]);
    
            try{
    
                $projectoverview = ProjectOverview::create($validation);
    
                if($projectoverview){
                    return redirect()->route('projectoverview.index')->with('success', 'Project Overview Added Successfully');
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
            $categories = Projectcategory::all() ;
            $projectoverviews = ProjectOverview::all();
    
           
               return view('dashboard.projectoverview', compact('projectoverviews', 'categories'));
        
    
    
        }catch (\Exception $e) {
            Log::error('Failed to load slider: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Somethin Went Wrong.');
        }
      }
    
    
      public function DeleteProjectOverview($id)
      {
          $projectoverview = ProjectOverview::find($id);
      
          if ($projectoverview) {
              $projectoverview->delete();
              return redirect()->back()->with('success', 'Project Overview deleted successfully.');
          }
      
          return redirect()->back()->with('error', 'Category not found.');
      }

    //   Project Overview Update Method
      public function UpdateProjectOverview(Request $request, $id)
      {
          $validation = $request->validate([
              'title' => 'required|string|max:255',
              'description' => 'required|string',
              'category_id' => 'required'
          ]);
      
          try {
              $projectoverview = ProjectOverview::findOrFail($id);
              $projectoverview->update($validation);
      
              return redirect()->route('projectoverview.index')->with('success', 'Project Overview Updated Successfully');
          } catch (\Exception $e) {
              Log::error('Failed to update project overview: ' . $e->getMessage());
              return redirect()->back()->with('error', 'Something Went Wrong.');
          }
      }
}
