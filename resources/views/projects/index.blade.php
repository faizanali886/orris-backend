@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
 <div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h1>Projects</h1>
        </div>
        <div class="col-6">
            <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add Project</button>
        </div>
    </div>
 </div>
@stop
@section('content')
<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Cover</th>
                <th scope="col">Images</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td><img src="{{ $project->cover }}" alt="{{ $project->cover }}" class="rounded-circle" width="100px" height="100px"></td>
                <td>
                    @foreach ($project->projectDetails as $projectDetail)
                        <img src="{{ $projectDetail->link }}" alt="" class="rounded-circle" width="100px" height="100px">
                    @endforeach
                </td>
                <td>
                    <button class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#editModal-{{ $project->id }}"  data-project="{{ $project }}"><i class="fa fa-pencil"></i>Edit</button>
                    <a href="{{ route('projects.destroy', $project->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal-{{$project->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" method="POST" action="{{ route('projects.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="hidden" name="id" value="{{ $project->id }}">
                                    <input type="text" class="form-control" name="title" value="{{ $project->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="cover">Cover</label>
                                    <input type="text" class="form-control" name="cover" value="{{ $project->cover }}">
                                </div>
                                @foreach ($project->projectDetails as $detail)
                                <div class="editedImageInputs">
                                    <div class="form-group">
                                        <label for="cover">Image Url {{ $loop->iteration }}</label>
                                        <input type="text" class="form-control" name="images[]" value="{{ $detail->link }}">
                                    </div> 
                                </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('projects.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="text" class="form-control" name="cover" required>
                    </div>
                    <div id="imageInputs">
                        <div class="form-group">
                            <label for="projectImage1">Image URL 1</label>
                            <input type="text" class="form-control" id="projectImage1" name="images[]" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="addImageInput">
                        <i class="fa fa-plus"></i> Add More Images
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .table-dark td, .table-dark th {
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .link {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: #d1ecf1;
    }
    .link:hover {
        color: #b8daff; 
        text-decoration: underline;
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>

@stop

@section('js')
    <script>

    document.addEventListener('DOMContentLoaded', (event) => {
        let imageInputCount = 1;

        document.getElementById('addImageInput').addEventListener('click', function () {
            if (imageInputCount < 6) {
                imageInputCount++;
                let imageInputsDiv = document.getElementById('imageInputs');
                let newImageInputDiv = document.createElement('div');
                newImageInputDiv.classList.add('form-group');
                newImageInputDiv.innerHTML = `
                    <label for="projectImage${imageInputCount}">Image URL ${imageInputCount}</label>
                    <input type="text" class="form-control" id="projectImage${imageInputCount}" name="images[]" required>
                `;
                imageInputsDiv.appendChild(newImageInputDiv);
            }
        });
    });
    </script>
@stop