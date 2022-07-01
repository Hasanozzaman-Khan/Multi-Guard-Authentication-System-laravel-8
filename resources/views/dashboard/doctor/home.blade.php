.<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Doctor Dashboard | Home</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3" style="margin-top:45px;">

                    <h4>Doctor Dashboard</h4>

                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Hospital</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{Auth::guard('doctor')->user()->name}}</td>
                                <td>{{Auth::guard('doctor')->user()->email}}</td>
                                <td>{{Auth::guard('doctor')->user()->hospital}}</td>
                                <td>
                                    <a href="{{ route('doctor.logout')}}" class="text-decoration-none" onclick="event.preventDefault(); document.getElementById('logout.form').submit();">Logout</a>
                                    <form class="d-none" action="{{ route('doctor.logout')}}" method="post" id="logout.form">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>
