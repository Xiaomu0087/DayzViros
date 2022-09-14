<?php
session_start();

@header('Content-Type: text/html; charset=UTF-8');

$title='用户登录';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="/assets/vendors/bundle.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css">
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery.cookie.js"></script>
  <script src="js/jquery.md5.js"></script>
  <script src="../layer/layer.js"></script>
  <script src="js/Aikpay.js"></script>
</head>
<body class="bg-white h-100-vh p-t-0">
<div class="p-b-50 d-block d-lg-none"></div>
<div class="container h-100-vh">
    <div class="row align-items-md-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block">
            <img class="img-fluid" src="/assets/media/svg/login.svg" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class="d-flex align-items-center m-b-20">
                <img src="assets/media/image/dark-logo.png" class="m-r-15" width="40" alt="">
                <h3 class="m-0">后台管理员登录</h3>
            </div>
            <p>请勿泄露自己的后台登录信息！~ 一权在手天下我有！</p>
                <div class="form-group mb-4">
                    <input type="text" id="user" name="user" value="" class="form-control form-control-lg" required="required" autofocus placeholder="登录账号">
                </div>
                <div class="form-group mb-4">
                    <input type="password" id="pass" name="pass" class="form-control form-control-lg" id="exampleInputPassword1" required="required" placeholder="登录密码">
                </div>
                <button type="button" class="btn btn-primary btn-lg btn-block btn-uppercase mb-4" id="login_submit">登 录</button>
                <br><hr>
                <div class="text-center">
                    Copyright © 2020 个人发卡系统 <a href="https://www.hnymwl.com">阿奇源码资源平台</a>
                </div>
        </div>
    </div>
</div>
</body>
</html>