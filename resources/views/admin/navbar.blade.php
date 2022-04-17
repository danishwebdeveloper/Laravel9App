<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">

        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/users') }}">
            <i class="menu-icon typcn typcn-document-text"></i>
            <span class="menu-title">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon typcn typcn-coffee"></i>
            <span class="menu-title">Chefs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/foodmenu') }}">
            <i class="menu-icon typcn typcn-shopping-bag"></i>
            <span class="menu-title">Add Foods</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/showfood') }}">
              <i class="menu-icon typcn typcn-shopping-bag"></i>
              <span class="menu-title">Food Menus</span>
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/charts/chartjs.html">
            <i class="menu-icon typcn typcn-th-large-outline"></i>
            <span class="menu-title">Reservation</span>
          </a>
        </li>
      </ul>
    </nav>

