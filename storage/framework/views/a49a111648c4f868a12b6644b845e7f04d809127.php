<div class="login-section" style="display:none" id="loginform" >

<?php if(isset($errorMessageDuration)): ?>
         <div class="alert alert-danger" id="errormsg">
           
             <?php echo e($errorMessageDuration); ?>

           
         </div>
<?php endif; ?>



    <div class="mb-4" name="logo">
        <img src="<?php echo e(asset('images/login-under.svg')); ?>">    
    </div>
    <div class="login-text">Login</div>
   
    <form method="post" name="loginform" id="loginformid" action="<?php echo e(route('userlogin')); ?>" >
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">   
        <div  class="login-inner">                   
            <input id="email" type="email" name="email" :value="old('email')" autofocus placeholder="Username , email & phone number" />            
        </div>
        <div class="login-inner">                    
            <input id="password" type="password" name="password"  autocomplete="current-password"  placeholder="Password"/>
        </div>
        <div>
            <?php if(Route::has('password.request')): ?>
                <a class="forgot-pass" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('Forgot your password?')); ?>

                </a>
            <?php endif; ?>
        </div>
        <div class="log-in">
            <button>Login</button>
        </div>            
        <hr class="hr-text" data-content="Or Sign up With">
        <div class="google-fb">
            <a class="" href="<?php echo e(url('auth/google')); ?>"  id="btn-fblogin">
                <img src="<?php echo e(asset('images/login-google.svg')); ?>">    
            </a>                
            <a class="" href="<?php echo e(url('auth/facebook')); ?>" id="btn-fblogin">
                <img src="<?php echo e(asset('images/login-fb.svg')); ?>">    
            </a>                
        </div>
    </form>
</div>
  
    
<?php /**PATH /opt/lampp/htdocs/Projects/Hotel Comparator/Hotel_latest/resources/views/auth/login.blade.php ENDPATH**/ ?>