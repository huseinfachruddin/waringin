 <div class="sidebar" data-color="purple" data-background-color="azure" data-image="../assets/img/sidebar-1.jpg ">

      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          WARINGIN
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link " href="<?=base_url('admin')?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?=base_url('user')?>">
              <i class="material-icons">person</i>
              <p>User List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?=base_url('product')?>">
              <i class="material-icons">content_paste</i>
              <p>Product List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?=base_url('order')?>">
              <i class="material-icons">shopping_cart</i>
              <p>Order list</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?=base_url('settings')?>">
              <i class="material-icons">settings</i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?=$title?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('home')?>">
                  <i class="material-icons">web</i>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?=base_url('user/show/').$this->session->userdata('id')?>">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?=base_url('auth/logout')?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->