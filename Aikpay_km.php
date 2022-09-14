<?php
header("Content-Type: text/html; charset=utf-8");
include 'AiKpay/common.php';
if(!empty($_GET['out_trade_no'])){
    $t = $_GET['out_trade_no'];
}else{
    $t = "";
}
$km ="";

if(!empty($_POST['tqm'])){
    $tqm = $_POST['tqm'];
    $sql = "select * from ayangw_km
    where out_trade_no ='{$tqm}' or trade_no = '{$tqm}' or rel = '{$tqm}'
    ORDER BY endTime desc
    limit 1";
    
    $res = $DB->query($sql);
    if($row = $DB->fetch($res)){
        $sql2 = "select * from ayangw_goods where id =".$row['gid'];
        $res2 = $DB->query($sql2);
        $row2 =$DB->fetch($res2);
    }else{
        exit("<script>alert('无此条记录！');window.location.href='Aikpay_km.php'</script>");
        
    }
}

$mod=isset($_GET['act'])?$_GET['act']:null;
if($mod == "email"){
   
}

function isEmail($email){
    $mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
    if(preg_match($mode,$email)){
        return true;
    }
    else{
        return false;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <title><?php echo $conf['title'];?> - <?php echo $conf['title2'];?></title>
        <meta name="keywords" content="<?php echo $conf['keywords'];?>">
        <meta name="description" content="<?php echo $conf['description'];?>">
        <link rel="shortcut icon" href="http://www.aikpay.com/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="../../assets/css/lime.min.css" rel="stylesheet">
        <link href="../../assets/css/custom.css" rel="stylesheet">
        <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="layer/layer.js"></script>
        <script src="js/ayangw.js"></script>
        <script type="text/javascript">
        $(function(){
        	getPoint($("#tp_tid"));
        	})
        	</script>
        </head>
       <body>
        <div class="lime-sidebar">
            <div class="lime-sidebar-inner slimscroll">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        菜单栏
                    </li>
                    <li>
                        <a href="/"><i class="material-icons">dashboard</i>发卡首页</a>
                    </li>
                    <li>
                        <a href="Aikpay_km.php"class="active"><i class="material-icons">inbox</i>查询订单</a>
                    </li>
                    <li class="sidebar-title">
                        友情链接
                    </li>
                </ul>
            </div>
        </div>
        <div class="lime-header">
            <nav class="navbar navbar-expand-lg">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" class="button-collapse material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>
                <img src="../assets/imgs/logo.png?r='.rand(10000,99999).'" width="150px" height="35px" style="margin-top:3px">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="material-icons">keyboard_arrow_down</i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form action="Aikpay_km.php?act=query" method="POST" class="form-inline my-2 my-lg-0 search">
                        <input class="form-control mr-sm-2" type="search" name="tqm" id="tqm" value="<?php if($t != ""){ echo $t;}?>" placeholder="输入联系方式/订单编号/商户单号/都可以提取到您的卡密" aria-label="Search">
                    </form>
                    
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="/admin">站长后台</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="lime-container">
            <div class="lime-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <div class="dashboard-info row">
                                        <div class="info-text col-md-6">
                                            <h5 class="card-title"><?php echo $conf['title'];?></h5>
                                            <p>本站地址：<?php echo $_SERVER['HTTP_HOST']?>　官方客服QQ：<?php echo $conf['zzqq']?>　QQ群：<?php echo $conf['qun']; ?></p>
                                            <ul>
                                                <?php echo $conf['dd_notice']?>
                                            </ul>
                                            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['zzqq']?>" class="btn btn-warning m-t-xs">联系客服</a>　
                                            <a href="<?php echo $conf['qun1']?>" class="btn btn-warning m-t-xs">官方交流群</a>
                                           </div>
                                        <div class="info-image col-md-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                            	<form action="Aikpay_km.php?act=query" method="POST">
                                                <div class="input-group">
                                                    <input type="text" name="tqm" id="tqm" value="<?php if($t != ""){ echo $t;}?>" class="form-control text-center" placeholder="输入联系方式/订单编号/商户单号/都可以提取到您的卡密" required/>
                                                    <div class="input-group-append">
                                                        		<input type="submit" id="sub_query" class="btn btn-primary btn-block" value="提取卡密">
                                                       
                                                    </div>
                                                </div>
                                                </font>
                                            </div>
                                        </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card">
                                <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单遍号</font></font></label>
                                                <input type="text" name="bh"  value="<?php echo $row['out_trade_no'];?>" class="form-control" placeholder="" disabled/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品名称</font></font></label>
                                                <input type="text" name="mc" value="<?php echo $row2['gName'];?>" class="form-control" placeholder="" disabled/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">成交时间</font></font></label>
                                                <input type="text" name="sj" value="<?php echo $row['endTime']?>" class="form-control" placeholder="" disabled/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">买家QQ</font></font></label>
                                                <input type="text" value="<?php echo $row['rel'];?>" class="form-control" placeholder="" disabled/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">您的卡密</font></font></label>
                                                <div class="input-group">
                                                    <input type="text"readonly="readonly" name="content" id="content" value="<?php echo $row['km'];?>" class="form-control" placeholder=""/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-dark  " type="button">
                                                        	<font style="vertical-align: inherit;">
                                                        		<font style="vertical-align: inherit;" onclick="jsCopy()">复制卡密</font>
                                                        	</font>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lime-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">Copyright © 2019 <?php echo $conf['foot']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 基本 -->
        <script src="../../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../assets/plugins/bootstrap/popper.min.js"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../../assets/plugins/chartjs/chart.min.js"></script>
        <script src="../../assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../../assets/js/lime.min.js"></script>
        <script src="../../assets/js/pages/dashboard.js"></script>
        <script type="text/javascript"> 
    function jsCopy(){ 
        var e=document.getElementById("content");
        e.select();
        document.execCommand("Copy");

       alert("已复制好，可贴粘。"); 
    } 
</script> 
    </body>
</html>