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
        <div class="row" style="margin-top:30%;">
            <div class="col-md-5 col-md-offset-3">
                <div style="border:1px solid grey; padding: 10%;">
                    <img src="{{ url('') }}" alt="" class="img-responsive">
                    <form action="{{ url('/login') }}" method="post">
                        @csrf
                        <input type="text" name="username" class="form-control" placeholder="Username"> <br>
                        <input type="password" name="password" class="form-control" placeholder="Password"> <br>
                        <input type="submit" value="Submit" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
