<?php
$firstNameInputValue = "";
$lastNameInputValue = "";
$emailInputValue = "";
$mobileInputValue = "";
$passwordInputValue = "";
$confirmPasswordInputValue = "";
$formError = "";
$firstNamePattern = "/^[a-zA-Z ]+$/";
$lastNamePattern = "/^[a-zA-Z ]+$/";
$emailPattern = '/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/';
$mobilePattern = '/^\+(?:[0-9] ?){6,14}[0-9]$/';
$passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_-])[A-Za-z\d!@#$%^&*()_-]{8,}$/';

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
    } elseif (preg_match($firstNamePattern, $firstName) == 0) {

        $formError = "*" . " " . "Only Alphabets and Spaces are allowed in First Name Field";
    } elseif (preg_match($lastNamePattern, $lastName) == 0) {

        $formError = "*" . " " . "Only Alphabets and Spaces are allowed in Last Name Field";
    } elseif (preg_match($emailPattern, $email) == 0) {

        $formError = "*" . " " . "Enter Valid Email in Email Field";
    } elseif (preg_match($mobilePattern, $mobile) == 0) {

        $formError = "*" . " " . "Enter Valid Mobile Number in Mobile Field with +91";
    } elseif (preg_match($passwordPattern, $password) == 0) {

        $formError = "*" . " " . "Password should have minimum of 8 characters with atleast one Upper Case Letter ,
         one Lower Case  Letter and  one Special Character";
    } elseif ($confirmPassword !== $password) {
        $formError = "Both Password and Confirm Password Fields Must be Same";
    } else {
        $formError = "Thank You for the registration... Your account has been created!!!";
        $firstNameInputValue = "";
        $lastNameInputValue = "";
        $emailInputValue = "";
        $mobileInputValue = "";
        $passwordInputValue = "";
        $confirmPasswordInputValue = "";

        $con = mysqli_connect("localhost", "root", "", "php");
        $qury = "INSERT INTO users (`first-name`, `last-name`, `email`, `mobile`, `password`) VALUES ('$firstName', '$lastName', '$email', '$mobile', '$password')";
        mysqli_query($con, $qury);
    }
}

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./registrationForm.css" rel="stylesheet">
    </link>
</head>

<body id="body-wrapper">
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
                    <label for="confirm-password"> Confirm Password:</label>
                    <input type="text" class="password" name="confirm-password" placeholder="Enter Your Password" id="confirm-password" value="<?php echo $confirmPasswordInputValue ?>">
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