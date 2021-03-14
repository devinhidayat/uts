<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name : </td>
                    <td><input type="text" name ="full_name" placeholder="Dosen : Dosenpemweb"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="type" name="username" placeholder="Dosen : Dosen">
                    </td>
                </tr>

                <tr>
                    <td>Passoword: </td>
                    <td>
                        <input type="password" name="password" placeholder="Dosen : Admin123">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
</div>

<?php include('partials/footer.php'); ?>

<?php
    if(isset($_POST['submit']))
    {
        // echo "button clicked";
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    }

    $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
        
    ";

    //  $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //  if($res==TRUE)
    //  {
    //     $_SESSION['add'] = "Admin Added";
    //     header("location:".SITEURL.'admin/manage-admin.php');
    //  }
    //  else
    //  {
    //     $_SESSION['add'] = "Failed to Add";
    //     header("location:".SITEURL.'admin/manage-admin.php');
    //  }

?>