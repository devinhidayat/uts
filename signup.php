<?php include('config/constants.php'); ?>

<html>
    <head>
        <title>Sign Up - Food Order System</title>
        <link rel ="stylesheet" href ="css/signup.css">
    </head>

    <body>
        <div class="signup">
            <h1 class="text-center">Sign Up</h1>
            <?php
                if(isset($_SESSION['signup']))
                {
                    echo $_SESSION['signup'];
                    unset($_SESSION['signup']);
                }
            ?>
            <br><br>

            <form action="" method="POST" class="text-center">
            <label>First Name</label> <br>
            <input type="text" name="first_name" placeholder ="First Name" required><br><br>

            <label>Last Name</label> <br>
            <input type="text" name="last_name" placeholder ="Last Name" required><br><br>

            <label>Username</label> <br>
            <input type="text" name="username" placeholder ="Username" required><br><br>

            <label>Password</label> <br>
            <input type="password" name="password" placeholder ="Password" required><br><br>

            <label>Tanggal Lahir</label> <br>
            <input type="date" name="tgl_lahir" required><br><br>

            <label>Jenis Kelamin</label> <br>
            <select name="gender" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select><br><br>

            <input type="submit" name="submit" value="Sign Up" class="btn-primary">
            <br><br>
            <a href="login.php">Already have an account?</a>
            </form>
        </div>
    </body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $tgl_lahir = $_POST['tgl_lahir'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO tbl_user SET
            first_name = '$first_name',
            last_name = '$last_name',
            username = '$username',
            password = '$password',
            tgl_lahir = '$tgl_lahir',
            gender = '$gender'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['signup'] = "<div class = 'success'></div>";
            header('location:'.SITEURL.'/login.php');
        }
        else
        {
            $_SESSION['signup'] = "<div class = 'error'>Sign Up Failed.</div>";
            header('location:'.SITEURL.'/signup.php');
        }
    }
?>