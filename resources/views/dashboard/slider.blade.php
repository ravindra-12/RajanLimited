@extends('partial.dashboardlayout')

@section('title', 'Slider')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Slider
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3">
     
    <div class="mb-5 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#slider">
            Add Slider
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="slider" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="Image" class="form-control" required>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

 
@foreach($slider as $slide)
<div class="modal fade" id="updateModal{{$slide->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$slide->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('slider.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel{{$slide->id}}">Update Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="Image" class="form-control">
                        @if($slide->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $slide->image) }}" width="100" alt="Current Image" />
                            </div>
                        @endif
                    </div>  
                    <div class="mb-3">
                        <label for="created_at" class="form-label
">Created Date</label>
                        <input type="text" name="created_at" id="created_at" class="form-control" value="{{ $slide->created_at->format('d M Y - h:i A') }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Updated Date</label>
                        <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{ $slide->updated_at->format('d M Y - h:i A') }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Slider</button>
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
            <th>Image </th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($slider as $slide)

        <tr>
            <td>{{$slide->id}}</td>
            <td>
                <img src="{{ asset('storage/' . $slide->image) }}" width="100" />
            </td>
            <td>{{ $slide->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $slide->updated_at->format('d M Y - h:i A') }}</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{$slide->id}}">
                    Update
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$slide->id}}">
                    Delete
                </button>
            </td>
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>
@foreach($slider as $modalslide)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalslide->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalslide->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('slider.delete', $modalslide->id) }}" method="POST">
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
