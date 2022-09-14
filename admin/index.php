<?php
$title='后台管理';
include './head.php';
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
$sql = "select * from ayangw_order order by id DESC";
$res = $DB->query($sql);

//数组实现分页
$temp= "";
$i = 1;
$arr = array();
while ($row = $DB->fetch($res)){
    $temp .="<tr><td>{$row['id']}</td> <td>".ch($row['trade_no'])."<br>{$row['out_trade_no']}<br></td>  <td>".getName($row['gid'],$DB)."</td>
    <td>".getPayType($row['type'])."<br>￥{$row['money']}</td> <td>{$row['rel']}</td>
    <td>{$row['benTime']}<br>".ch($row['endTime'])."</td> <td>".zt($row['sta'])."</td> <td><span id='{$row['id']}' class='btn btn-xs btn-primary btndel'>删除</span></td></tr>";
    if($i==10){
    array_push($arr,$temp);
    $temp = "";
    $i =0;
    }
    $i++;
    }
    if($temp != ""){
    array_push($arr,$temp);
}
function ch($t){
    if($t == "" || $t ==null){
        return "<font >无</font>";
    }else{
        return $t;
    }

}

function getName($id,$DB){
    $sql = "select * from ayangw_goods where id =".$id;
    $res = $DB->query($sql);
    $row = $DB->fetch($res);
    return $row['gName'];
}

function getPayType($str){
    if($str == "qqpay"){
        return "QQ钱包";
    }
    if($str == "tenpay"){
        return "财付通";
    }
    if($str == "alipay"){
        return "支付宝";
    }
    if($str == "wxpay"){
        return "微信";
    }
}

function zt($z){
    if($z == 0){
        return "<font color='red'>未完成</font>";
    }else if($z == 1){
        return "<font>已完成</font>";
    }
}
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{
    	if (typeof c == 'undefined')	window.close();    
    }
    </script>


<!-- begin::main content -->
<main class="main-content">
    <div class="container-fluid">
        <!-- begin::page header -->
        <div class="page-header d-md-flex justify-content-between align-items-center">
            <div>
                <h4>个人发卡系统</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="https://www.hnymwl.com">阿奇源码资源平台</a></li>
                        <li class="breadcrumb-item active" aria-current="page">欢迎━(*｀∀´*)ノ亻!使用个人发卡系统，我们的系统全新美化，功能齐全，陆续推出更多溜批功能！</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end::page header -->

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>订单总数</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php echo $r1?>/笔
                                </h4>
                            </div>
                            <div>
                                <span class="pie"
                                      data-peity='{ "fill": ["#5d78ff", "#eeeeee"], "radius": 30 }'><?php echo $r1?>/100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>交易完成</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php echo $r2?>/笔
                                </h4>
                            </div>
                            <div>
                                <span class="pie"
                                      data-peity='{ "fill": ["#0abb87", "#eeeeee"], "radius": 30 }'><?php echo $r2?>/100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>今日订单数</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php echo $r6?>/笔
                                </h4>
                            </div>
                            <div>
                                <span class="pie"
                                      data-peity='{ "fill": ["#ea4141", "#eeeeee"], "radius": 30 }'><?php echo $r6?>,100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>今日成交金额</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php if($r7 != ""){ echo round($r7,2);}else{ echo "0";};?>/元
                                </h4>
                            </div>
                            <div>
                                <span class="pie" data-peity='{ "fill": ["#3a3f51", "#eeeeee"], "radius": 30 }'><?php if($r7 != ""){ echo round($r7,2);}else{ echo "0";};?>,100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between">
                            <h5 class="card-title">订单列表（只显示最新10笔）</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center m-b-20">
                                            <div class="icon-block m-r-15 icon-block-lg icon-block-outline-success text-success">
                                                <i class="fa fa-bar-chart"></i>
                                            </div>
                                            <div>
                                                <h6>卡密总数</h6>
                                                <h4 class="m-b-0 font-weight-bold"><?php echo $r3?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center m-b-20">
                                            <div class="icon-block m-r-15 icon-block-lg icon-block-outline-danger  text-danger">
                                                <i class="fa fa-hand-lizard-o"></i>
                                            </div>
                                            <div>
                                                <h6>卡密剩余</h6>
                                                <h4 class="m-b-0 font-weight-bold"><?php echo $r4?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center m-b-20">
                                            <div class="icon-block m-r-15 icon-block-lg icon-block-outline-warning text-warning">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            <div>
                                                <h6>已卖出</h6>
                                                <h4 class="m-b-0 font-weight-bold"><?php echo $r5?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-b-0">
                                <thead>
                                <tr>
                                    <th>订单ID</th>
                                    <th>交易号/商户订单号</th>
                                    <th>商品名称</th>
                                    <th>价格</th>
                                    <th>联系方式</th>
                                    <th>创建/完成时间</th>
                                    <th>交易状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
			 $page = 1;
			 if(count($arr)>0){
			 if(!empty($_GET['page'])){
			     $page = $_GET['page'];
			 }
			 echo $arr[($page-1)];
			 }
			 ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--<script src="/assets/vendors/bundle.js"></script>-->
<script src="/assets/vendors/charts/chartjs/chart.min.js"></script>
<script src="/assets/vendors/charts/peity/jquery.peity.min.js"></script>
<script src="/assets/js/examples/charts/chartjs.js"></script>
<script src="/assets/js/examples/charts/peity.js"></script>
<script src="/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="/assets/js/examples/dashboard.js"></script>
<script src="/assets/vendors/vmap/jquery.vmap.min.js"></script>
<script src="/assets/vendors/vmap/maps/jquery.vmap.usa.js"></script>
<script src="/assets/js/examples/vmap.js"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>