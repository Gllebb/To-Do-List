<?php include "stuff/header.php" ?>

<body>

    <?php include "stuff/nav-bar.php"; ?>
    
    <?php
    session_start();

    if (isset($_SESSION["user"])) {
        $userId = $_SESSION["user"];

        require_once "database.php";
        $sql = "SELECT * FROM users WHERE id = '$userId'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $fullName = $user["full_name"];
        $email = $user["email"];

        if (isset($_POST["change"])) {
            $oldPassword = $_POST["old-password"];
            $newPassword = $_POST["password"];
            $newPasswordRepeat = $_POST["password-repeat"];

            if (password_verify($oldPassword, $user["password"])) {

                if ($newPassword === $newPasswordRepeat) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $updateSql = "UPDATE users SET password = '$hashedPassword' WHERE id = '$userId'";
                    mysqli_query($conn, $updateSql);

                    echo "<div class='alert alert-success'>Password changed successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>New password and repeat password do not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Old password is incorrect</div>";
            }
        }
    }
    ?>

    <div class="profile-div">
        <h1>User Profile:</h1>
        <p>Full Name: <?php echo $fullName; ?></p>
        <p>Email: <?php echo $email; ?></p>
    </div>

    <form action="profile.php" method="post">
        <div class="profile-div">
            <h1>Change password:</h1>
            <input type="password" class="form-control" name="old-password" placeholder="Enter old password:">
            <input type="password" class="form-control" name="password" placeholder="Enter new password:">
            <input type="password" class="form-control" name="password-repeat" placeholder="Repeat new password:">
            <input type="submit" value="Change!" name="change" class="btn btn-primary">
        </div>
    </form>

    <?php include "stuff/footer.php"; ?>

</body>
</html>
