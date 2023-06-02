<!-- views/users/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>

    <form id="formUser">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <button type="submit">Add User</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ajax request to store user
            $('#formUser').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: '/users',
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        alert(response.message);
                        window.location.href = '/users';
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
