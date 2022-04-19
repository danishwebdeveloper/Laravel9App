
<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            @if (Route::has('login'))
                            @auth
                            <li class="scroll-to-section"><a href="{{ url('/foodmenu') }}">Menu</a></li>
                            @endauth
                            @endif
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>

                            @auth
                            <li style="background-color: lightblue" class="scroll-to-section">
                                <a href="{{ url('/showcart', Auth::user()->id) }}">AddtoCart[{{ $count }}]</a>
                            </li>
                            @endauth

                            @guest
                            <li style="background-color: lightblue" class="scroll-to-section"><a href="{{ url('/login') }}">Cart</a></li>

                            @endguest
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                <x-app-layout>
                                </x-app-layout>
                                   @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    {{-- Body --}}
<div class="container">

    <br>
    <br>
    <br>
    <br>
    <br>
    <h2>Ordered!!</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No#</th>
            <th scope="col">Food Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <form action="{{ route('order-confirmation') }}" method="POST">
            @csrf
        <tbody>
            @foreach ($carOrders as $carOrder)
          <tr>
            <th scope="row">1</th>

            <td>
                <input type="text" name="foodname[]" value="{{ $carOrder->title}}" hidden/>
                {{ $carOrder->title}}
            </td>
            <td>
                <input type="text" name="price[]" value=" {{ $carOrder->price }}" hidden />
                {{ $carOrder->price }}
            </td>
            <td>
                <input type="text" name="quantity[]" value="{{ $carOrder->quantity }}" hidden/>
                {{ $carOrder->quantity }}
            </td>
          </tr>
          @endforeach
          @foreach ($deleteData as $data)
         <td> <a class="btn btn-outline-danger small" href="{{ url('/deletecartitem', $data->id) }}">Remove</a> </td>

         @endforeach
        </tbody>
      </table>
      <div>
          <a class="btn btn-primary" id="orderBtn">Order Now</a>
      </div>
    </div>
    <div id="orderForm" class="container" style="display: none;">
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="number" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="num" id="num" placeholder="Phonenumber">
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Your Address</label>
            <div class="col-sm-10">
                <input type="textarea" class="form-control" name="address" id="address" placeholder="Address">
            </div>
        </div>

        <button type="submit" id="orderConfirmation" class="btn btn-outline-primary">Order Confirmed</button>
        <button type="submit" id="closeBtn" class="btn btn-outline-danger">Close</button>
</div>
</form>
  <!-- jQuery -->

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  {{-- jQuery For Order Confirmation --}}
   <script>
        $(function(){
          $('#orderBtn').on('click', function(){
              $('#orderForm').show();
          });

          $('#closeBtn').on('click', function(){
                $('#orderForm').hide();
           });
        });
    </script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>
  </body>

