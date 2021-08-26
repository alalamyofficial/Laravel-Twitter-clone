<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simple login form with social login buttons using HTML and CSS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <style type="text/css">
    body {
        background: #f2fbff;
        font-family: arial;
    }
    .login-form h1 {
        font-size: 36px;
        text-align: center;
        color: #9bcaf3;
        margin-bottom: 30px;
        font-weight: normal;
    }
    .login-form .social-icon {
        width: 100%;
        font-size: 20px;
        padding-top: 20px;
        color: #fff;
        text-align: center;
        float: left;
    }
    .login-form {
        background: #fff;
        width: 450px;
        border-radius: 6px;
        margin: 0 auto;
        display: table;
        padding: 15px 30px 30px;
        box-sizing: border-box;
    }
    .form-group {
        float: left;
        width: 100%;
        margin: 0 0 15px;
        position: relative;
    }
    .login-form input {
        width: 100%;
        padding: 5px;
        height: 56px;
        border-radius: 74px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 15px;
        padding-left: 75px;
    }
    .login-form .form-group .input-icon {
        font-size: 15px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        position: absolute;
        border-radius: 25px;
        bottom: 0;
        height: 100%;
        padding-left: 35px;
        color: #666;
    }
    .login-form .login-btn {
        background: #9bcaf3;
        padding: 11px 50px;
        border-color: #9bcaf3;
        color: #fff;
        text-align: center;
        margin: 0 auto;
        font-size: 20px;
        border: 1px solid #45aba6;
        border-radius: 44px;
        width: 100%;
        height: 56px;
        cursor: pointer;
    }
    .login-form .reset-psw {
        float: left;
        width: 100%;
        text-decoration: none;
        color: #45aba6;
        font-size: 14px;
        text-align: center;
        margin-top: 11px;
    }
    .login-form .social-icon button {
        font-size: 20px;
        color: white;
        height: 50px;
        width: 50px;
        background: #45aba6;
        border-radius: 60%;
        margin: 0px 10px;
        border: none;
        cursor: pointer;
    }
    .login-form button:hover{
        opacity: 0.9;
    }
    .login-form .seperator {
        float: left;
        width: 100%;
        border-top: 1px solid #ccc;
        text-align: center;
        margin: 50px 0 0;
    }
    .login-form .seperator b {
        width: 40px;
        height: 40px;
        font-size: 16px;
        text-align: center;
        line-height: 40px;
        background: #fff;
        display: inline-block;
        border: 1px solid #e0e0e0;
        border-radius: 50%;
        position: relative;
        top: -22px;
        z-index: 1;
    }
    .login-form p {
        float: left;
        width: 100%;
        text-align: center;
        font-size: 16px;
        margin: 0 0 10px;
    }
    @media screen and (max-width:767px) {
    .login-form {
        width: 90%;
        padding: 15px 15px 30px;
    }
    }
    </style>

</head>
<body>
  <div class="login-form">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf 
      <div class="d-flex">
          <img src="tooty.png" width="60px" alt="" style="margin-left: 170px;"><br>
      </div><br>     
          <h1>Tooty Sign Up</h1>
      <div class="form-group">
        <input type="text" name="name" placeholder="Name">
        <span class="input-icon"><i class="fa fa-user"></i></span>
      </div>
      <div class="form-group">
        <input type="text" name="username" placeholder="Username">
        <span class="input-icon"><i class="fa fa-at"></i></span>
      </div>
      <div class="form-group">
        <input type="email" name="email" placeholder="E-mail Address">
        <span class="input-icon"><i class="fa fa-envelope"></i></span>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password">
        <span class="input-icon"><i class="fa fa-lock"></i></span>
      </div>    
      <div class="form-group">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <span class="input-icon"><i class="fa fa-lock"></i></span>
      </div>   
      <button class="login-btn">Sign Up</button>      
      <a class="reset-psw" href="#">Forgot your password?</a>
      <div class="seperator"><b>or</b></div>
      <p><a href="{{route('login')}}" class="link-success">Sign in </a></p>       

    </form>
  </div>

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>