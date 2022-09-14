<?php
$title='卡密管理';
include './head.php';
if(!empty($_POST['goods']) && !empty($_POST['txtKm'])){
    $g = $_POST['goods'];
    $str = $_POST['txtKm'];
    $arr = explode("\n",$str);
    if(count($arr) < 1){
        exit("<script>layer.msg('没有获取到有效卡密');window.location.href='addkm.php'</script>") ;
    }
    for($i = 0; $i <count($arr);$i++){
        $sql = "insert into ayangw_km(gid,km,benTime) values({$g},'{$arr[$i]}',now())";
         $DB->query($sql);
    }
    echo "<script>layer.msg('成功添加".count($arr)."张卡密！');window.location.href='addkm.php'</script>";
}

$sql = "select * from ayangw_goods";
$res =  $DB->query($sql);
$t = "";
while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['gName']}</option>";
}
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }
  
    </script>
<main class="main-content">
    <div class="container-fluid">
    	
    	<br>
            	<div class="card">
                    <div class="card-body text-center m-t-70-minus">
                        <figure class="avatar avatar-xl m-b-20">
                            <img src="https://q4.qlogo.cn/g?b=qq&amp;nk=<?php echo $conf['zzqq']; ?>&amp;s=100" class="rounded-circle" alt="...">
                        </figure>
                    </div>
                    <form action="" method="post" class="form-horizontal" role="form">
                    <div class="col-12"><br><label class="col-lg-3 control-label">选择要添加卡密的商品</label>
                            <select class="form-control" id="goods" name="goods" default="">
                            	<?php echo $t;?>
                            </select>
                            </div>
                            
                            
                            <div class="col-12"><br><label class="col-lg-3 control-label">导入卡密（一行一个）</label>
                            <textarea class="form-control" id="txtKm" name="txtKm" rows="5"></textarea>
                            </div>
                        <script type="text/javascript">if (typeof c == 'undefined')	window.close();</script>
                         <div class="form-group text-center">
                         	<br>
                         		<input type="submit" name="submit_km" id="submit_km" value="添加卡密" class="btn btn-primary form-control"/><br>
                         </div>
                         </form>
                       </div>
	 </div>
    </div>
</main>