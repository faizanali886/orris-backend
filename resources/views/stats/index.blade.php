@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Statistics</h1>
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
                <th scope="col">Countries</th>
                <th scope="col">Client</th>
                <th scope="col">Projects</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $stats->countries }}</td>
                <td>{{ $stats->clients }}</td>
                <td>{{ $stats->projects }}</td>
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
                <form id="editForm" method="POST" action="{{ route('stats.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="countries">Countries</label>
                        <input type="hidden" value="{{ $stats->id }}" name="id" id="edit-id">
                        <input type="number" value="{{ $stats->countries }}" class="form-control" id="countries" name="countries">
                    </div>
                    <div class="form-group">
                        <label for="clients">Clients</label>
                        <input type="number" value="{{ $stats->clients }}" class="form-control" id="clients" name="clients">
                    </div>
                    <div class="form-group">
                        <label for="projects">Projects</label>
                        <input type="number" value="{{ $stats->projects }}" class="form-control" id="projects" name="projects">
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