<?php
    include 'connection.php';
?>
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
        <form onsubmit="return validation()" action="index.php" method="POST">
            <div class="form-group">
                <label for="login_email">Email address</label>
                <input id="login_email" name="login_email" type="text" class="form-control" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="login_pass">Password</label>
                <input id="login_pass" name="login_pass" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="login_pass_confirm">Confirm Password</label>
                <input id="login_pass_confirm" name="login_pass_confirm" type="password" class="form-control">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="script.js">
        
    </script>

</body>
</html>
<?php
    $login_email = $_POST['login_email'];
    $login_pass = $_POST['login_pass'];

    if(isset($_POST['submit'])) {
        $insert_query = "INSERT INTO login_info (login_email, login_pass)
            VALUES ('$login_email', '$login_pass')";

        $insert_result = mysqli_query($conn, $insert_query);

        if(!$insert_result) {
            die("Problem In Data Insertion!! Error:"  . mysqli_error($conn));
        }
        else {
            ?>
                <script>alert("Data Inserted!!");</script>
            <?php
        }
    }
?>
