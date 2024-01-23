<?php
$firstNameInputValue = "";
$lastNameInputValue = "";
$emailInputValue = "";
$mobileInputValue = "";
$passwordInputValue = "";
$confirmPasswordInputValue = "";
$formError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first-name"];
    $firstNameInputValue = $firstName;
    $lastName = $_POST["last-name"];
    $lastNameInputValue = $lastName;
    $email = $_POST["email"];
    $emailInputValue = $email;
    $mobile = $_POST["mobile"];
    $mobileInputValue = $mobile;
    $password = $_POST["password"];
    $passwordInputValue = $password;
    $confirmPassword = $_POST["confirm-password"];
    $confirmPasswordInputValue = $confirmPassword;
    if (!$firstName) {
        $formError = "*" . " " . "First Name Field is Mandatory";
    } elseif (!$lastName) {
        $formError = "*" . " " . "Last Name Field is Mandatory";
    } elseif (!$email) {
        $formError = "*" . " " . "Email Field is Mandatory";
    } elseif (!$mobile) {
        $formError = "*" . " " . "Mobile Field is Mandatory";
    } elseif (!$password) {
        $formError = "*" . " " . "Password Field is Mandatory";
    } elseif (!$confirmPassword) {
        $formError = "*" . " " . "Confirm Password Field is Mandatory";
    } else {
        $formError = "All Mandatory Fields Done!!! Thank You";
        $firstNameInputValue = "";
        $lastNameInputValue = "";
        $emailInputValue = "";
        $mobileInputValue = "";
        $passwordInputValue = "";
        $confirmPasswordInputValue = "";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<link href="./registrationForm.css" rel="stylesheet">
</link>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="form-card">

        <div class="top-section">
            <img src="./assets/avenue_logo.png" alt="logo" id="logo">
            <h3 id="form-heading">Sign Up into your account</h3>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post" class="middle-section">
            <div class="left-container">
                <div id="firstname-wrapper">
                    <label for="first-name">First Name:</label>
                    <input type="text" class="first-name" value="<?php echo $firstNameInputValue ?>" name="first-name" placeholder="Enter Your First Name" id="first-name">
                </div>
                <div id="email-wrapper">
                    <label for="email">Email:</label>
                    <input type="text" class="email" name="email" placeholder="Enter Your Email" id="email" value="<?php echo $emailInputValue ?>">
                </div>
                <div id="password-wrapper">
                    <label for="password">Password:</label>
                    <input type="text" class="password" name="password" placeholder="Enter Your Password" id="password" value="<?php echo $passwordInputValue ?>">
                </div>
            </div>
            <div class="right-container">
                <div id="firstname-wrapper">
                    <label for="first-name">Last Name:</label>
                    <input type="text" class="first-name" name="last-name" value="<?php echo $lastNameInputValue ?>" placeholder="Enter Your Last Name" id="last-name">
                </div>
                <div id="email-wrapper">
                    <label for="mobile">Mobile:</label>
                    <input type="text" class="email" name="mobile" placeholder="Enter Your Mobile Number" id="mobile" value="<?php echo $mobileInputValue ?>">
                </div>
                <div id="password-wrapper">
                    <label for="password"> Confirm Password:</label>
                    <input type="text" class="password" name="confirm-password" placeholder="Enter Your Password" id="confirm-password">
                </div>

            </div>
            <button type="submit">Sign Up</button>
        </form>
        <div class="bottom-section">

            <h4><?php echo $formError  ?></h4>
        </div>

    </div>
</body>

</html>