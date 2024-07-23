@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>About Us</h1>
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
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Titel</th>
                <th scope="col">Content</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $about->title }}</td>
                <td>{{ $about->content }}</td>
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
                <h5 class="modal-title" id="editModalLabel">Edit About Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('aboutus.update') }}">
                    @csrf
                    <div class="form-group">`
                        <label for="title">Title</label>
                        <input type="hidden" value="{{ $about->id }}" name="id" id="edit-id">
                        <input type="text" value="{{ $about->title }}" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ $about->content }}</textarea>
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

</style>

@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop