<?php

$loginUsernameInputValue = "";
$loginPasswordInputValue = "";
$loginError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailPattern = '/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/';
    $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_-])[A-Za-z\d!@#$%^&*()_-]{8,}$/';
    // two way binding value--> state variable
    $loginUsernameInputValue = $_POST["login-username"];
    $loginPasswordInputValue = $_POST["login-password"];
    if ($loginUsernameInputValue === "") {
        $loginError = "*" . "User Name Field Should not be empty";
    } elseif ($loginPasswordInputValue === "") {
        $loginError = "*" . "Password Field Should not be empty";
    } elseif (preg_match($emailPattern, $loginUsernameInputValue) == 0) {

        $loginError = "*" . " " . "Enter Valid Email in Email Field";
    } elseif (preg_match($passwordPattern, $loginPasswordInputValue) == 0) {

        $loginError = "*" . " " . "Enter Valid Passowrd in Password Field";
    } else {
        $loginError = "Credentials Authorization Needed with the database!!!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Your Account</title>
    <link href="./loginForm.css" rel="stylesheet">
    </link>
</head>

<body>
    <form class="main-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
        <div class="login-heading">Login to Your Account</div>
        <div class="login-email">
            <label for="login-email-field" class="login-email-field-label">Email:</label>
            <input id="login-email-field-input" placeholder="Enter Your Email" name="login-username" value="<?php echo $loginUsernameInputValue ?>">


        </div>
        <div class="login-password"> <label for="login-password-field" class="login-password-field-label">Password:</label>
            <input id="login-password-field-input" placeholder="Enter Your Password" name="login-password" value="<?php echo $loginPasswordInputValue ?>">
        </div>
        <div class="login-button"><button id="login-button" type="submit">Login</button></div>
        <div class="login-signup">
            Do not have an account? <a href="registrationForm.php">Signup</a>
            <h4 id="login-error"><?php echo $loginError ?> </h4>
        </div>
    </form>
</body>

</html>