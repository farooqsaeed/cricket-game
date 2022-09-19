<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title>:: Cricket Game:: Sign In</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

<!-- Custom Css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">    
<link rel="stylesheet" href="{{ URL::asset('assets/css/color_skins.css') }}">
</head>
<body class="theme-black">
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="company_detail">
                        <img src="{{ URL::asset('assets/images/HumLogo.png') }}" alt="">
                        <h3><strong>Lorem ipsum</strong></h3>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</p>                        
                        <!-- <div class="footer">
                            <ul  class="social_link list-unstyled">
                                
                                <li><a href="https://twitter.com/stayalertpk" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/stayalertpk" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/stayalert.pk/" title="instagram"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCyr1BEYa8MhlZN6RXvukslA" title="Youtube"><i class="zmdi zmdi-youtube"></i></a></li>  
                            </ul>
                            <hr>
                            <ul>
                                <li><a href="https://stayalert.pk/contact-us/" target="_blank">Contact Us</a></li>
                                <li><a href="https://stayalert.pk/privacy-policy/" target="_blank">Privacy Policy</a></li>
                                <li><a href="https://stayalert.pk/term-and-condition/">Term & Condition</a></li>
                            </ul>
                        </div> -->
                    </div>                    
                </div>
                <div class="col-lg-5 col-md-12 offset-lg-1">
                    <div class="card-plain">
                        <div class="header">
                            <h5>Log in</h5>
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                  <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <strong>{{ $message }}</strong>
                            </div>
                            @endif  
                        </div>
                        <form class="form" action="{{URL('/sign-in')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                            <div class="input-group">
                                @if ($errors->has('email'))
                                 <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="input-group">
                                <input type="password" placeholder="Password" name="password" class="form-control" />
                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                            <div class="input-group">
                                @if ($errors->has('password'))
                                 <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>                            
                        
                        <div class="footer">
                            <button type="submit" class="btn btn-primary btn-round btn-block">SIGN IN</button>
                            
                        </div>
                        </form>
                        <a href="{{ URL('forget-password') }}" class="link">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="{{ URL::asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
</body>
</html>