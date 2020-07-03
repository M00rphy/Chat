<?php

include('database_connection.php');

session_start();

$message = '';

if (isset($_SESSION['user_id'])) {
    header('location:index.php');
}

if (isset($_POST['login'])) {
    $query = "
		SELECT * FROM login 
  		WHERE username = :username
	";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':username' => $_POST["username"]
        )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            if (password_verify($_POST["password"], $row["password"])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('" . $row['user_id'] . "')
				";
                $statement = $connect->prepare($sub_query);
                $statement->execute();
                $_SESSION['login_details_id'] = $connect->lastInsertId();
                header('location:index.php');
            } else {
                $message = '<label>Wrong Password</label>';
            }
        }
    } else {
        $message = '<label>Wrong Username</labe>';
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
<div class=" container ">
    <br/>

    <h3 align="center">Chat</h3><br/>
    <br/>
    <div>
        <div class="panel-heading">Chat Login</div>
        <div class="panel-body">
            <p class="text-danger"><?php echo $message; ?></p>
            <form method="post">
                <div class="form-group">
                    <label class="glitch_1" data-text="Enter Username">Enter Username</label>
                    <input type="text" name="username" class="form-control" required/>
                </div>
                <div class="form-group ">
                    <label class="glitch_3" data-text="Enter Password">Enter Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-info" value="Login"/>
                </div>
                <div align="center" class="glitch_4" data-text="Register">
                    <a href="register.php">Register</a>
                </div>
            </form>
            <br/>
            <br/>
            <br/>
            <br/>
        </div>
    </div>
</div>

</body>
</html>