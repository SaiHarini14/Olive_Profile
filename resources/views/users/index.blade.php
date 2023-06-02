<!DOCTYPE html>
<html>
<head>
    <title>User Profile App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users') }}">User Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">View All Users</a></li>
        <li><a href="{{ URL::to('users/create') }}">Create a User</a>
    </ul>
</nav>

<h1>All the Users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Mobile</td>
            <td>Gender</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->mobile }}</td>
            <td>{{ $value->gender }}</td>

        
            <td>

                <!-- delete the user (yet to add)-->
                <form action="{{ route('users.destroy',$value->id) }}" method="Post">

                <!-- edit the user -->
                <a class="btn btn-small btn-info" href="{{ route('users.edit', $value) }}">Edit</a>
                <a class="btn btn-small btn-warning" href="{{ route('users.show', $value) }}">Show</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>