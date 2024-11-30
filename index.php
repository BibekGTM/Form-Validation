<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="form_container">
        <h3>Sign Up Form</h3>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input id="login_email" name="login_email" type="text" class="form-control" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input id="login_pass" name="login_pass" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input id="login_pass_confirm" name="login_pass_confirm" type="password" class="form-control">
            </div>

            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $login_email = $_POST['login_email'];
    $login_pass = $_POST['login_pass'];
    $login_pass_confirm = $_POST['login_pass_confirm'];

    if($login_pass_confirm == $login_pass) {
        $email_format = "/^[a-zA-Z0-9.$%]+@[A-Za-z.]+\.[a-zA-Z]{2,}$/";
        $pass_format = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/";
        if (preg_match($email_format, $login_email) && preg_match($pass_format, $login_pass)) {
            $insert_query = "INSERT INTO login_info (login_email, login_pass)
            VALUES ('$login_email', '$login_pass')";
    
            $insert_res = mysqli_query($conn, $insert_query);
    
            if (!$insert_query) {
                die("Error in data insertion!! Error: " . mysqli_error($conn));
            } else {
                echo "Data inserted!!";
            }
        }
        else {
            ?>
            <script>alert("Enter proper email or password!!");</script>
            <?php
        }
    }
    else {
        ?>
            <script>alert("Different passwords inserted!!");</script>
        <?php
    }

    
}
?>