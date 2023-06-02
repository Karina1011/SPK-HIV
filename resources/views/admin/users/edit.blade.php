<!-- views/users/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <form id="formUser">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $user->name }}" placeholder="Name">
        <input type="email" name="email" value="{{ $user->email }}" placeholder="Email">
        <input type="password" name="password" value="{{ $user->password }}" placeholder="Password">
        <select name="role">
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
        </select>
        <button type="submit">Update User</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ajax request to update user
            $('#formUser').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var userId = {{ $user->id }};
                $.ajax({
                    url: '/users/' + userId,
                    method: 'PUT',
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
