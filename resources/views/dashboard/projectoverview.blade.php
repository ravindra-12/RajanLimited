@extends('partial.dashboardlayout')

@section('title', 'Project')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Project
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3">
     
    <div class="mb-5 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            Add Project Overview
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('projectoverview.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Project Overview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                        </div>
                       
                       

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="6" ></textarea>
                        </div>
                        
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Project Overview</button>
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
            <th>Category</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($projectoverviews as $projectoverview)

        <tr>
            <td>{{$projectoverview->id}}</td>
            <td>{{$projectoverview->title}}</td>
            <td>{!! $projectoverview->description !!}</td>
           
            <td>{{$projectoverview->category->name}}</td>
            <td>{{ $projectoverview->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $projectoverview->updated_at->format('d M Y - h:i A') }}</td>
            {{-- <td>
                <a href="" class="btn btn-primary btn-sm">Update</a>
            </td> --}}
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$projectoverview->id}}">
                    Update
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$projectoverview->id}}">
                    Delete
                </button>
            </td>
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>
@foreach($projectoverviews as $modalprojectoverview)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalprojectoverview->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalprojectoverview->id }}" aria-hidden="true">
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
                <form action="{{ route('projectoverview.delete', $modalprojectoverview->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($projectoverviews as $projectoverview)
<!-- Project Overview Edit Modal -->
<div class="modal fade" id="editModal{{ $projectoverview->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $projectoverview->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('projectoverview.update', $projectoverview->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $projectoverview->id }}">Edit Project Overview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $projectoverview->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $projectoverview->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description-{{ $projectoverview->id }}" class="form-control" rows="6" required>{{ $projectoverview->description }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Project Overview</button>
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
