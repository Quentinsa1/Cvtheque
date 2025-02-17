<nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <div class="navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/7Elite.svg') }}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Bienvenue, Administrateur</h4>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item">
          <h4 class="mb-0 font-weight-bold d-none d-xl-block">
            <?php 
                $startDate = date("M d, Y"); // Date actuelle
                $endDate = date("M d, Y", strtotime("+30 days")); // Ajoute 30 jours à la date actuelle
                echo "$startDate - $endDate";
            ?>
        </h4>
                </li>
        <li class="nav-item dropdown me-1">
          <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
            <i class="mdi mdi-calendar mx-0"></i>
            <span class="count bg-info">2</span>
          </a>
         
        </li>
        <li class="nav-item dropdown me-2">
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="mdi mdi-email-open mx-0"></i>
            <span class="count bg-danger">1</span>
          </a>
         
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
    <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
      <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
              <form action="{{ route('admin.cvsearch') }}" method="GET">
                  <div class="input-group">
                      <input type="text" class="form-control" name="query" placeholder="Rechercher un profil..." aria-label="search" aria-describedby="search">
                      <button type="submit" class="btn btn-primary">Rechercher</button>
                  </div>
              </form>
          </li>
      </ul>
  </div>
  
  </nav>