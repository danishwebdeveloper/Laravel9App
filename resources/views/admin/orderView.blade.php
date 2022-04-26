@extends('admin.applayout')

@section('title', 'Item Display')


@section('content')
<div class="container">
<h2 style="margin: 15px;">Customer Order</h2>

<form action="{{ route('search-order') }}" method="get">
<div class="input-group">
    <div class="form-outline">
      <input type="search" placeholder="search..." name="searchOrder" id="form1" class="form-control" />
      {{-- <label class="form-label" for="form1">Search</label> --}}
    </div>
    <input type="submit" name="btn" value="Search" class="btn btn-outline-primary">
      {{-- <i class="fas fa-search"></i> --}}
    </input>
  </div>
</form>
@php
    $sum = 0;
    $total = 0;
@endphp

    <table style="margin: 10px" class="table">
        <thead>
          <tr>
            <th scope="col">No#</th>
            <th scope="col">FoodName</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Number</th>
            <th scope="col">Customer Address</th>
            <th scope="col">Total Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($foodOrders as $food)
            @php
                $total = $total + ($food->price * $food->quantity)
            @endphp

          <tr>
            <th scope="row">{{ $sum = $sum + 1; }}</th>

            <td>{{ $food->foodname }}</td>
            <td>${{ $food->price }}</td>
            <td>{{ $food->quantity }}</td>
            <td>{{ $food->username }}</td>
            <td>{{ $food->cellphone }}</td>
            <td>{{ $food->address }}</td>
           <td> {{ $singletotal = $food->price * $food->quantity }}</td>
            <td>
                <a class="btn btn-outline-danger" href="{{ url('/deleteitem', $food->id) }}">Completed</a>
            </td>
          </tr>
          @endforeach
          @php
              $sum++;
          @endphp

        </tbody>
      </table>
      <div class="alert alert-primary">
        The Total Amount is: {{ $total }}
    </div>
    </div>
@endsection
