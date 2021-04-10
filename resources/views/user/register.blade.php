<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>RCMPA KNOWLEDGE PORTAL</title>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top:10%;">
            <div class="col-md-5 col-md-offset-3">
                <div style="border:1px solid grey; padding: 10%;">
                    <img src="{{ url('') }}" alt="" class="img-responsive">
                    <form action="{{ url('user/store') }}" method="post">
                        @csrf
                        <input type="text" name="name" class="form-control" placeholder="name"> <br>
                        <input type="text" name="username" class="form-control" placeholder="Username"> <br>
                        <input type="email" name="email" class="form-control" placeholder="email"> <br>
                        <input type="text" name="department" class="form-control" placeholder="department"> <br>
                        <select name="role" id="role" class="form-control">
                            <option value="">Select Role</option>
                            @foreach ($roledata as $item)
                                <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                            @endforeach
                        </select> <br>
                        <select name="navigation_type" id="navigation_type" class="form-control">
                            <option value="">Select Navigation Type</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="HOD">HOD</option>
                            <option value="USER">USER</option>
                        </select> <br>
                        <input type="password" name="password" class="form-control" placeholder="Password"> <br>
                        <input type="submit" value="Submit" class="btn btn-primary btn-block">
                        <!-- /.col -->
                </div>
                <p>
                    <a href="{{ url('user/login') }}" class="text-center">I already have a membership</a>
                </p>


                </form>

            </div>
        </div>
    </div>
    </div>
</body>


<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('js/adminlte.min.js') }}"></script>
</body>

</html>
