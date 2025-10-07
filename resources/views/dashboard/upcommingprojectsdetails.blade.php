@extends('partial.dashboardlayout')

@section('title', 'Consultant')

@include('partial.bootstrap')

@section('content')
    <h3 class="text-center text-2xl my-4" style="color: #2c3e50; border-bottom: 2px solid #3498db;  padding-bottom: 5px;">
        All Upcomming Projects
    </h3>
    <div class="container p-4 my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <div class="my-3">

            <div class="mb-5 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                    Add Upcomming Projects
                </button>
            </div>

            {{-- Modal Start --}}
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('upcommingproject.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Upcomming Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="upcommingproject_id" class="form-label">Uocomming Project Name </label>
                                    <select name="upcommingproject_id" id="upcommingproject_id" class="form-control"
                                        required>
                                        <option value="">Select Upcomming Project</option>
                                        @foreach ($upcommingprojectsname as $name)
                                            <option value="{{ $name->id }}">{{ $name->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="Title" id="title" class="form-control"
                                        placeholder="Enter Title" required>
                                </div>



                                <div class="mb-3">
                                    <label for="Description" class="form-label">Description</label>
                                    <textarea name="Description" id="Description" class="form-control" rows="6"></textarea>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Upcomming Project</button>
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
                        <th>Project Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($upcommingprojects as $upcommingprojectsdetails)
                        <tr>
                            <td>{{ $upcommingprojectsdetails->id }}</td>
                            <td>{{ $upcommingprojectsdetails->Title }}</td>
                            <td>{{ Str::limit(strip_tags($upcommingprojectsdetails->Description), 100, '...') }}</td>
                            <td>{{ $upcommingprojectsdetails->upcommingprojectname ? $upcommingprojectsdetails->upcommingprojectname->name : 'N/A' }}
                            </td>


                            <td>{{ $upcommingprojectsdetails->created_at->format('d M Y - h:i A') }}</td>
                            <td>{{ $upcommingprojectsdetails->updated_at->format('d M Y - h:i A') }}</td>
                            {{-- <td>
                <a href="" class="btn btn-primary btn-sm">Update</a>
            </td> --}}
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $upcommingprojectsdetails->id }}">
                                    Update
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $upcommingprojectsdetails->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
            @foreach ($upcommingprojects as $project)
                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1"
                    aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Delete Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this project?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('upcommingproject.delete', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($upcommingprojects as $project)
                <!-- Project Edit Modal -->
                <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1"
                    aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('upcommingproject.update', $project->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $project->id }}">Edit Upcoming Project
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="upcommingproject_id_{{ $project->id }}" class="form-label">Project
                                            Name</label>
                                        <select name="upcommingproject_id" id="upcommingproject_id_{{ $project->id }}"
                                            class="form-control" required>
                                            <option value="">Select Project</option>
                                            @foreach ($upcommingprojectsname as $name)
                                                <option value="{{ $name->id }}"
                                                    {{ $project->upcommingproject_id == $name->id ? 'selected' : '' }}>
                                                    {{ $name->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="title_{{ $project->id }}" class="form-label">Title</label>
                                        <input type="text" name="Title" id="title_{{ $project->id }}"
                                            class="form-control" value="{{ $project->Title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description_{{ $project->id }}"
                                            class="form-label">Description</label>
                                        <textarea name="Description" id="description_{{ $project->id }}" class="form-control" rows="6" required>{{ $project->Description }}</textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Project</button>
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
        // Initialize CKEditor for the Add Project modal
        ClassicEditor
            .create(document.querySelector('#Description'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .catch(error => {
                console.error(error);
            });

        // Initialize CKEditor for all Edit Project modals
        document.querySelectorAll('textarea[id^="description_"]').forEach(function(textarea) {
            ClassicEditor
                .create(textarea, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList']
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
