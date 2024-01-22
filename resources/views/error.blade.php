<!DOCTYPE html>
<head>
    <title></title>
</head>
<body>

@if (session('error_message'))
    <p style="color:red;">{{ session('error_message') }}</p>
@endif
</form>
</body>
</html>