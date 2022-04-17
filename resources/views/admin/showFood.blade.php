@extends('admin.applayout')

@section('title', 'Item Display')


@section('content')

@php
    $sum = 0;
@endphp
    <table style="margin: 10px" class="table">
        <thead>
          <tr>
            <th scope="col">No#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
          <tr>
            <th scope="row">{{ $sum = $sum + 1; }}</th>
            <td>{{ $food->title }}</td>
            <td>${{ $food->price }}</td>
            <td><img src="{{ asset('/storage/imagesupload/'. $food->image) }}" /></td>
            <td>{{ $food->description }}</td>
            <td>
                <a class="btn btn-outline-danger" href="{{ url('/deleteitem', $food->id) }}">Delete</a>
                <a class="btn btn-outline-primary" href="{{ url('/viewfood', $food->id) }}">Update</a>
            </td>
          </tr>
          @endforeach
          @php
              $sum++;
          @endphp
        </tbody>
      </table>
@endsection
