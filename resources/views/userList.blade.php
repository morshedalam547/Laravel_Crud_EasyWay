<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<style>
    .hover-bg-info:hover {
        background-color: #d1ecf1;
        /* Bootstrap info background color */
        border-radius: 5px;
    }



</style>

<body>

    <div class="container d-flex justify-content-center">
        @if(session('delete'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-3 w-50" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container d-flex justify-content-center">
        @if(session('success'))
            <div class="alert alert-primary alert-dismissible fade show text-center mt-3 w-50" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>



    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <a href="/" class="mb-4 h2 text-decoration-none text-success hover-bg-info px-2">Home</a>
            <h2 class="mb-4 text-end">User List</h2>
        </div>

        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('editUser', $user->id) }}" class='btn btn-primary'>Edit</a>
                            <a href="{{ route('deleteUser', $user->id) }}" onclick="return confirm('Are you sure delete this iteam ?')"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

  {{-- pagination --}}
   {{ $users->links() }}


        <!-- Bootstrap JS + Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>