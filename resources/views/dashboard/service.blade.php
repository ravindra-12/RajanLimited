@extends('partial.dashboardlayout')

@section('title', 'Project')

@include('partial.bootstrap')
 
@section('content')
<h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
    All Service
  </h3>
<div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<div class="my-3">
     
    <div class="mb-5 d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            Add Service
        </button>
    </div>
    
    {{-- Modal Start --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <form action="{{route('service.store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Service Category</label>
                            <select name="servicecategory_id" id="servicecategory_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($servicecategory as $category)
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
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

  
@foreach($services as $service)
<div class="modal fade" id="updateModal{{$service->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$service->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('service.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel{{$service->id}}">Update Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body
">
                    <div class="mb-3">
                        <label for="updateServiceCategory{{$service->id}}" class="form-label">Service Category</label>
                        <select name="servicecategory_id" id="updateServiceCategory{{$service->id}}" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($servicecategory as $category)
                                <option value="{{ $category->id }}" {{ $service->servicecategory_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="updateTitle{{$service->id}}" class="form-label">Title</label>
                        <input type="text" name="title" id="updateTitle{{$service->id}}" class="form-control" value="{{ $service->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateDescription{{$service->id}}" class="form-label">Description</label>
                        <textarea name="description" id="updateDescription{{$service->id}}" class="form-control" rows="6" required>{{ $service->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<div class="table-responsive">
<table id="example" class="table table-striped" style="width:100%; ">
    <thead class="bg-primary">
        <tr>
            <th>#</th>
            <th>Service Title</th>
         
            {{-- <th>Category</th> --}}
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        @foreach($services as $service)

        <tr>
            <td>{{$service->id}}</td>
            <td>{{$service->title}}</td>
           
            {{-- <td>{{$service->servicecategory->name}}</td> --}}
            <td>{{ $service->created_at->format('d M Y - h:i A') }}</td>
            <td>{{ $service->updated_at->format('d M Y - h:i A') }}</td>
            {{-- <td>
                <a href="" class="btn btn-primary btn-sm">Update</a>
            </td> --}}
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{$service->id}}">
                    Update
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$service->id}}">
                    Delete
                </button>
            </td>
        </tr>
        
        
        @endforeach
       
       
    </tbody>
   
</table>
</div>

{{-- Delete Confirmation Modal --}}
@foreach($services as $modalservice)
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal{{ $modalservice->id }}" tabindex="-1" 
     aria-labelledby="deleteModalLabel{{ $modalservice->id }}" aria-hidden="true">
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
                <form action="{{ route('service.delete', $modalservice->id) }}" method="POST">
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

  // Initialize CKEditor for all Edit Service modals
  document.querySelectorAll('textarea[id^="updateDescription"]').forEach(function(textarea) {
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
