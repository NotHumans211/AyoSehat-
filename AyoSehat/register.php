<?php 
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand" style="display: flex; justify-content: center; align-items: center;">
                        <style>
                            @keyframes moveUpDown {
                                0% { transform: translateY(0); }
                                50% { transform: translateY(-10px); }
                                100% { transform: translateY(0); }
                            }
                            .moving-image {
                                animation: moveUpDown 2s ease-in-out infinite;
                            }
                        </style>
                        <img src="assets/images/medical.png" alt="" style="width: 200px; height: auto;" class="moving-image">                        
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <form method="POST" class="my-login-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password
                                        <a href="forgot.php" class="float-right">Forgot Password?</a>
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" required data-eye>
                                    <div class="invalid-feedback">Password is required</div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" class="form-control" name="role" required>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    <div class="invalid-feedback">Role is required</div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
                                        <label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
                                        <div class="invalid-feedback">You must agree with our Terms and Conditions</div>
                                    </div>
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                                </div>
                                <div class="mt-4 text-center">
                                    Already have an account? <a href="login.php">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer" style="text-align: center;">
                        Copyright &copy; 2024 &mdash; AyoSehat
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
</body>
</html>
