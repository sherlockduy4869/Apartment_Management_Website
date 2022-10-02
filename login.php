<?php
    ob_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/adminLogin.php';
?>

<?php
    $adminLogin = new adminLogin();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

        $loginCheck = $adminLogin->login_check($user_name,$password);
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Resource/css/styleLogin.css?v=<?php echo time(); ?>">
    <title>BETTER HOMES</title>
</head>
<body>
    <section>
        <div class="form-container">
            <h1>BETTER HOMES</h1>
            <span><?php if(isset($loginCheck)){echo $loginCheck;} ?></span>
            <form action="login.php" method="POST">
                <div class="control">
                    <label for="user_name">UserName</label>
                    <input required type="text" name="user_name">
                </div>
                <div class="control">
                    <label for="password">Password</label>
                    <input required type="password" name="password">
                </div>
                <div class="control">
                    <input type="submit" name="submit" value="LOGIN">
                </div>
            </form>
        </div>
    </section>
</body>
</html>