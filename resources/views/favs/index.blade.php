<!DOCTYPE html>
<html>

<head>
    <title>OLIVE</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('favs') }}">View All Favourites</a></li>
                </ul>

            </div>
        </nav>

        <h1>All Favourites</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Link</td>
                    <td>Type</td>
                    <td>Category ID</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->link }}</td>
                        <td>{{ $value->type }}</td>
                        <td>{{ $value->categories_id }}</td>
                        
                    
                    <td>

                        <!-- delete the user (yet to add)-->
                        <form action="{{ route('favs.destroy',$value->id) }}" method="Post">
        
                        <!-- edit the user -->
                        <a class="btn btn-small btn-info" href="{{ route('favs.edit', $value) }}">Edit</a>
                        <a class="btn btn-small btn-warning" href="{{ route('favs.show', $value) }}">Show</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

    </div>
</body>

</html>
