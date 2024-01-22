<!DOCTYPE html>
<head>
    <title></title>
</head>
<body>

<form method="POST" action="{{ URL('register') }}" enctype="multipart/form-data">
    @csrf
    <label>Name</label>
    <input type="text" name="name"  required /><br>

    <label>Email</label>
    <input type="text" name="email" required /><br>

    <label>Password</label>
    <input type="text" name="password"  required /><br>

    <label>File</label>
    <input type="file" name="profile_picture"  />

    <input type="submit" value="submit" name="submit">
</form>
</body>
</html>