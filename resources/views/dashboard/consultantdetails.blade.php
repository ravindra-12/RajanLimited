@extends('partial.dashboardlayout')

@section('title', 'Consultant')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Consultant
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3">
     
    <div class="mb-5 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            Add Consultant Details
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('consultantdetails.store')}}" method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Consultant Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="consultant_id" class="form-label">consultant name</label>
                            <select name="consultant_id" id="consultant_id" class="form-control" required>
                                <option value="">Select Consultant</option>
                                @foreach($consultantname as $name)
                                    <option value="{{ $name->id }}">{{ $name->consultant_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="Title" id="title" class="form-control" placeholder="Enter Title" required>
                        </div>
                       
                       

                        <div class="mb-3">
                            <label for="Description" class="form-label">Description</label>
                            <textarea name="Description" id="Description" class="form-control" rows="6" ></textarea>
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
    
      
<table id="example" class="table table-striped" style="width:100%; ">
    <thead class="bg-primary">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Consultant Name</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($consultant as $consultantdetails)

        <tr>
            <td>{{$consultantdetails->id}}</td>
            <td>{{$consultantdetails->Title}}</td>
           <td>{!! Str::words($consultantdetails->Description, 25, '...') !!}</td>
             <td>{{ $consultantdetails->consultantcategory->consultant_name }}</td>
           
           
            <td>{{ $consultantdetails->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $consultantdetails->updated_at->format('d M Y - h:i A') }}</td>
            {{-- <td>
                <a href="" class="btn btn-primary btn-sm">Update</a>
            </td> --}}
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$consultantdetails->id}}">
                    Update
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$consultantdetails->id}}">
                    Delete
                </button>
            </td>
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>
@foreach($consultant as $modalconsultant)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalconsultant->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalconsultant->id }}" aria-hidden="true">
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
                <form action="{{ route('consultantdetails.delete', $modalconsultant->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($consultant as $consultantedit)
<!-- Project Overview Edit Modal -->
<div class="modal fade" id="editModal{{ $consultantedit->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $consultantedit->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('consultantdetails.update', $consultantedit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $consultantedit->id }}">Edit Consultant Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="consultant_id" id="consultant_id" class="form-control" required>
                            <option value="">Select Consultnat</option>
                            @foreach($consultantname as $name)
                                <option value="{{ $name->id }}" {{ $consultantedit->consultant_id == $name->id ? 'selected' : '' }}>{{ $name->consultant_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="Title" id="title" class="form-control" value="{{ $consultantedit->Title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="Description" id="description-{{ $consultantedit->id }}" class="form-control" rows="6" required>{{ $consultantedit->Description }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Consultant Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
</div>
</div>

{{-- CKEditor Script --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>

<script>
  // Initialize CKEditor for the Add Project Overview modal
  ClassicEditor
    .create(document.querySelector('#description'), {
      toolbar: {
        items: [
          'heading', '|',
          'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
          'blockQuote', 'imageUpload', 'mediaEmbed', 'undo', 'redo'
        ]
      },
      language: 'en',
      image: {
        toolbar: ['imageTextAlternative', 'toggleImageCaption', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side']
      }
    })
    .catch(error => {
      console.error(error);
    });

  // Initialize CKEditor for all Edit Project Overview modals
  document.querySelectorAll('textarea[id^="description-"]').forEach(function(textarea) {
    ClassicEditor
      .create(textarea, {
        toolbar: {
          items: [
            'heading', '|',
            'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
            'blockQuote', 'imageUpload', 'mediaEmbed', 'undo', 'redo'
          ]
        },
        language: 'en',
        image: {
          toolbar: ['imageTextAlternative', 'toggleImageCaption', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side']
        }
      })
      .catch(error => {
        console.error(error);
      });
  });
</script>
@endsection
