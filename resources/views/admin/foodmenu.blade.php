@extends('admin.applayout')

@section('title', 'Admin Food Menu')

@section('content')

<div style="margin: 25px">
    <br>
<h3>Add Food Menu</h3>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('uploads-food') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputtitel1">Title</label>
      <input type="text" name="title" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter title">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Price</label>
      <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
    </div>
        <div class="form-group">
          <label for="image">Example file input</label>
          <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
    <button type="submit" class="btn btn-primary" style="color: black;" >Submit</button>
  </form>

</div>
@endsection
