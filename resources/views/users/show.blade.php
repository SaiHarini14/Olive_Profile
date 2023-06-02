<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>View User</h2>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('users.show', $value->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID</strong>
                        <input type="integer" name="id" value="{{ $value['id'] }}" class="form-control">
                        <strong> Name:</strong>
                        <input type="text" name="name" value="{{ $value->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mobile:</strong>
                        <input type="integer" name="mobile" class="form-control" value="{{ $value->mobile }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        <select name="gender" value="{{ $value->gender }}" id="gender">
                            <option value="Female">Female</option>
                            <option value="Men">Men</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </form>
    </div>
</body>

</html>
