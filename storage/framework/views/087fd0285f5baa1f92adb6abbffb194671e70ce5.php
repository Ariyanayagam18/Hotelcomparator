
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title>Hotel Comparator</title>
  <link rel="icon" type="image/svg" href="images/logo.svg">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">

  <!-- style -->
  <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">

  <!-- select -->
  <link rel="stylesheet" href="<?php echo e(asset('select/css/select2.css')); ?>"/>

  <!-- datapicker -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('datapicker/css/daterangepicker.css')); ?>" />
    
  <!-- owl -->
  <script src="<?php echo e(asset('jquery/jquery.slim.min.js')); ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <link rel="stylesheet" href="<?php echo e(asset('owl/css/owl.carousel.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('owl/css/owl.theme.default.min.css')); ?>">     
     
</head>
<nav class="header-section navbar navbar-expand-md navbar-light">
  <a class="navbar-brand" href="#">
    <img src="<?php echo e(asset('images/logo.svg')); ?>">    
  </a>
  <button class="navbar-toggler" type="button" onclick="openNav()">
     <span class="navbar-toggler-icon"></span>
  </button>
  <div id="mySidenav" class="sidenav">
    <?php $all_data=session()->all(); 
    $token=Auth::id();
  //  dd(Auth::id());
    ?>


    <ul class="navbar-nav">
    	<li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>
      <li class="nav-item">
        <select id="id_select2_example">
        <option value="USA" data-img_src="<?php echo e(asset('images/Flags/usa.svg')); ?>">USA</option>
          <option value="EN" data-img_src="<?php echo e(asset('images/Flags/EN.svg')); ?>">EN<s/option>
          <option value="FR" data-img_src="<?php echo e(asset('images/Flags/france.svg')); ?>">FR</option>
          <option value="IND" data-img_src="<?php echo e(asset('images/Flags/india.svg')); ?>">IND</option>
        </select>
      </li>
      <li class="nav-item coins-list">
        <select id="id_select2_examples">
          <option data-img_src="<?php echo e(asset('images/coins/USD.svg')); ?>">USD</option>
          <option data-img_src="<?php echo e(asset('images/coins/EUR.svg')); ?>">EUR</option>
          <option data-img_src="<?php echo e(asset('images/coins/INR.svg')); ?>">INR</option>
          <option data-img_src="<?php echo e(asset('images/coins/GBP.svg')); ?>">GBP</option>
        </select>
      </li>
      <?php if(isset($login) && $login == 1): ?>
      <li class="nav-item login">
        <a class="nav-link" id="loginbutton">Login</a>
        <div class="login-link"><?php echo $__env->make('auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
      </li> 
     <?php endif; ?>
     <?php if(isset($login) && $login == 2): ?>
      <li class="nav-item login-after">
        <div class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo e(asset('images/profile.svg')); ?>">   
          </button>
          <div class="dropdown-menu">
            <div class="logout-sec">
              <div class="email-logout">
                <img src="<?php echo e(asset('images/profile.svg')); ?>">   
                <p>Scarlet@yopmail.com</p>
              </div>
            </div>
            <div class="logout-sec">
              <div class="log-out">
                <img src="<?php echo e(asset('images/logout.svg')); ?>">   
                <a href="<?php echo e(route('logout')); ?>">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </li> 
     
<?php endif; ?>
    </ul>
     
  </div>  
</nav>


<script type="text/javascript">
  
  $(document).on('click','.locale',function(){
console.log('locale : ',$(this).attr('data-locale'))
if($(this).attr('data-locale') != 'USA')
{
  location.href = `/locale/${$(this).attr('data-locale')}`
}
  });

</script>


<?php /**PATH /opt/lampp/htdocs/Projects/Hotel Comparator/Hotel_latest/resources/views/layouts/header.blade.php ENDPATH**/ ?>