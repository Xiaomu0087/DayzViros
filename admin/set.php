<?php
$title='后台管理';
include './head.php';
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

    }
    </script>

<?php 
if($_GET['mod'] == "site"){
?>
<br>
<main class="main-content">
            	<div class="card">
                    <div class="card-body text-center m-t-70-minus">
                        <figure class="avatar avatar-xl m-b-20">
                            <img src="https://q4.qlogo.cn/g?b=qq&nk=<?php echo $conf['zzqq']; ?>&s=100" class="rounded-circle" alt="...">
                        </figure>
                    </div>
                          <form action="./set.php?mod=pay_n" method="post" class="form-horizontal" role="form">

                <div class="card-body">
                        <div class="form-row">
                            <div class="col-12"><label class="col-lg-3 control-label">网站域名</label>
                                <input type="text" name="web_url" id="web_url" value="<?php echo  $conf['web_url'] ?>" class="form-control" required/>
                                 <span style="color:red; font-weight: bold;"> * 域名格式必须为：http://xxxx.xxx.xx/ 系统检查您的域名应填：http://<?php echo  $_SERVER['HTTP_HOST']?>/</span>
                            </div>
                            <div class="col-6"><label class="col-lg-3 control-label">网站名称</label>
                                <input type="text" name="title" id="web_name" value="<?php echo  $conf['title'];  ?>" class="form-control"/>
                            </div>
                            <div class="col-6"><label class="col-lg-3 control-label">网站标题</label>
                            <input type="text" name="title2" id="title2" value="<?php echo $conf['title2'];  ?>" class="form-control"/>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">标题栏描述</label>
                                <input type="text" name="description" id="web_description" value="<?php echo $conf['description'];  ?>" class="form-control"/>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">关键字</label>
                            <input type="text" name="keywords" id="web_keywords" value="<?php echo $conf['keywords']; ?>" class="form-control"/>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">客服ＱＱ</label>
                                <input type="text" name="kfqq" id="web_qq" value="<?php echo $conf['zzqq']; ?>" class="form-control"/>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">QQ群号</label>
                            <input type="text" name="qun" id="qun" value="<?php echo $conf['qun']; ?>" class="form-control"/>
                            </div>
                            <div class="col-12"><br><label class="col-lg-3 control-label">加群链接</label>
                            <input type="text" name="qun1" id="qun1" value="<?php echo $conf['qun1']; ?>" class="form-control"/>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">首页公告1</label>
                                <textarea class="form-control" id="web_notice1" name="anounce" rows="5"><?php echo $conf['notice1'];?></textarea>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">首页公告2</label>
                            <textarea class="form-control" id="web_notice2" name="anounce" rows="5"><?php echo $conf['notice2'];?></textarea>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">首页公告3</label>
                                <textarea class="form-control" id="web_notice3" name="anounce" rows="5"><?php echo $conf['notice3'];?></textarea>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">发货页面公告</label>
                            <textarea class="form-control" id="dd_notice" name="dd_notice" rows="5"><?php echo $conf['dd_notice'];?></textarea>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">底部版权</label>
                                <input type="text" name="anounce" id="web_foot" value="<?php echo $conf['foot'];  ?>" class="form-control"/>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">防CC模式</label>
                            <select class="form-control" id="CC_Defender" name="CC_Defender">
                            	<option value="1" <?php if($conf['CC_Defender']==1) echo "selected"; ?> >开启</option>
                            	<option value="2" <?php if($conf['CC_Defender']==2) echo "selected"; ?>>关闭</option>
                            </select>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">反腾讯检测</label>
                            <select class="form-control" id="txprotect" name="txprotect">
                            	<option value="1" <?php if($conf['txprotect']==1) echo "selected"; ?> >开启</option>
                            	<option value="2" <?php if($conf['txprotect']==2) echo "selected"; ?>>关闭</option>
                            </select>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">QQ跳转</label>
                            <select class="form-control" id="qqtz" name="qqtz">
                            	<option value="1" <?php if($conf['qqtz']==1) echo "selected"; ?> >开启</option>
                            	<option value="2" <?php if($conf['qqtz']==2) echo "selected"; ?>>关闭</option>
                            </select>
                            </div>
                        </div>
                    </div>
                         <div class="form-group text-center">
                         		<input type="button"  id="submit_webInfo" value="修改保存" class="btn btn-primary form-control"/><br/>
                         </div>
                        </form>
                       </div>
                       </main>

<?php
}elseif($_GET['mod'] =='pay'){
?>
<br>
<main class="main-content">
            	<div class="card">
                    <div class="card-body text-center m-t-70-minus">
                        <figure class="avatar avatar-xl m-b-20">
                            <img src="https://q4.qlogo.cn/g?b=qq&nk=<?php echo $conf['zzqq']; ?>&s=100" class="rounded-circle" alt="...">
                        </figure>
                    </div>
                          <form action="./set.php?mod=pay_n" method="post" class="form-horizontal" role="form">

                <div class="card-body">
                        <div class="form-row">
                            <div class="col-6"><label class="col-lg-3 control-label">OSU易支付商户ID</label>
                                <input type="text" id="epay_pid" name="epay_pid" class="form-control" value="<?php echo $conf['xq_id']?>">
                            </div>
                            <div class="col-6"><label class="col-lg-3 control-label">OSU易支付密钥</label>
                                <input type="text" id="epay_key" name="epay_key" class="form-control" value="<?php echo  $conf['xq_key']?>">
                            </div>
                        </div>
                </div>
                         <div class="form-group text-center">
                         		<input type="button" id="submit_epay" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
                         </div>
                        </form>
                        <div class="form-group text-center">
                        	<a href="set.php?mod=epay">森度易支付设置</a>
                        	<br>
                        	<div class="downapk"><strong>森度易支付官网：</strong>
                        	<a style="font-weight: 800;color: #09f;" href="http://www.sd129.cn/" target="_blank">www.sd129.cn 点击进入</a>
                        	</div>
                        </div>
                       </div>
                       </main>
<?php
}elseif($_GET['mod'] =='admin'){?>
<br>
<main class="main-content">
            	<div class="card">
                    <div class="card-body text-center m-t-70-minus">
                        <figure class="avatar avatar-xl m-b-20">
                            <img src="https://q4.qlogo.cn/g?b=qq&nk=<?php echo $conf['zzqq']; ?>&s=100" class="rounded-circle" alt="...">
                        </figure>
                    </div>
                          <form action="./set.php?mod=pay_n" method="post" class="form-horizontal" role="form">

                <div class="card-body">
                        <div class="form-row">
                            <div class="col-6"><label class="col-lg-3 control-label">管理员账号</label>
                                <input  type="text" id="web_admin" name="web_admin" class="form-control"value="<?php echo $conf['admin']?>" disabled>
                            </div>
                            <div class="col-6"><label class="col-lg-3 control-label">管理员密码</label>
                                <input type="text" id="web_pwd" name="web_pwd" class="form-control" value="<?php echo $conf['pwd']?>">
                            </div>
                        </div>
                </div>
                         <div class="form-group text-center">
                         		<input type="button" id="submit_admin" name="submit" value="修改" class="btn btn-primary form-control"/>
                         		<br/>
                         </div>
                        </form>
                       </div>
                       </main>
<?php }elseif($_GET['mod'] =='epay_n'){
	$account=$_POST['account'];
	$username=$_POST['username'];
	if($account==NULL || $username==NULL){
		showmsg('保存错误,请确保每项都不为空!',3);
	} else {
	$data=get_curl($payapi.'api.php?act=change&pid='.$conf['xq_id'].'&key='.$conf['xq_key'].'&account='.$account.'&username='.$username.'&url='.$_SERVER['HTTP_HOST']);
	$arr=json_decode($data,true);
	if($arr['code']==1) {
		showmsg('修改成功!');
	}else{
		showmsg($arr['msg']);
	}
	}
}elseif($_GET['mod'] =='epay'){
if(isset($conf['xq_id']) && isset($conf['xq_key'])){
	$data=get_curl($payapi.'api.php?act=query&pid='.$conf['xq_id'].'&key='.$conf['xq_key'].'&url='.$_SERVER['HTTP_HOST']);
	$arr=json_decode($data,true);
	if($arr['code']==-2) {
		showmsg('支付接口KEY校验失败！');
	}elseif(!$data){
		showmsg('获取失败，请刷新重试！');
	}
}else{
	showmsg('你还未填写支付接口商户ID和密钥，请返回填写！');
}
if($arr['active']==0)showmsg('该商户已被封禁');
$key=substr($arr['key'],0,8).'****************'.substr($arr['key'],24,32);
?>
<main class="main-content">
    <div class="container-fluid">

<div class="page-header d-md-flex justify-content-between align-items-center">
            <h4>sou商户信息</h4>
        </div>
            	<div class="card">
                    	<div class="card-body">
                        <div class="form-row">
                            <div class="col-4"><label class="col-lg-3 control-label">商户ID</label>
                            <input type="text" name="pid"  value="<?php echo $arr['pid']; ?>" class="form-control" disabled/>
                            </div>
                            <div class="col-4"><label class="col-lg-3 control-label">商户KEY</label>
                            <input type="text" name="key" value="<?php echo $key; ?>" class="form-control" disabled/>
                            </div>
                            <div class="col-4"><label class="col-lg-3 control-label">商户余额</label>
                            <input type="text" name="money" value="<?php echo $arr['money']; ?>" class="form-control" disabled/>
                            </div>
                            <div class="col-6"><br><label class="col-lg-3 control-label">支付宝账号</label>
                            <input type="text" name="account" value="<?php echo $arr['account']; ?>" class="form-control" disabled/>
                            </div>
                            <div class="col-3"><br><label class="control-label">绑定姓名</label>
                            <input type="text" name="username" value="<?php echo $arr['username']; ?>" class="form-control" disabled/>
                            </div>
                        </div>
                    </div>
                       </div>
                       
<div class="page-header d-md-flex justify-content-between align-items-center">
            <h4>爱K商户信息</h4>
        </div>
            	<div class="card">
                    		<?php
	$data=get_curl($payapi.'api.php?act=settle&pid='.$conf['xq_id'].'&key='.$conf['xq_key'].'&limit=20&url='.$_SERVER['HTTP_HOST']);
	$arr=json_decode($data,true);
	if($arr['code']==-2) {
		showmsg('支付接口KEY校验失败！');
	}
echo '<div class="table-responsive" tabindex="7" style="overflow: hidden; outline: none;">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">结算账号</th>
                                    <th scope="col">结算金额</th>
                                    <th scope="col">手续费</td>
                                    <th scope="col">结算时间</td>
                                </tr>
                                </thead>
                                <tbody>';
foreach($arr['data'] as $res){
	echo '<tr><td><b>'.$res['id'].'</b></td><td>'.$res['account'].'</td><td><b>'.$res['money'].'</b></td><td><b>'.$res['fee'].'</b></td><td>'.$res['time'].'</td></tr>';
}
		  echo '</tbody>
        </table>
      ';

?>
                    </div>
                       </div>
                       
<div class="page-header d-md-flex justify-content-between align-items-center">
            <h4>订单记录（只展示前10条）</h4>
        </div>
            	<div class="card">
                        <?php
	$data=get_curl($payapi.'api.php?act=orders&pid='.$conf['xq_id'].'&key='. $conf['xq_key'].'&limit=10&url='.$_SERVER['HTTP_HOST']);
	$arr=json_decode($data,true);
	if($arr['code']==-2) {
		showmsg('爱K支付KEY校验失败！');
	}
echo '<div class="table-responsive" tabindex="7" style="overflow: hidden; outline: none;">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">交易号/商户订单号</th>
                                    <th scope="col">付款方式</th>
                                    <th scope="col">商品名称/金额</th>
                                    <th scope="col">创建时间/完成时间</td>
                                    <th scope="col">状态</td>
                                </tr>
                                </thead>
                                <tbody>
          ';
foreach($arr['data'] as $res){
	echo '<tr><td>'.$res['trade_no'].'<br/>'.$res['out_trade_no'].'</td><td>'.$res['type'].'</td><td>'.$res['name'].'<br/>￥ <b>'.$res['money'].'</b></td><td>'.$res['addtime'].'<br/>'.$res['endtime'].'</td><td>'.($res['status']==1?'<font color=green>已完成</font>':'<font color=red>未完成</font>').'</td></tr>';
}
		  echo '</tbody>
        </table>
      </div>';

?>

                    </div>

    </div>
</main>
	
<?php
 }elseif($_GET['mod']=='upimg'){
echo '
<br>
<main class="main-content">
    <div class="row">
    <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">选框</font></font></h5>
                        <div class="form-group">
                            <form action="set.php?mod=upimg" method="POST" enctype="multipart/form-data">
                <label for="file"></label>
                <input type="file" name="file" id="file" />
                <input type="hidden" name="s" value="1" />
                <br><br>
                <input type="submit" class="btn btn-primary btn-block" value="确认上传" />
                </form>
                        </div>
                    </div>
                </div>
            </div>
    <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">图片演示</font></font></h5>
                        <div class="form-group">
                            <img src="../assets/imgs/logo.png?r='.rand(10000,99999).'" style="max-width:100%">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</main>
                       ';
if($_POST['s']==1){
$extension=explode('.',$_FILES['file']['name']);
if (($length = count($extension)) > 1) {
$ext = strtolower($extension[$length - 1]);
}
if($ext=='png'||$ext=='gif'||$ext=='jpg'||$ext=='jpeg'||$ext=='bmp')$ext='png';
copy($_FILES['file']['tmp_name'], ROOT.'/assets/imgs/logo.'.$ext);
echo "成功上传文件!<br>（可能需要清空浏览器缓存才能看到效果）";
}

}else{
     showmsg("无效请求");
 }
?>


<script>
var items = $("select[default]");
if (typeof c == 'undefined')	window.close();
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default"));
}
</script>