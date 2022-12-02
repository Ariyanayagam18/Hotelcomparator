<div class="login-section" style="display:none" id="loginform" >

@if(isset($errorMessageDuration))
         <div class="alert alert-danger" id="errormsg">
           
             {{ $errorMessageDuration }}
           
         </div>
@endif



    <div class="mb-4" name="logo">
        <img src="{{asset('images/login-under.svg')}}">    
    </div>
    <div class="login-text">Login</div>
   
    <form method="post" name="loginform" id="loginformid" action="{{route('userlogin')}}" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">   
        <div  class="login-inner">                   
            <input id="email" type="email" name="email" :value="old('email')" autofocus placeholder="Username , email & phone number" />            
        </div>
        <div class="login-inner">                    
            <input id="password" type="password" name="password"  autocomplete="current-password"  placeholder="Password"/>
        </div>
        <div>
            @if (Route::has('password.request'))
                <a class="forgot-pass" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <div class="log-in">
            <button>Login</button>
        </div>            
        <hr class="hr-text" data-content="Or Sign up With">
        <div class="google-fb">
            <a class="" href="{{ url('auth/google') }}"  id="btn-fblogin">
                <img src="{{asset('images/login-google.svg')}}">    
            </a>                
            <a class="" href="{{ url('auth/facebook') }}" id="btn-fblogin">
                <img src="{{asset('images/login-fb.svg')}}">    
            </a>                
        </div>
    </form>
</div>
  
    
