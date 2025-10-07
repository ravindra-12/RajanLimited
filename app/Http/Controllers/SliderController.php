<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    public function GetAllSlider(){

        try{

            $slider = Slider::latest()->get();

            if($slider){
                return view('dashboard.slider', compact('slider'));
            }else{
                return redirect()->back()->with(['error', "Something Went Wrong"]);
            }

        }catch (\Exception $e) {
            Log::error('Failed to load slider: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load sliders.');
        }

    }


    public function StoreSlider(Request $request)
    {
        $validation = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider', 'public');
            $validation['image'] = $imagePath;
        }
    
        \Log::info('Slider validation data: ', $validation);
    
        $slider = Slider::create($validation);
    
        if ($slider) {
            return redirect()->back()->with('success', 'Slider Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Slider Adding Failed');
        }
    }

    // Slider for Update Method
    public function UpdateSlider(Request $request, $id)
    {
        $slider = Slider::find($id);
    
        if ($slider) {
            $validation = $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('slider', 'public');
                $validation['image'] = $imagePath;
            }
    
            $slider->update($validation);
    
            return redirect()->back()->with('success', 'Slider Updated Successfully');
        }
    
        return redirect()->back()->with('error', 'Slider not found.');
    }


    public function SliderForHome(){


        try{

            $slider = Slider::latest()->get();

            if($slider){
                return view('home', compact('slider'));
            }else{
                return redirect()->back()->with(['error', "Something Went Wrong"]);
            }

        }catch (\Exception $e) {
            Log::error('Failed to load slider: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load sliders.');
        }

    }



    public function DeleteSlider($id)
    {
        $slider = Slider::find($id);
    
        if ($slider) {
            $slider->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Category not found.');
    }


}
