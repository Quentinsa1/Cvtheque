<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <div class="sidebar-header">
            <img src="{{ asset('assets/images/7Elite.svg') }}" alt="Logo" class="brand-logo">
        </div>

        <li class="nav-item sidebar-category">
            <p>Navigation</p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Tableau de bord</span>
                <span class="badge badge-info badge-pill">7GE</span>
            </a>
        </li>

        <li class="nav-item sidebar-category">
            <p>Composants</p>
        </li>
        <li class="nav-item">
            <a class="nav-link with-submenu" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Ajout un CV</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse submenu" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.cvform') }}">Ajouter CV</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('optimize.form') }}">Améliorer un CV</a></li>
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
        </li>
        <li class="nav-item">
            <a class="nav-link with-submenu" data-bs-toggle="collapse" href="#auth" aria-expanded="false">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Informations Utilisateurs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse submenu" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Information Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/samples/lock-screen.html">Agenda Personnel</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item sidebar-category">
            <p>Apps</p>
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
                <button class="btn btn-danger logout-btn" type="submit">
                    <i class="mdi mdi-logout"></i> Déconnexion
                </button>
            </form>
        </li>
    </ul>
</nav>

<style>
    .sidebar {
        background: #212529;
        color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .sidebar-header {
        text-align: center;
        padding: 20px;
    }

    .brand-logo {
        width: 120px;
    }

    .nav-item {
        margin-bottom: 5px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        border-radius: 6px;
        transition: all 0.3s ease-in-out;
        color: #ccc;
    }

    .nav-link:hover, .nav-link:focus {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .menu-title {
        flex-grow: 1;
    }

    .menu-icon {
        margin-right: 10px;
    }

    .submenu {
        padding-left: 15px;
        transition: all 0.3s ease-in-out;
    }

    .logout-btn {
        width: 100%;
        text-align: left;
        border: none;
        padding: 12px;
        font-size: 16px;
    }

    .logout-btn:hover {
        background: rgba(255, 0, 0, 0.2);
    }
</style>
