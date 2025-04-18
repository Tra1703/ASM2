<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="">
        <p><label>Username:</label><input type="text" name="username" required></p>
        <p><label>Password:</label><input type="password" name="password" required></p>
        <p><button type="submit" name="login">Đăng nhập</button></p>
    </form>
</body>
</html>
