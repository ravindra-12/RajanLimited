@extends('partial.dashboardlayout')

@section('title', 'Enquiry')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Enquiry
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3"> 
      
<table id="example" class="table table-responsive table-striped" style="width:100%; ">
    <thead class="bg-primary">
        <tr>
         
            <th>Email</th>
            <th>Phone No</th>
            <th>Message</th>
            <th>Service Request</th>
            <th>Created Date</th>
           <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($enquiries as $item)

        <tr>
            <td>{{$item->email}}</td>
            <td>{{$item->phoneno}}</td>
            <td>{{ $item->comments }}</td>
            <td>{{$item->servicerequest}}</td>
            <td>{{ $item->created_at->format('d M Y - h:i A') }}</td>
           <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}">
                    Delete
                </button>
            </td>
           
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>
@foreach($enquiries as $modalitem)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalitem->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalitem->id }}" aria-hidden="true">
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
                <form action="{{ route('enqueiry.delete', $modalitem->id) }}" method="POST">
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
