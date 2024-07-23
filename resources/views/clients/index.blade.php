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
            <h1>Clients</h1>
        </div>
        {{-- <div class="col-6">
            <button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add Client</button>
        </div> --}}
    </div>
 </div>
@stop
@section('content')
<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="{{ $client->image }}" target="__blank">{{ $client->image }}</a></td>
                <td>
                    <button class="btn btn-primary btn-sm edit-button" data-toggle="modal" data-target="#editModal"  data-client="{{ $client }}"><i class="fa fa-pencil"></i>Edit</button>
                    {{-- <a href="{{ route('clients.destroy', $client->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('clients.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input type="text" class="form-control" id="editImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="addModalLabel">Add Client</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="{{ route('clients.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="image">Image Link</label>
                        <input type="text" class="form-control" name="image">
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
    <script>
        $(document).ready(function () {
        $('.edit-button').click(function () {

            var data = $(this).data('service');

            $('#editId').val(data.id);
            $('#editTitle').val(data.title);
            $('#editImage').val(data.image);
        });
    });
    </script>
@stop