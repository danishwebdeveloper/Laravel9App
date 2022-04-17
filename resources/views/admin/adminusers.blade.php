@extends('admin.applayout')
@section('title', 'Admin User')

@section('content')

       <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

             @php
                 $sum = 0;
             @endphp

              <div class="col-md-8 grid-margin stretch-card">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                      <tr>
                        <th scope="row">{{ $sum = $sum + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->usertype == '1')
                            <a class="btn btn-outline-danger disabled" href="">Delete</a>
                            @else
                            <a class="btn btn-outline-danger" href="{{ url('/deleteuser', $user->id) }}">Delete</a>
                            @endif

                        </td>
                      </tr>
                      @endforeach
                      @php
                        $sum++;
                      @endphp
                    </tbody>
                  </table>
              </div>

          </div>
          </div>
       </div>
@endsection


