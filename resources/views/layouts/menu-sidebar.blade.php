<div class="app-menu navbar-menu">
  <!-- LOGO -->
  <div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="#" class="logo logo-dark">
      <span class="logo-sm">
          <img src="assets/images/logo-sm.png" alt="" height="22">
      </span>
      <span class="logo-lg">
          <img src="assets/images/logo-dark.png" alt="" height="17">
      </span>
    </a>
    <!-- Light Logo-->
    <a href="home" class="logo logo-light">
      <span class="logo-sm">
          <img src="assets/images/logo-sm.png" alt="" height="22">
      </span>
      <span class="logo-lg">
          <img src="assets/images/logo-light.png" alt="" height="17">
      </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
      <i class="ri-record-circle-line"></i>
    </button>
  </div>

  <div id="scrollbar">
    <div class="container-fluid">

      <div id="two-column-menu">
      </div>
      <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Listados y Registros</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarDashboards">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('alumnos.index') }}" class="nav-link" data-key="t-analytics"> Alumnos </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profesores.index') }}" class="nav-link" data-key="t-analytics"> Profesores </a>
                    </li>
                </ul>
            </div>
        </li> <!-- end Dashboard Menu -->


        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
              <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-authentication">APIS</span>
          </a>
          <div class="collapse menu-dropdown" id="sidebarAuth">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Prueba
                  </a>
                  <div class="collapse menu-dropdown" id="sidebarSignIn">
                    <ul class="nav nav-sm flex-column">
                      <li class="nav-item">
                          <a href="dni" class="nav-link" data-key="t-basic"> DNI </a>
                      </li>
                      <li class="nav-item">
                          <a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> RUC </a>
                      </li>
                    </ul>
                  </div>
                </li>


                <li class="nav-item">
                    <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors" data-key="t-errors"> Errors
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarErrors">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="auth-404-basic.html" class="nav-link" data-key="t-404-basic"> 404 Basic </a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-404-cover.html" class="nav-link" data-key="t-404-cover"> 404 Cover </a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-404-alt.html" class="nav-link" data-key="t-404-alt"> 404 Alt </a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-500.html" class="nav-link" data-key="t-500"> 500 </a>
                            </li>
                            <li class="nav-item">
                                <a href="auth-offline.html" class="nav-link" data-key="t-offline-page"> Offline Page </a>
                            </li>
                        </ul>
                    </div>
                </li>
              </ul>
          </div>
        </li>

      </ul>
    </div>
    <!-- Sidebar -->
  </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->