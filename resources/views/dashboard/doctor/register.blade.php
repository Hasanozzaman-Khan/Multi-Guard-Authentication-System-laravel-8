.<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Doctor Register</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top:45px;">

                    <h4>Doctor Register</h4>
                    <hr>

                    <form action="{{ route('doctor.create')}}" method="post" autocomplete="off">

                        @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success')}}
                            </div>
                        @endif

                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail')}}
                            </div>
                        @endif


                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter name">
                            <span class="text-danger">@error('name') {{$message}}  @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email address">
                            <span class="text-danger">@error('email') {{$message}}  @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="hospital">Hospital</label>
                            <input type="text" name="hospital" value="{{ old('hospital') }}" class="form-control" placeholder="Enter hospital name">
                            <span class="text-danger">@error('hospital') {{$message}}  @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter password">
                            <span class="text-danger">@error('password') {{$message}}  @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" name="cpassword" value="{{ old('cpassword') }}" class="form-control" placeholder="Confirm password">
                            <span class="text-danger">@error('cpassword') {{$message}}  @enderror</span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Register</button>
                        </div>
                        <br>
                        <a href="{{ route('doctor.login')}}" class="text-decoration-none">Already have an account</a>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
