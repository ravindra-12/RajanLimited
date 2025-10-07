@extends('partial.dashboardlayout')

@section('title', 'ServiceRequest')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Service Request
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3">
     
    <div class="mb-5 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            Add Service Request
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('servicerequest.store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Service Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label"> Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control" placeholder="Enter Service Request" required>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}
    
      
<table id="example" class="table table-responsive table-striped" style="width:100%; ">
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

        @foreach($servicerequest as $servicereq)

        <tr>
            <td>{{$servicereq->id}}</td>
            <td>{{$servicereq->name}}</td>
            <td>{{ $servicereq->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $servicereq->updated_at->format('d M Y - h:i A') }}</td>
            <td>
                <a href="" class="btn btn-primary btn-sm">Update</a>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$servicereq->id}}">
                    Delete
                </button>
            </td>
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>


@foreach($servicerequest as $modalservicereq)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalservicereq->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalservicereq->id }}" aria-hidden="true">
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
                <form action="{{ route('servicerequest.delete', $modalservicereq->id) }}" method="POST">
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
