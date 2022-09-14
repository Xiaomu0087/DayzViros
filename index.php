<?php
include 'AiKpay/common.php';
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['qqtz']==1){
    header("Content-Type: text/html; charset=utf-8");
    echo '<!DOCTYPE html>
    <html>
     <head>
      <title>请使用浏览器打开</title>
      <script src="https://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
      <script type="text/javascript"> mqq.ui.openUrl({ target: 2,url: "'.$siteurl.'"}); </script>
      cs 
     </head>
     <body></body>
    </html>';
     exit;
}

$rs=$DB->query("select * from ayangw_type");
$select = "";
while ($row = $DB->fetch($rs)){
    $select.='<option value="'.$row['id'].'">'.$row['tName'].'</option>';
}
$r1 = $DB->count("SELECT COUNT(id) from ayangw_order");
$r2 = $DB->count("SELECT COUNT(id) from ayangw_order  where sta = 1");
$r3 =$DB->count("select COUNT(id) from ayangw_km");
$r4 = $DB->count("SELECT COUNT(id) from ayangw_km  where stat = 0");
$r5 =$DB->count("SELECT COUNT(id) from ayangw_km  where stat = 1");
$r6 = $DB->count("select COUNT(id)
from ayangw_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now())");
$r7 =$DB->count("select SUM(money)
from ayangw_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now()) and sta = 1");

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
        exit("<script>alert('无此条记录！');window.location.href='getkm.php'</script>");
        
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
        <script src="js/Aikpay.js"></script>
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
                        <a href="/" class="active"><i class="material-icons">dashboard</i>发卡首页</a>
                    </li>
                    <li>
                        <a href="Aikpay_km.php"><i class="material-icons">inbox</i>查询订单</a>
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
                <!--<a class="navbar-brand" href="#">AiKpay</a>-->
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
                                                <li><?php echo $conf['notice1']?></li>
                                                <li><?php echo $conf['notice2']?></li>
                                                <li><?php echo $conf['notice3']?></li>
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">订单总数</h5>
                                    <h2 class="float-right"><?php echo $r1?></h2>
                                    <p>平台总计订单数量：</p>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $r1?>%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">今日订单</h5>
                                    <h2 class="float-right"><?php echo $r6?></h2>
                                    <p>今日付款成功订单：</p>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $r6?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">交易完成</h5>
                                    <h2 class="float-right"><?php echo $r2?></h2>
                                    <p>平台总交易成功量：</p>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $r2?>%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">剩余卡密</h5>
                                    <h2 class="float-right"><?php echo $r4?></h2>
                                    <p>当前共计剩余卡密数量：</p>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $r4?>%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning m-b-lg" role="alert" id="ginfo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card">
                                <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputState"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品分类</font></font></label>
                                                <select name="tp_id" id="tp_tid" class="form-control" onchange="getPoint(this);"><?php echo $select?></select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputState"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">选择商品</font></font></label>
                                                					<select name="gid" id="gid" class="form-control" onchange="getPrice(this)"></select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品价格</font></font></label>
                                                <input type="text" name="need" id="need" class="form-control" disabled/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品库存</font></font></label>
                                                <input type="text" name="kc" id="kc" class="form-control" disabled/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系方式</font></font></label>
                                                <input type="text" name="lx" id="lx" value="" class="form-control" placeholder="输入您的QQ,您的QQ号码也可以作为您的提取密码" required/>
                                            </div>
                                        </div>
                                    <div class="text-center">
                                    <div class="custom-control custom-radio">
                                    	<span class="btn btn-default btnSpan" title="alipay">
                                        <input class="custom-control-input" type="radio" name="type" value="alipay" class="pay" id="alipay" value="alipay" title="支付宝">
                                        <label class="custom-control-label" for="alipay">
                                            支付宝
                                        </label>　
                                        </span>
                                    	<span class="btn btn-default btnSpan" title="wxpay">
                                        <input class="custom-control-input" type="radio" name="type" value="wxpay" class="pay" id="wxpay" value="wxpay" title="微信支付">
                                        <label class="custom-control-label" for="wxpay">
                                            微信
                                        </label>　　
                                        </span>

                                    	<span class="btn btn-default btnSpan" title="qqpay">
                                        <input class="custom-control-input" type="radio" name="type" value="qqpay"  class="pay" id="qqpay" value="qqpay" title="QQ钱包">
                                        <label class="custom-control-label" for="qqpay">
                                            QQ
                                        </label>
                                        </span>
                                    </div><br>
                                    <input type="submit" id="submit_buy" class="btn btn-primary" value="立即购买">
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
                        <div class="col-md-12 text-center ">
                            <span class="footer-text">Copyright © <?php echo date("Y");?> 个人发卡网　-　<a href="https://www.hnymwl.com">阿奇源码资源平台</a></span>
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
        <!-- 图片 -->
        <script src="../../assets/plugins/elevatezoom/jquery.elevatezoom-3.0.8.min.js"></script>
        <script src="../../assets/js/pages/image_zoom.js"></script>
        
    </body>
</html>