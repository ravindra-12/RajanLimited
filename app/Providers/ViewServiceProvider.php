<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Projectcategory;
use App\Models\ServiceCategory;
use App\Models\ConsultantCategory;
use App\Models\UpcommingProjectName;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

   
    public function boot()
{
    View::composer('*', function ($view) {
    $view->with('projectcategory', Projectcategory::with('projects')->get());
    //   $data =  $view->with('servicecategory', ServiceCategory::all());
    $view->with('servicecategory', \App\Models\ServiceCategory::with('projectCategories')->get());
    $view->with('consultantname', ConsultantCategory::with('consultants')->get());
    $view->with('upcommingprojectnames', UpcommingProjectName::with('upcommingprojects')->get());

    
});
}
}
