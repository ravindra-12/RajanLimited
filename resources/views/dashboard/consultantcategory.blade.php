@extends('partial.dashboardlayout')

@section('title', 'Category')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Consultant
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3">
     
    <div class="mb-5 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            Add Consultant 
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('consultantcategory.stored')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Consultant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="consultant_name" class="form-label">Consultant Name</label>
                            <input type="text" name="consultant_name" id="consultant_name" class="form-control" placeholder="Enter consultant name" required>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Consultant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

    {{-- Update Modals for Consultant Category --}}
@foreach($consultantcategory as $catd)
<div class="modal fade" id="updateModal{{$catd->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$catd->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('consultantcategory.update', $catd->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel{{$catd->id}}">Update Consultant Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateCategoryName{{$catd->id}}" class="form-label">Consultant Name</label>
                        <input type="text" name="consultant_name" id="updateCategoryName{{$catd->id}}" class="form-control" value="{{ $catd->consultant_name }}" required>
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

        @foreach($consultantcategory as $cat)

        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->consultant_name}}</td>
            <td>{{ $cat->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $cat->updated_at->format('d M Y - h:i A') }}</td>
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
@foreach($consultantcategory as $modalCat)
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
                <form action="{{ route('consultantcategory.delete', $modalCat->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
</div>
@endsection
