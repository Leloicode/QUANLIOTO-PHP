<!doctype html>
<?php session_start();?>
<html lang="en">

<head>
    <title>Login Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="foderlogin/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(foderlogin/images/imagelogin.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">

                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>

                            </div>

                            <form action="#" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php if (isset($_POST['username'])) {
                                                                                                                                echo $_POST['username'];
                                                                                                                            }  ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if (isset($_POST['password'])) {
                                                                                                                                    echo $_POST['password'];
                                                                                                                                }  ?>" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="click" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>

                            </form>
                            <?php
                            require 'ketnoi.php';
                            $ketnoi = new Ketnoi('localhost', 'root', '', 'quanlioto');
                            
                            if (isset($_POST['click'])) {
                                $tk = $_POST['username'];
                                $pass = $_POST['password'];
                                $sqluser = $ketnoi->Excute("SELECT * FROM `staff` WHERE username='$tk'");
                                $dem = mysqli_num_rows($sqluser);
                                if ($dem > 0) {
                                    $row = mysqli_fetch_assoc($sqluser);
                                    if ($pass == $row['password']) {
                                        if ($row['trangthai'] == 0) {
                                            $_SESSION['taikhoanadmin'] = $tk;
                                            $_SESSION['role_id'] = $row['Role_id'];   
                                            echo "Đăng nhập thành công. <a href='home.php'> Trang chủ</a>";
                                        } else {
                                            echo "Tài khoản của bạn đã bị khóa...";
                                        }
                                    } else {


                                        echo 'Sai mật khẩu!';
                                    }
                                } else {

                                    echo 'Tài khoản không tồn tại!';
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="foderlogin/js/jquery.min.js"></script>
    <script src="foderlogin/js/popper.js"></script>
    <script src="foderlogin/js/bootstrap.min.js"></script>
    <script src="foderlogin/js/main.js"></script>

</body>

</html>