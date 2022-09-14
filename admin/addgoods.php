<?php
$title='添加商品';
include './head.php';
$sql = "select * from ayangw_type";
$res =$DB->query($sql);
$t = "";

while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['tName']}</option>";
}

?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") !=$.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

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
                    	<div class="card-body">
                        <div class="form-row">
                            <div class="col-6"><label class="col-lg-3 control-label">选择改商品的分类</label>
                                <select class="form-control" id="type" name="type" default="">
                                	<option value="">----    选择商品分类    ----</option>
                                	<?php echo $t;?>
                                </select>
                            </div>
                            <div class="col-6"><label class="col-lg-3 control-label">是否上架</label>
                                <select class="form-control" id="state" name="state" default="">
                                	<option value='1'>上架</option>
                                	<option value='0'>停售</option>
                                </select>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">商品名称</label>
                                <input type="text" name="g_name" id="g_name"  class="form-control">
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">商品价格</label>
                            <input type="text" name="g_price" id="g_price"  class="form-control">
                            </div>
                            <div class="col-12"><br><label class="col-lg-3 control-label">商品介绍</label>
                            <textarea class="form-control" id="g_info" name="g_info" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                         <div class="form-group text-center">
                         		<input type="button" name="submit_addsp" id="submit_addsp" value="添加商品" class="btn btn-primary form-control"/><br/>
                         </div>
                        </form>
                       </div>
	 </div>
    </div>
</main>
	 <?php ?>