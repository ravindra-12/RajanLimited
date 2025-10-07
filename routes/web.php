<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceRequested;
use App\Http\Controllers\EnqueryController;
use App\Http\Controllers\ProjectOverviewController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CounstantCategoryController;
use App\Http\Controllers\ConsultantDetailsController;
use App\Http\Controllers\UpcommingProjectNameController;
use App\Http\Controllers\UpcommingProjectsController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/test-db-connection', function() {
//     try {
//         DB::connection()->getPdo();
//         return "Database connection successful!";
//     } catch (\Exception $e) {
//         return "Database connection failed: " . $e->getMessage();
//     }
// });

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', [SliderController::class, 'SliderForHome']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

   

//    ServiceRequest

Route::get('/servicerequest', [ServiceRequested::class, 'Index'])->name('service.request');
Route::post('/servicerequest/store', [ServiceRequested::class, 'Store'])->name('servicerequest.store');
Route::delete('/servicerequest/delete/{id}', [ServiceRequested::class, 'DeleteServiceRequest'])->name('servicerequest.delete');

// EndServiceRequest



// Enquiry

   
});


Route::get('/project/category/{id}', [ProjectController::class, 'Projectdetails'])->name('project.details');
Route::get('/service/category/{id}', [ServiceController::class, 'Servicedetails'])->name('servicess.details');



Route::middleware(['auth', 'role:admin'])->group(function () {

Route::post('/enquries/store', [EnqueryController::class, 'StoreEnquery'])->name('enquiry.store');
Route::delete('/enquries/delete/{id}', [EnqueryController::class, 'DeleteEnquiry'])->name('enqueiry.delete');

 // Slider 
 Route::get('/slider', [SliderController::class, 'GetAllSlider'])->name('slider.index');
 Route::post('slider/store', [SliderController::class, 'StoreSlider'])->name('slider.store');
 Route::delete('/slider/delete/{id}', [SliderController::class, 'DeleteSlider'])->name('slider.delete');
 Route::put('/slider/update/{id}', [SliderController::class, 'UpdateSlider'])->name('slider.update');
// End Slidr

// Project Overview

Route::get('/projectoverview', [ProjectOverviewController::class, 'Index'])->name('projectoverview.index');
Route::post('/projectoverview/store', [ProjectOverviewController::class, 'Store'])->name('projectoverview.store');
Route::delete('/projectoverview/delete/{id}', [ProjectOverviewController::class, 'DeleteProjectOverview'])->name('projectoverview.delete');
Route::put('/projectoverview/update/{id}', [ProjectOverviewController::class, 'UpdateProjectOverview'])->name('projectoverview.update');

// End Project Overvie

// Project category

    Route::get('/category', [ProjectCategoryController::class, 'ProjectCategory'])->name('project.category');
    Route::post('category/store', [ProjectCategoryController::class, 'StoreCategory'])->name('category.store');
    Route::delete('/category/delete/{id}', [ProjectCategoryController::class, 'DeleteProjectCategory'])->name('projectcategory.delete');
    Route::put('/category/update/{id}', [ProjectCategoryController::class, 'UpdateProjectCategory'])->name('category.update');


    // End Project Category


     // Service category

     Route::get('/servicecategory', [ServiceCategoryController::class, 'ServiceCategory'])->name('service.category');
     Route::post('servicecategory/store', [ServiceCategoryController::class, 'StoreServiceCategory'])->name('servicecategory.store');
     Route::delete('/servicecategory/delete/{id}', [ServiceCategoryController::class, 'DeleteServiceCategory'])->name('servicecategory.delete');
 Route::put('/servicecategory/update/{id}', [ServiceCategoryController::class, 'UpdateServiceCategory'])->name('servicecategory.update');
 
     // End Service Category

    // Project
    Route::post('project/store', [ProjectController::class, 'StoreProject'])->name('project.store');
    Route::get('/project', [ProjectController::class, 'Project'])->name('project.index');
   
    Route::delete('/project/delete/{id}', [ProjectController::class, 'DeleteProject'])->name('project.delete');
    Route::put('/project/update/{id}', [ProjectController::class, 'UpdateProject'])->name('project.update');

    // End Project


     // Service
     Route::post('service/store', [ServiceController::class, 'StoreService'])->name('service.store');
     Route::get('/services', [ServiceController::class, 'Service'])->name('service.index');
    
     Route::delete('/service/delete/{id}', [ServiceController::class, 'DeleteService'])->name('service.delete');
     Route::put('/service/update/{id}', [ServiceController::class, 'UpdateService'])->name('service.update');
 
     // End Service
     
     // ConsultantCategory Routes
Route::get('/consultantcategory', [CounstantCategoryController::class, 'ShowConsultantCategory'])->name('consultant.category');
Route::post('/consultantcategory/store', [CounstantCategoryController::class, 'StoreConsultantCategory'])->name('consultantcategory.stored');
Route::put('/consultantcategory/update/{id}', [CounstantCategoryController::class, 'UpdateConsultantCategory'])->name('consultantcategory.update');
Route::delete('/consultantcategory/delete/{id}', [CounstantCategoryController::class, 'DeleteConsultantCategory'])->name('consultantcategory.delete');

//End ConsultantCategoryRoutes

// Consultant Routes

Route::get('/consultantdetails', [ConsultantDetailsController::class, 'Consultant'])->name('consultantdetails.index');
Route::post('/consultant/store', [ConsultantDetailsController::class, 'StoreConsultant'])->name('consultantdetails.store');

Route::put('/consultantdetails/update/{id}', [ConsultantDetailsController::class, 'UpdateConsultant'])->name('consultantdetails.update');

Route::delete('consultantdetails/delete/{id}', [ConsultantDetailsController::class, 'DeleteConsultant'])->name('consultantdetails.delete');

});

//UpcommingProjectName and Upcomming Project Routes
Route::middleware('auth')->group(function () {
    // Upcoming Project Names (Categories)
    Route::get('/upcommingprojectname', [UpcommingProjectNameController::class, 'ShowUpCommingProjectName'])->name('upcommingprojectname');
    Route::post('/upcommingprojectname/store', [UpcommingProjectNameController::class, 'StoreUpcommingProjectName'])->name('upcommingprojectname.store');
    Route::put('/upcommingprojectname/update/{id}', [UpcommingProjectNameController::class, 'UpdateProjectName'])->name('upcommingprojectname.update');
    Route::delete('/upcommingprojectname/delete/{id}', [UpcommingProjectNameController::class, 'DeleteProjectName'])->name('upcommingprojectname.delete');
    
    // Upcoming Projects
    Route::get('/upcommingproject', [UpcommingProjectsController::class, 'ShowUpCommingProject'])->name('upcommingproject');
    Route::post('/upcommingproject/store', [UpcommingProjectsController::class, 'StoreUpcommingProjects'])->name('upcommingproject.store');
    Route::delete('/upcommingproject/delete/{id}', [UpcommingProjectsController::class, 'DeleteUpcommingProject'])->name('upcommingproject.delete');
  Route::put('/upcommingproject/update/{id}', [UpcommingProjectsController::class, 'UpdateUpcommingProject'])->name('upcommingproject.update');
    
});

Route::get('/consultantdetailspage/{id}', [ConsultantDetailsController::class, 'Consultantdetails'])->name('consultant.details');
Route::get('/upcommingproject/details/{id}', [UpcommingProjectsController::class, 'ShowUpcommingProjectDetails'])->name('upcommingproject.details');
  
Route::get('/enquries', [EnqueryController::class, 'GetAllEnquery'])->name('enquiry.index');

Route::get('/allconsultant', [CounstantCategoryController::class, 'GetAllConsultantCategory']);

Route::get('/about-us', function () {
    return view('about.aboutus');
});

Route::get('/contact-us', function(){
    return view('contact.contactus');
});

Route::get('/careers', function(){
    return view('career.career');
});


Route::get('/facility-engineering', function(){
    return view('services.facility-engineering');
});




require __DIR__.'/auth.php';
