@extends('admin.applayout')

@section('title', 'Item Display')


@section('content')
<div style="margin: 25px">
<h3>Chefs Detail</h3>
<br>
<form action="{{ route('view-chef') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Name">
      </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image</label>
        <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Select Chef Type</label>
      <select class="form-control form-control-lg" name="chefoption">
        <option>Chef Type</option>
        <option>Pizza Expert</option>
        <option>Burger Expert</option>
        <option>Desserts Expert</option>
      </select>
      </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
  </form>
<br>
<br>

{{-- Chefs Manage --}}

@php
    $sum = 0;
@endphp
<div class="container">
    <div>Manage Chefs</div>
    <br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($chefs as $chef)
      <tr>
        <th scope="row">{{ $sum = $sum + 1; }}</th>
        <td>{{ $chef->name }}</td>
        <td><img src="{{ asset('/storage/imagesupload/'. $chef->image) }}"/></td>
        <td>{{ $chef->cheftype }}</td>
        <td>
            <a class="btn btn-outline-danger" href="{{ url('/deletechef', $chef->id) }}">Delete</a>
                <a class="btn btn-outline-primary" href="{{ url('/updatechef', $chef->id) }}">Update</a>
        </td>
      </tr>
      @endforeach
      @php
          $sum++;
      @endphp
    </tbody>
  </table>
</div>
@endsection
