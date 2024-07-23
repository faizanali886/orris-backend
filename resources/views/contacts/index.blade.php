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
        <div class="col-12">
            <h1>Contacts</h1>
        </div>
    </div>
 </div>
@stop
@section('content')
<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
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