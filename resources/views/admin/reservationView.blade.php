@extends('admin.applayout')

@section('title', 'Reservationy')


@section('content')

@php
    $sum = 0;
@endphp
    <table style="margin: 10px" class="table">
        <thead>
          <tr>
            <th scope="col">No#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Persons</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
          <tr>
            <th scope="row">{{ $sum = $sum + 1; }}</th>
            <td>{{ $reservation->name }}</td>
            <td>{{ $reservation->email }}</td>
            <td>{{ $reservation->number }}</td>
            <td>{{ $reservation->persons }}</td>
            <td>{{ $reservation->date }}</td>
            <td>{{ $reservation->time }}</td>
            <td>{{ $reservation->message }}</td>

            <td>
                <a class="btn btn-outline-danger" href="{{ url('/completed', $reservation->id) }}">Completed</a>
            </td>
          </tr>
          @endforeach
          @php
              $sum++;
          @endphp
        </tbody>
      </table>
@endsection
