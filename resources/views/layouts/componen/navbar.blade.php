<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item menu-open">
        <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" role="button">
        <span class="glyphico"></span> logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    

    <!-- SEARCH FORM -->
  
    <!-- Right navbar links -->
  
  </nav>