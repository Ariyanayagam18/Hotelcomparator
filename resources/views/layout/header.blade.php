<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

  <!-- style -->
  <link rel="stylesheet" href="{{asset('css/main.css')}}">

  <!-- select -->
  <link rel="stylesheet" href="{{asset('select/css/select2.css')}}"/>

  <!-- owl -->
  <link rel="stylesheet" href="{{asset('owl/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('owl/css/owl.theme.default.min.css')}}">        
</head>
<nav class="header-section navbar navbar-expand-md navbar-light">
  <a class="navbar-brand" href="#">
    <img src="{{asset('images/logo.svg')}}">    
  </a>
  <div class="d-flex">
    <div class="nav-item login-after desktop-section mr-4">
      <div class="dropdown">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset('images/profile.svg')}}">   
        </button>
        <div class="dropdown-menu">
          <div class="logout-sec">
            <div class="email-logout">
              <img src="{{asset('images/profile.svg')}}">   
              <p>Scarlet@yopmail.com</p>
            </div>
          </div>
          <div class="logout-sec">
            <div class="log-out">
              <img src="{{asset('images/logout.svg')}}">   
              <p>Logout</p>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <button class="navbar-toggler" type="button" onclick="openNav()">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <div id="mySidenav" class="sidenav">
    <ul class="navbar-nav">
    	<li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
      <li class="nav-item">
        <select id="id_select2_example">
          <option data-img_src="{{asset('images/Flags/EN.svg')}}">EN</option>
          <option data-img_src="{{asset('images/Flags/france.svg')}}">FR</option>
          <option data-img_src="{{asset('images/Flags/india.svg')}}">IND</option>
          <option data-img_src="{{asset('images/Flags/usa.svg')}}">USA</option>
        </select>
      </li>
      <li class="nav-item coins-list">
        <select id="id_select2_examples">
          <option data-img_src="{{asset('images/coins/EUR.svg')}}">EUR</option>
          <option data-img_src="{{asset('images/coins/INR.svg')}}">INR</option>
          <option data-img_src="{{asset('images/coins/GBP.svg')}}">GBP</option>
          <option data-img_src="{{asset('images/coins/USD.svg')}}">USD</option>
        </select>
      </li>
      <li class="nav-item login">
        <a class="nav-link" href="#">Login</a>
      </li>  
      <li class="nav-item login-after mobile-section">
        <div class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('images/profile.svg')}}">   
          </button>
          <div class="dropdown-menu">
            <div class="logout-sec">
              <div class="email-logout">
                <img src="{{asset('images/profile.svg')}}">   
                <p>Scarlet@yopmail.com</p>
              </div>
            </div>
            <div class="logout-sec">
              <div class="log-out">
                <img src="{{asset('images/logout.svg')}}">   
                <p>Logout</p>
              </div>
            </div>
          </div>
        </div>
      </li>  
    </ul>
  </div>  
</nav>