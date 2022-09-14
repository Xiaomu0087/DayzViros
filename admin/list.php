<?php
$title='订单管理';
include './head.php';
$sql = "select * from ayangw_order order by id DESC";
$res = $DB->query($sql);

//数组实现分页
$temp= "";
$i = 1;
$arr = array();
while ($row = $DB->fetch($res)){
    $temp .="
    <tr><td>{$row['id']}</td> <td>".ch($row['trade_no'])."<br>{$row['out_trade_no']}<br></td>  <td>".getName($row['gid'],$DB)."</td>
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

    }
    </script>
<main class="main-content">
    <div class="container-fluid">
<div class="list-group">
<div class="page-header d-md-flex justify-content-between align-items-center">
            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">订单列表</font></font></h4>

                <ol class="breadcrumb m-t-0">
			<button type="button" class="btn btn-danger" id="det_allOder">删除所有订单信息</button>　
			<button type="button" class="btn btn-warning" id="det_wOder">删除未交易成功的订单</button>
                </ol>
        </div>
			<div class="card">
                        <div class="table-responsive" tabindex="7" style="overflow: hidden; outline: none;">
                            <table class="table">
                                <thead class="thead-dark">
                                	<tr>
                                    <th scope="col">订单ID</th>
                                    <th scope="col">交易号/商户订单号</th>
                                    <th scope="col">商品名称</th>
                                    <th scope="col">支付类型/价格</td>
                                    <th scope="col">联系方式</td>
                                    <th scope="col">创建时间</th>
                                    <th scope="col">交易状态</th>
                                    <th scope="col">操作</th>
                                </tr>
			 <?php
			 $page = 1;
			 if(count($arr)>0){
			 if(!empty($_GET['page'])){
			     $page = $_GET['page'];
			 }
			 echo $arr[($page-1)];
			 }
			 ?>
			</table>
            <?php 
            echo "<ul class='pagination'>";
            if(count($arr)>1){
                if($page != 1){
                echo "<li><a href='list.php?page=1'>首页</a></li>";
                echo "<li><a href='list.php?page=".($page-1)."'>上一页</a></li>";
                }
                if($page != count($arr)){
                echo "<li><a href='list.php?page=".($page+1)."'>下一页</a></li>";
                echo "<li><a href='list.php?page=".count($arr)."'>末页</a></li>";
                }
                echo "<li><div class='input-group' style='max-width:150px; float:left;'>
			<input type='text' id='txt_page' class='form-control' placeholder='总".count($arr)."页'>
			<span id='but_page' title='list.php' alt='".count($arr)."' class='input-group-addon' style='cursor:pointer'>跳转到</span>
		</div></li>";
                echo "</ul>";
                
            }
          
            ?>
			</div>
		</div>
    </div>
</main>
<script src="/assets/vendors/bundle.js"></script>
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