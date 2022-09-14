<?php

include '../AiKpay/common.php';
@header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台管理中心</title>
    <link rel="shortcut icon" href="http://www.aikpay.com/favicon.ico">
    <link rel="stylesheet" href="/assets/vendors/bundle.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendors/datepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/vendors/vmap/jqvmap.min.css">
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/custom.css" type="text/css">
  <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
  <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery.cookie.js"></script>
  <script src="js/jquery.md5.js"></script>
  <script src="../layer/layer.js"></script>
  <script src="js/Aikpay.js"></script>
</head>
<body>

<!-- 导航 -->
<div class="side-menu">
    <div class='side-menu-body'>
        <ul>
            <li  class="open"><a href="."><i class="icon ti-home"></i> <span>首页</span> </a></li>
            <li><a href="./list.php"><i class="icon ti-clipboard"></i> <span>订单管理</span> </a></li>
            <li class="side-menu-divider">卡密管理</li>
            <li><a href="./kmlist.php"><i class="icon ti-layers-alt"></i> <span>卡密列表</span> </a></li>
            <li><a href="./addkm.php"><i class="icon ti-layers-alt"></i> <span>添加卡密</span> </a></li>
            
            <li class="side-menu-divider">商品管理</li>
            <li><a href="./clist.php"><i class="icon ti-map"></i> <span>商品列表</span> </a></li>
            <li><a href="./addgoods.php"><i class="icon ti-map"></i> <span>添加商品</span> </a></li>
            <li><a href="./addGType.php"><i class="icon ti-map"></i> <span>设置分类</span> </a></li>
            
            <li class="side-menu-divider">平台设置</li>
            <li><a href="./set.php?mod=site"><i class="icon ti-rocket"></i> <span>网站信息配置</span> </a></li>
            <li><a href="./set.php?mod=upimg"><i class="icon ti-layout"></i> <span>首页LOGO配置</span> </a></li>
            <li><a href="./set.php?mod=pay"><i class="icon ti-crown"></i> <span>支付接口配置</span> </a></li>
            <li><a href="./set.php?mod=admin"><i class="icon ti-face-smile"></i> <span>管理员设置</span> </a></li>
        </ul>
        <div class="text-center">
        	个人发卡系统<br><a href="https://www.hnymwl.com">阿奇源码资源平台</a>
         </div>
    </div>
</div>
<!-- 导航结束 -->
<!-- 顶部 -->
<nav class="navbar">
    <div class="container-fluid">

        <div class="header-logo">
            <a href="#">
                <span class="logo-text d-none d-lg-block">个人发卡系统</span>
            </a>
        </div>
        <div class="header-body">
            <form class="search">
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="d-lg-none d-sm-block nav-link search-panel-open">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown">
                        <figure class="avatar avatar-sm avatar-state-success">
                            <img class="rounded-circle" src="https://q4.qlogo.cn/g?b=qq&nk=<?php echo $conf['zzqq']; ?>&s=100" alt="...">
                        </figure>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="./login.php" class="text-danger dropdown-item">退出登录</a>
                    </div>
                </li>
                <li class="nav-item d-lg-none d-sm-block">
                    <a href="#" class="nav-link side-menu-open">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- 顶部结束 -->
