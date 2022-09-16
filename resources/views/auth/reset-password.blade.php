<!doctype html>

<html lang="en">



<head>

    <title>Game plan mens T20 world cup 2022</title>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"

        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>



<body>
    
    <nav class="navbar navbar-light bg-info">

        <a class="navbar-brand" href="#">

            <img src="https://qagame.jzmaxx.com/asset/img/logo.PNG" width="100" height="80" class="d-inline-block align-top" alt="">

            Game plan mens T20 world cup 2022

        </a>

    </nav>



    <div class="container">

        <div class="row">

            <div class="col-lg-6 offset-lg-3 mt-4">

                @if ($message = Session::get('success'))
                <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <form method="post" class="shadow mt-5 p-2" action="{{route('password.update')}}">
                    @csrf
                    <h3 class="text-center">Reset your password </h3>

                    <p class="p-2 text-secondary"> Your new password must be different from the old one.</p>

                    <div class="form-group mt-3">

                        <label for="">New Password</label>
                        <input type="hidden" class="form-control" name="email" value="{{$email}}">
                        <input type="hidden" class="form-control" name="token" value="{{$token}}">

                        <input type="password" class="form-control" name="password" id="" placeholder="">

                        <label for="">Confirm Password</label>

                        <input type="password" class="form-control" name="password_confirmation" id="" placeholder="">

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>

        </div>

    </div>





    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"

        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"

        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"

        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"

        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"

        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"

        crossorigin="anonymous"></script>

</body>



</html>