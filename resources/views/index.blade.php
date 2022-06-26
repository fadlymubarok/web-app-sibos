<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="box">

    </div>
    <div class="login-box">
        <form action="/login" method="post">
            @csrf
            <h1>Login</h1>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="email" placeholder="email" autofocus>
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="password">
            </div>
            <button class="btn btn1">Login</button>
        </form>
    </div>
    <div>
        <img src="agent.png" class="agent">
    </div>
</body>

</html>