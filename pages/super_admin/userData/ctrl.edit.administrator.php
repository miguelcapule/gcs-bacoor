<?php
include '../../../includes/session.php';

$admin_id = $_GET['admin_id'];

if (isset($_POST['upload'])) {

    if (empty($_FILES['img']['tmp_name'])) {
        $_SESSION['no_image'] = true;
        header('location: ../edit.administrator.php?admin_id=' . $admin_id);
    } else {
        $image = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $set_userInfo = mysqli_query($conn, "UPDATE tbl_admins SET img = '$image' WHERE admin_id = '$admin_id'");
        $_SESSION['success'] = true;
        header('location: ../edit.administrator.php?admin_id=' . $admin_id);
    }
} elseif (isset($_POST['submit'])) {

    $admin_fname = mysqli_real_escape_string($conn, $_POST['admin_fname']);
    $admin_mname = mysqli_real_escape_string($conn, $_POST['admin_mname']);
    $admin_lname = mysqli_real_escape_string($conn, $_POST['admin_lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if (empty($password2) && empty($password2)) {
        $_SESSION['no_pass'] = true;
        header('location: ../edit.administrator.php?admin_id=' . $admin_id);
    } else {
        if ($password != $password2) {
            $_SESSION['password_unmatch'] = true;
            header('location: ../edit.administrator.php?admin_id=' . $admin_id);
        } else {
            $hashpwd = password_hash($password, PASSWORD_BCRYPT);
            $insertUser = mysqli_query($conn, "UPDATE tbl_admins SET admin_fname = '$admin_fname', admin_mname = '$admin_mname', admin_lname = '$admin_lname', email = '$email', username = '$username', password = '$hashpwd' WHERE admin_id = '$admin_id'");
            $_SESSION['success'] = true;
            header('location: ../edit.administrator.php?admin_id=' . $admin_id);
        }
    }
}