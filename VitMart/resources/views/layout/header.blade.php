<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="{{ url("/") }}" class="nav-link">Home</a></li>
          </ul>
          <ul class="navbar-nav ms-auto">
            
            <!--begin::Cart Icon Menu-->
            <li class="nav-item dropdown">
          <div style="position:sticky; top: 5.5px; right: 185px;">
            <a href="{{ route('keranjang') }}" class="text-dark position-relative">
              <i class="bi bi-cart3" style="font-size: 30px;"></i>
              <span id="keranjang-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $jumlahJenisProduk }}
              </span>
            </a>
          </div>
             
            </li>
            <!--end::Cart Icon Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="{{ asset("assets/assets/img/user2-128x128.jpg") }}"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="{{ asset("/assets/assets/img/user1-128x128.jpg") }}"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                  {{ auth()->user()->name }} - {{ auth()->user()->email }}
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="{{ url("/logout") }}" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
