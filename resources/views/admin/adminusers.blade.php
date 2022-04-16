<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>

    @include('admin.admincss')

  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="admin/assets/images/logo.svg" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="admin/index.html">
            <img src="admin/assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <x-app-layout>
            </x-app-layout>
        </div>
      </nav>
      <!-- partial -->
      @include('admin.navbar')
       <!-- partial -->

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

    </div>

    @include('admin.adminscripts')
  </body>
</html>

