<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
 <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Game Plan Mens T20 World Cup</title>
<link rel="icon" href="{{ URL::asset('logo.ico') }}" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morrisjs/morris.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
<!-- Custom Css -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/color_skins.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ URL::asset('assets/plugins/multi-select/css/multi-select.css') }}">

<link rel="stylesheet" href="{{ URL::asset('assets/plugins/nouislider/nouislider.min.css') }}" />

<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
</head>

<body>
<body class="theme-black">
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ URL::asset('assets/images/HumLogo.PNG') }}" width="100" height="50" alt="img"></div>
        <p>Please wait...</p>        
    </div>
</div>
<div class="overlay_menu">
    <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>
    <div class="container">        
        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="input-group m-b-0">                
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-search"></i>
                        </span>
                    </div>
                </div>
            </div>
                       
        </div>
        
    </div>
</div>
<div class="overlay"></div>

<!-- Left Sidebar -->
<aside id="minileftbar" class="minileftbar">
    <ul class="menu_list">
        <li>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="#"><img src="{{ URL::asset('assets/images/HumLogo.PNG') }}" alt="img"></a>
        </li>
           
        <li><a href="javascript:void(0);" class="menu-sm"><i class="zmdi zmdi-swap"></i></a></li>        
        <li class="notifications badgebit">
            <a href="javascript:void(0);">
                <i class="zmdi zmdi-notifications"></i>
                <div class="notify">
                    <span class="heartbit"></span>
                    <span class="point"></span>
                </div>
            </a>
        </li>
       
        <li class="power">
            <a href="javascript:void(0);" class="js-right-sidebar"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>            
            <a href="{{ URL('/logout') }}" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>    
</aside>

<aside class="right_menu">
   
    <div class="notif-menu">
        <div class="slim_scroll">
          
            <div class="card">
                <div class="header">
                    <h2><strong>Notifications</strong></h2>
                </div>
                
                    <ul class="notification list-unstyled">
                        
                        
                        
                    </ul>  
                
            </div>
        </div>
    </div>
    
    <div id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting">Setting</a></li>
        </ul>
        <div class="tab-content slim_scroll">
            <div class="tab-pane slideRight active" id="setting">
                <div class="card">
                    <div class="header">
                        <h2><strong>Colors</strong> Skins</h2>
                    </div>
                    <div class="body">
                        <ul class="choose-skin list-unstyled m-b-0">
                            <li data-theme="black" class="active">
                                <div class="black"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>                   
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>                    
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>                    
                            </li>
                        </ul>
                    </div>
                </div>                
               
                <div class="card">
                    <div class="header">
                        <h2><strong>Left</strong> Menu</h2>
                    </div>
                    <div class="body theme-light-dark">
                        <button class="t-dark btn btn-primary btn-round btn-block">Dark</button>
                    </div>
                </div>               
            </div>
           
        </div>
    </div>
    <div id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info m-b-20">
                        <div>
                            <img src="{{ URL::asset('assets/images/HumLogo.png') }}" alt="logo" width="60px" height="40px">
                        </div>
                        <div class="detail">
                            <h6>{{Auth::User()->name}}</h6>
                            <p class="m-b-0">{{Auth::User()->email}}</p>
                        </div>
                    </div>
                </li>
                <!-- main menues -->
                <li class="{{ (request()->is('dashboard/event/schedule')) ? 'active open' : '' }}"> <a href="{{ URL('/dashboard/event/schedule') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                @if(Auth::User()->can('read-question'))
                <li class="{{ (request()->is('questions/list')) ? 'active open' : '' }}"><a href="{{ URL('questions/list') }}"><i class="zmdi zmdi-pin-help"></i><span>Questions</span></a> 
                </li>
                @endif
                
                @if(Auth::User()->can('read-event'))
                <li class="{{ (request()->is('events/list')) ? 'active open' : '' }}"><a href="{{ URL('events/list') }}"><i class="zmdi zmdi-star"></i><span>Events</span></a> 
                </li>
                @endif
                
                @if(Auth::User()->can('read-players'))
                <li class="{{ (request()->is('player/list')) ? 'active open' : '' }}"><a href="{{ URL('player/list') }}"><i class="zmdi zmdi-notifications"></i><span>Players</span></a> 
                </li>
                 @endif


                @if(Auth::User()->can('read-challenges'))
                <li class="{{ (request()->is('challenge/list')) ? 'active open' : '' }}"><a href="{{ URL('challenge/list') }}"><i class="zmdi zmdi-calendar"></i><span>Challenges</span></a> 
                </li>
                @endif
                
                @if(Auth::User()->hasRole('super-admin'))
                <li class="{{ (request()->is('users/list')) ? 'active open' : '' }}"><a href="{{ URL('users/list') }}"><i class="zmdi zmdi-accounts"></i><span>Users</span></a> 
                </li>
                @endif

                <li class="{{ (request()->is('settings/profile')) ? 'active open' : '' }}"><a href="{{ URL('settings/profile') }}"><i class="zmdi zmdi-settings"></i><span>Settings</span></a> 
                </li>
               <!-- main menues -->
            </ul>
        </div>
    </div>
</aside>

<!-- Main Content -->
<section class="content home">
     <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-7 col-sm-12">
                    
                </div>
            </div>
            <div class="content row clearfix mt-3">
             @yield('content')
            </div>
        </div>
    </div>
</section>


    <script src="{{ URL::asset('assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{ URL::asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{ URL::asset('assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob-->
    <script src="{{ URL::asset('assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{ URL::asset('assets/bundles/morrisscripts.bundle.js') }}"></script> <!-- Morris Plugin Js --> 
    <script src="{{ URL::asset('assets/bundles/sparkline.bundle.js') }}"></script> <!-- sparkline Plugin Js --> 
    <script src="{{ URL::asset('assets/bundles/doughnut.bundle.js') }}"></script>

    <script src="{{ URL::asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/index.js') }}"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="{{ URL::asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

    <script src="{{ URL::asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/nouislider/nouislider.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

     <script src="{{ URL::asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>
     <script src="{{ URL::asset('assets/js/pages/profile.js') }}"></script>
    
</body>

<!-- add user model  -->
<div class="modal fade" id="correctanswer" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="correctanswer">Add Correct Answer</h4>
            </div>
            <div class="modal-body">
                <form action="{{ URL('questions/answer/update') }}" method="post" method="post">
                    @csrf
                 <input type="hidden" name="id" id="ques_id">
                 
                <select 
                class="form-control">
                 <option disabled selected>--Select--</option>
                 <option value="1">Option 1</option>
                 <option value="2">Option 2</option>    
                 <option value="3">Option 3</option>
                 <option value="4">Option 4</option>
                </select>   
                    
                    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-round waves-effect">SAVE</button>
                <button type="button" class="btn btn-danger btn-simple btn-round waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>


</html>



<script type="text/javascript">
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
          $("#success-alert").slideUp(500);
        });

    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('div input').attr('checked', true);
        } else {
            $('div input').attr('checked', false);
        }
    });

    // make active or inactive 

    $('.changeStatus').on('click', function(e) {

            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            }); 
            console.log(allVals) 


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
  
                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            console.log(data)
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                  
            }  
        });

    // end 

    function getUserId(id) {

        document.getElementById('ques_id').value = id

        // $.ajax({
        //     url: "{{ URL('/questions/options') }}"+"/"+id,
        //     type: "GET",
        //     data:{ 
        //         _token:'{{ csrf_token() }}'
        //     },
        //     cache: false,
        //     dataType: 'json',
        //     success: function(response){
        //         console.log(response)
                
                // $('#opt_list').innerHTML = null;
                // var sel = "--Select--";
                // addoption(sel,0);

                // addoption(response.success.option_1,1);
                // addoption(response.success.option_2,2);
                // addoption(response.success.option_3,3);
                // addoption(response.success.option_4,4);
                
                

                

                // $('#opt_list').append(`<option value='2'>${response.success.option_2} </option>`);

                // $('#opt_list').append(`<option value='3'>${response.success.option_3} </option>`);

                // $('#opt_list').append(`<option value='4'>${response.success.option_4} </option>`);
        //     }
        // });  
    }

    

</script>
