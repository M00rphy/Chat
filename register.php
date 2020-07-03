<?php

include('database_connection.php');

session_start();

$message = '';

if (isset($_SESSION['user_id'])) {
    header('location:index.php');
}

if (isset($_POST["register"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $check_query = "
	SELECT * FROM login 
	WHERE username = :username
	";
    $statement = $connect->prepare($check_query);
    $check_data = array(
        ':username' => $username
    );

    $check_email = "
	SELECT * FROM login 
	WHERE email = :email
	";
    $statement1 = $connect->prepare($check_email);
    $check_dataE = array(
        ':email' => $email
    );

    if ($statement->execute($check_data) && $statement1->execute($check_dataE)) {
        if ($statement->rowCount() > 0) {
            $message .= '<p><label>Username already taken</label></p>';
        }
        if ($statement1->rowCount() > 0) {
            $message .= '<p><label>Email already in use</label></p>';
        } else {
            if (empty($username)) {
                $message .= '<p><label>Username is required</label></p>';
            }
            if (empty($password)) {
                $message .= '<p><label>Password is required</label></p>';
            } else {
                if ($password != $_POST['confirm_password']) {
                    $message .= '<p><label>Password not match</label></p>';
                }
            }

            if ($message == '') {
                $data = array(
                    ':username' => $username,
                    ':password' => password_hash($password, PASSWORD_DEFAULT),
                    ':email' => $email
                );

                $query = "
				INSERT INTO login 
				(username, password, email) 
				VALUES (:username, :password, :email)
				";
                $statement = $connect->prepare($query);
                if ($statement->execute($data)) {
                    $headers = "From: contacto@chat.com";
                    $mensaje = "Dear user: $username \r\n your account has been created with the password: $password, \r\n thank you for choosing us.";
                    mail($email, "Account created", $mensaje, $headers);

                    $message = "<label>Registration Completed</label>";
                }
            }
        }
    }
}

?>

<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet"
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="Assets/js/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="Assets/css/404.css"/>
</head>
<body>
<div class="overlay"></div>
<div class="container">
    <br/>

    <h3 align="center">Chat</a></h3><br/>
    <br/>
    <div>
        <div class="panel-heading glitch_1">Register</div>
        <div class="panel-body">
            <form method="post">
                <span class="text-danger"><?php echo $message; ?></span>
                <div class="form-group">
                    <label class="glitch_1">Enter Username</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="glitch_2">Enter Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="glitch_2">Re-enter Password</label>
                    <input type="password" name="confirm_password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="glitch_4">Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <button type="submit" name="register" class="glitch_2">Register</button>
                </div>
                <div align="center">
                    <a href="login.php" class="glitch_1">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
