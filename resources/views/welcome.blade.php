<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @if (session()->has('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <form action="" method="post">
    @csrf
        <label for="email">Email :</label><br>
        <input type="text" name="email" id="email">
        @error('email')
        <p style="color:red;">{{ $errors->first('email') }}</p>
        @enderror
<br>
        <label for="password">Password :</label><br>
        <input type="password" name="password" id="password">
        @error('password')
            <p style="color:red;">{{ $errors->first('password') }}</p>
        @enderror
<br>
        <input type="submit" value="Register">
    </form>
</body>
</html>