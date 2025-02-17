<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <img src="{{ asset('assets/images/7Elite.svg') }}" alt="">
      <li class="nav-item sidebar-category">
        <p>Navigation</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="mdi mdi-view-quilt menu-icon"></i>
          <span class="menu-title">Tableau de bord</span>
          <div class="badge badge-info badge-pill">7GE</div>
        </a>
      </li>
      <li class="nav-item sidebar-category">
        <p>Composants</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-palette menu-icon"></i>
          <span class="menu-title">Ajout un CV</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.cvform') }}">Ajouter CV</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Améliorer un CV</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.cvlist') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Liste CV Enregistrés</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.jobform') }}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Enregistrer une offre</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.joblist') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Liste Offres</span>
        </a>
      </li>
    
      <li class="nav-item sidebar-category">
        <p>Pages</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Informations Utilisateurs</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Information Admin </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Agenda Personnel </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item sidebar-category">
        <p>Apps</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="docs/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
      <li class="nav-item">
        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button class="btn bg-danger btn-sm menu-title" type="submit">Déconnexion</button>
        </form>
     </li>
    
    </ul>
  </nav>