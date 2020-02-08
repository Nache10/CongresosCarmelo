<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification Mail</title>
</head>
<body>
    <h1> Hello {{$user->name}} and welcome to site.</h1>
    <h3> Temporarily we made your password that is: {{$user->name}}2020. Dont forget change your password as soon as you log in!</h3>
    <h3> To activate your account, click in the link below.</h3>
    <h3><a href="http://informatica.ieszaidinvergeles.org:9027/congresos/public/verify/{{$user->token}}">Verify Account</a></h3>
</body>
</html>