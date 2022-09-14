<?php
$title='卡密列表';
include './head.php';
$sql = "select * from ayangw_km";
$res =  $DB->query($sql);

//数组实现分页
$temp= "";
$i = 1;
$arr = array();
while ($row = $DB->fetch($res)){
    $temp .="<tr><td>{$row['id']}</td> <td>".getName($row['gid'],$DB)."</td> <td>{$row['km']}</td> <td>{$row['benTime']}/<br>{$row['endTime']}</td> <td>{$row['out_trade_no']}/<br>{$row['trade_no']}</td>
    <td>{$row['rel']}</td> <td>".zt($row['stat'])."</td> <td><span id='{$row['id']}' class='btn btn-xs btn-primary btndel_km'>删除</span></td></tr>";
    if($i==10){
        array_push($arr,$temp);
        $temp = "";
        $i =0;
    }
    $i++;
}
function getName($id,$DB){
    $sql = "select * from ayangw_goods where id =".$id;
    $res =  $DB->query($sql);
    $row = $DB->fetch($res);
    return $row['gName'];
}
if($temp != ""){
    array_push($arr,$temp);
}
function zt($z){
    if($z == 1){
        return "<font color='red'>已出售</font>";
    }else if($z == 0){
        return "<font>未出售</font>";
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
            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">卡密列表</font></font></h4>

                <ol class="breadcrumb m-t-0">
                    <button type="button" class="btn btn-danger" id="det_allkm">删除所有卡密</button>　
			<button type="button" class="btn btn-warning" id="det_ykm">删除已使用卡密</button>
                </ol>
        </div>
			
			<div class="card">
                        <div class="table-responsive" tabindex="7" style="overflow: hidden; outline: none;">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">卡密ID</th>
                                    <th scope="col">商品ID</th>
                                    <th scope="col">卡密</th>
                                    <th scope="col">导入/使用 时间</td>
                                    <th scope="col">订单号/流水号</td>
                                    <th scope="col">购买者</th>
                                    <th scope="col">状态</th>
                                    <th scope="col">操作</th>
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
            <?php 
            echo "<ul class='pagination'>";
            if(count($arr)>1){
                if($page != 1){
                echo "<li><a href='kmlist.php?page=1'>首页</a></li>";
                echo "<li><a href='kmlist.php?page=".($page-1)."'>上一页</a></li>";
                }
                if($page != count($arr)){
                echo "<li><a href='kmlist.php?page=".($page+1)."'>下一页</a></li>";
                echo "<li><a href='kmlist.php?page=".count($arr)."'>末页</a></li>";
                }
                echo "<li><div class='input-group' style='max-width:150px; float:left;'>
			<input type='text' id='txt_page' class='form-control' placeholder='总".count($arr)."页'>
			<span id='but_page' title='kmlist.php' alt='".count($arr)."'  class='input-group-addon' style='cursor:pointer'>跳转到</span>
		</div></li>";
                echo "</ul>";
                
            }
          
            ?>
                        </div>
                    </div>
		</div>
		</div>
      
  </div>
    </div>
</main>