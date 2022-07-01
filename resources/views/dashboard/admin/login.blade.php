.<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Admin Login</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top:45px;">

                    <h4>Admin Login</h4>
                    <hr>
                    <form action="{{ route('admin.check') }}" method="post" autocomplete="off">
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif


                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email address">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter password">
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
