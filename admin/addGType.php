<?php
$title='添加商品';
include './head.php';
$sql = "select * from ayangw_type";
$res = $DB->query($sql);
$t = "";
while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['tName']}</option>";
}
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

    }
    </script>
<main class="main-content">
    <div class="container-fluid"><br>
    <div class="card">
                    <div class="card-body text-center m-t-70-minus">
                        <figure class="avatar avatar-xl m-b-20">
                            <img src="https://q4.qlogo.cn/g?b=qq&amp;nk=<?php echo $conf['zzqq']; ?>&amp;s=100" class="rounded-circle" alt="...">
                        </figure>
                    </div>
                      <form action="" method="post" class="form-horizontal" role="form">
                    <div class="col-12"><br><label class="col-lg-3 control-label">已添加的分类</label>
                            <select class="form-control" id="g_type" name="g_type" default="">
                            	<option value="">----    选择分类    ----</option>
                            	<?php echo $t;?>
                            </select>
                            </div>
                         <div class="form-group text-center">
                         	<br>
                         		<input type="button" name="up_type" id="up_type" value="删除该分类" class="btn btn-primary form-control"/><br/>
                         </div>
                    <div class="col-12"><br><label class="col-lg-3 control-label">分类名称</label>
                            <input type="text" name="t_name" id="t_name"  class="form-control">
                            </div>
                         <div class="form-group text-center">
                         	<br>
                         		<input type="button" name="submit_addtype" id="submit_addtype" value="添加分类" class="btn btn-primary form-control"/><br/>
                         </div>
                        </form>
                   </div>
               </div>
            </main>