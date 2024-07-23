@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>banner</h1>
@stop
@section('content')
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
<div class="table-responsive">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Video Link</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $banner->title }}</td>
                <td><a href="{{ $banner->video_link }}" target="__blank" class="link">{{ $banner->video_link }}</a></td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i>Edit</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('banner.update') }}">
                    @csrf
                    <div class="form-group">`
                        <label for="title">Title</label>
                        <input type="hidden" value="{{ $banner->id }}" name="id" id="edit-id">
                        <input type="text" value="{{ $banner->title }}" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="video_link">Video Link</label>
                        <input type="text" value="{{ $banner->video_link }}" class="form-control" id="video_link" name="video_link">
                    </div>
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop