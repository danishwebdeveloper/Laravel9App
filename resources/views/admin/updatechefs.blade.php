<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="../admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../admin/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../admin/assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="../admin/assets/css/shared/style.css">
    <link rel="stylesheet" href="../admin/assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="../admin/assets/images/favicon.ico" />

  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="{{ url('/') }}">
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
      {{-- Flash Message --}}
     @if(session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
     </div>
   @endif
<div style="margin: 25px">
<h3>Chefs Detail</h3>
<br>
<form action="{{ route('update-chef', $chef->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" class="form-control" value="{{ $chef->name }}" name="name" id="formGroupExampleInput" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Old Image</label>
        <img height="200" width="200" src="{{ asset('/storage/imagesupload/'. $chef->image) }}" />
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
</div>
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/js/vendor.bundle.addons.js"></script>
<script src="assets/js/shared/off-canvas.js"></script>
<script src="assets/js/shared/misc.js"></script>
<script src="assets/js/demo_1/dashboard.js"></script>
<script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
</body>
</html>
