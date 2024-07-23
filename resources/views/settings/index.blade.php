@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Settings</h1>
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
                <th scope="col">Logo</th>
                <th scope="col">Vimeo</th>
                <th scope="col">Behance</th>
                <th scope="col">Instagram</th>
                <th scope="col">Facebook</th>
                <th scope="col">LinkedIn</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="{{ $settings->logo }}" alt="Orris Logo" style="max-width: 100px;"></td>
                <td><a href="{{ $settings->vimeoLink }}" target="__blank" class="link">{{ $settings->vimeoLink }}</a></td>
                <td><a href="{{ $settings->behanceLink }}" target="__blank" class="link">{{ $settings->behanceLink }}</a></td>
                <td><a href="{{ $settings->instgramLink }}" target="__blank" class="link">{{ $settings->instgramLink }}</a></td>
                <td><a href="{{ $settings->facebookLink }}" target="__blank" class="link">{{ $settings->facebookLink }}</a></td>
                <td><a href="{{ $settings->linkedinLink }}" target="__blank" class="link">{{ $settings->linkedinLink }}</a></td>
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
                <form id="editForm" method="POST" action="{{ route('settings.update') }}">
                    @csrf
                    <input type="hidden" value="{{ $settings->id }}" name="id" id="edit-id">
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="text" value="{{ $settings->logo }}" class="form-control" id="edit-logo" name="logo" required>
                    </div>
                    <div class="form-group">
                        <label for="vimeoLink">Vimeo</label>
                        <input type="text" value="{{ $settings->vimeoLink }}" class="form-control" id="edit-vimeo" name="vimeoLink">
                    </div>
                    <div class="form-group">
                        <label for="behanceLink">Behance</label>
                        <input type="text" value="{{ $settings->behanceLink }}" class="form-control" id="edit-behance" name="behanceLink">
                    </div>
                    <div class="form-group">
                        <label for="instgramLink">Instagram</label>
                        <input type="text" value="{{ $settings->instgramLink }}" class="form-control" id="edit-instagram" name="instgramLink">
                    </div>
                    <div class="form-group">
                        <label for="facebookLink">Facebook</label>
                        <input type="text" value="{{ $settings->facebookLink }}" class="form-control" id="edit-facebook" name="facebookLink">
                    </div>
                    <div class="form-group">
                        <label for="linkedinLink">LinkedIn</label>
                        <input type="text" value="{{ $settings->linkedinLink }}" class="form-control" id="edit-linkedin" name="linkedinLink">
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