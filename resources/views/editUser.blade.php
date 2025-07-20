<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Registration Forms</title>
</head>

<body>



    <div class="container">
        <h1 class="text-center mt-5">Edit User</h1>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{ route('updateUser', $user->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class=" form-control" name="name" value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
            </form>
        </div>
    </div>





</body>

</html>