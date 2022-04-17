@extends('admin.applayout')

@section('title', 'Item Display')


@section('content')
<div style="margin: 25px">
    <br>
<h3>Add Food Menu</h3>
<br>
<form action="{{ route('update-food', $food->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputtitel1">Title</label>
      <input type="text" name="title" value="{{ $food->title }}" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter title">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Price</label>
      <input type="text" name="price" value="{{ $food->price }}" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
    </div>
    <div class="form-group">
        <label for="image">Old Image</label>
        <img src="{{ asset('/storage/imagesupload/'. $food->image) }}" height="200" width="200" class="form-control-file"/>
      </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" value="{{ $food->description }}" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
    <button type="submit" class="btn btn-primary" style="color: black;" >Submit</button>
  </form>
</div>
@endsection
