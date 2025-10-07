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
            Add Project
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Project</h5>
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
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="Image" class="form-control" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="Enter description" required>
                        </div> --}}

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="6" ></textarea>
                        </div>
                        
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

@foreach($projects as $project)
<!-- Project Update Modal -->
<div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $project->id }}">Update Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="update_category_id_{{ $project->id }}" class="form-label">Category</label>
                        <select name="category_id" id="update_category_id_{{ $project->id }}" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="update_title_{{ $project->id }}" class="form-label">Title</label>
                        <input type="text" name="title" id="update_title_{{ $project->id }}" class="form-control" value="{{ $project->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_image_{{ $project->id }}" class="form-label">Image</label>
                        <input type="file" name="image" id="update_image_{{ $project->id }}" class="form-control">
                        @if($project->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $project->image) }}" width="100" alt="Current Image" />
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="update_description_{{ $project->id }}" class="form-label">Description</label>
                        <textarea name="description" id="update_description_{{ $project->id }}" class="form-control" rows="6">{{ $project->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Project</button>
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
            <th>Project Title</th>
            <th>Image</th>
            <th>Category</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($projects as $project)

        <tr>
            <td>{{$project->id}}</td>
            <td>{{$project->title}}</td>
            <td>
                <img src="{{ asset('storage/' . $project->image) }}" width="100" />
            </td>
            <td>{{$project->category->name}}</td>
            <td>{{ $project->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $project->updated_at->format('d M Y - h:i A') }}</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$project->id}}">
                    Update
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$project->id}}">
                    Delete
                </button>
            </td>
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>
@foreach($projects as $modalproject)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalproject->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalproject->id }}" aria-hidden="true">
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
                <form action="{{ route('project.delete', $modalproject->id) }}" method="POST">
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

{{--  --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
<script>
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

  // Initialize CKEditor for all Edit Project modals
  document.querySelectorAll('textarea[id^="update_description_"]').forEach(function(textarea) {
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
