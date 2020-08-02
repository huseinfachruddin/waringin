<div class="wrapper">
<div class="sidebar " data-color="azure" data-background-color="purple" data-image="">

<div class="logo"><a href="<?=base_url('home')?>" class="simple-text logo-normal">
    WARINGIN
  </a></div>
<div class="sidebar-wrapper">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link " href="<?=base_url('home')?>">
        <i class="material-icons">home</i>
        <p>Beranda</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?=base_url('home/search')?>">
        <i class="material-icons">search</i>
        <p>Search</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?=base_url('home/about')?>">
        <i class="material-icons">language</i>
        <p>About us</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="<?=base_url('home/contact')?>">
        <i class="material-icons">phone</i>
        <p>Contact</p>
      </a>
    </li>
    <div class="d-sm-block d-lg-none">
      <ul class="navbar-nav">
        <?php if (!$this->session->userdata('email')) {?>
          
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('auth')?>">
            <i class="material-icons">login</i>
            Login
          </a>
        </li>
        <?php } else {?>

        <li class="nav-item dropdown ">
          <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-block d-md-none">
              Account
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="<?=base_url('profile')?>">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?=base_url('auth/logout')?>">Log out</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('pemesanan')?>">
            <i class="material-icons">shopping_cart</i>
            cart saya
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </ul>
</div>
</div>
<div class="main-panel ">
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
  
        <?php if (!$this->session->userdata('email')) {?>
          
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('auth')?>">
            <i class="material-icons">login</i>
            Login
          </a>
        </li>
        <?php } else {?>
          <li class="nav-item">
          <a class="nav-link" href="<?=base_url('pemesanan')?>">
            <i class="material-icons">shopping_cart</i>
            cart saya
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
            <a class="dropdown-item" href="<?=base_url('profile')?>">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?=base_url('auth/logout')?>">Log out</a>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<br>
<!-- End Navbar -->