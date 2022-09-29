<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
</head>
<body>
    <form action="{{ route('user.update', $data->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label>New Password:</label>
            <input type="text" name="password" placeholder="Input new password...">
        </div>
        <div>
            <label>Confirm New Password:</label>
            <input type="text" name="confirm_password" placeholder="Input confirm new password...">
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>