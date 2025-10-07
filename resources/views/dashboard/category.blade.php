@extends('partial.dashboardlayout')

@section('title', 'Category')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Category
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3">
     
    <div class="mb-5 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            Add Category
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                  
                 <div class="modal-body">
                        <div class="mb-3">
                      <select name="servicecategory_id" class="form-select" required>
                        <option value="">Select Service Category</option>
                        @foreach($scategory as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                        </div>
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control" placeholder="Enter category name" required>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

    {{-- <!-- Delete Confirmation Modal 

   <!-- Delete Confirmation Modal End --> --}}
    
      
<table id="example" class="table table-striped" style="width:100%; ">
    <thead class="bg-primary">
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($category as $cat)

        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{ $cat->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $cat->updated_at->format('d M Y - h:i A') }}</td>
            {{-- <td>
                <a href="" class="btn btn-primary btn-sm">Update</a>
            </td> --}}
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{$cat->id}}">
                    Update
                </button>
            </td>

            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$cat->id}}">
                    Delete
                </button>
            </td>
           
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>
@foreach($category as $modalCat)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalCat->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalCat->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $modalCat->id }}">
                    Delete {{ $modalCat->name }}?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to permanently delete this category?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('projectcategory.delete', $modalCat->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Modal for this category -->
<div class="modal fade" id="updateModal{{ $modalCat->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $modalCat->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('category.update', $modalCat->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel{{ $modalCat->id }}">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="serviceCategoryId{{ $modalCat->id }}" class="form-label">Service Category</label>
                        <select name="servicecategory_id" id="serviceCategoryId{{ $modalCat->id }}" class="form-select" required>
                            <option value="">Select Service Category</option>
                            @foreach($scategory as $service)
                                <option value="{{ $service->id }}" {{ $modalCat->servicecategory_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoryName{{ $modalCat->id }}" class="form-label">Category Name</label>
                        <input type="text" name="name" id="categoryName{{ $modalCat->id }}" class="form-control" value="{{ $modalCat->name }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
