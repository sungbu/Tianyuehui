<?php require_once('Connections/tky.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO qb (xinmin, dianhua, liuyan) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['xingming'], "text"),
                       GetSQLValueString($_POST['dianhua'], "int"),
                       GetSQLValueString($_POST['liuyan'], "text"));

  mysql_select_db($database_tky, $tky);
  $Result1 = mysql_query($insertSQL, $tky) or die(mysql_error());
}

mysql_select_db($database_tky, $tky);
$query_Recordset1 = "SELECT * FROM qb";
$Recordset1 = mysql_query($query_Recordset1, $tky) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>天悦荟健身</title>
<meta name="baidu-site-verification" content="2ajZ4SHvKu" />
<link href="index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{margin:0 auto;}
#bt1 {
	position: absolute;
	left: 292px;
	top: 2111px;
	width: 88px;
	height: 29px;
	z-index: 1;
	background-image: url(image/bj.png);
}
#bt2 {
	position: absolute;
	left: 292px;
	top: 2140px;
	width: 88px;
	height: 29px;
	z-index: 1;
	background-image: url(image/bj.png);
}
#bt3 {
	position: absolute;
	left: 292px;
	top: 2168px;
	width: 88px;
	height: 29px;
	z-index: 1;
	background-image: url(image/bj.png);
}
#apDiv1 {
	position: absolute;
	left: 491px;
	top: 1535px;
	width: 488px;
	height: 335px;
	z-index: 2;
	
}
#wb1 {
	position: absolute;
	left: 562px;
	top: 1994px;
	width: 488px;
	height: 347px;
	z-index: 2;
	background-image: url(image/bj2.png);
		visibility: hidden;	
}
#wb2 {
	position: absolute;
	left: 563px;
	top: 1996px;
	width: 488px;
	height: 335px;
	z-index: 2;
	background-image: url(image/bj2.png);
		visibility: hidden;	
}
#wb3 {
	position: absolute;
	left: 564px;
	top: 1994px;
	width: 488px;
	height: 335px;
	z-index: 2;
	background-image: url(image/bj2.png);
}
#apDiv2 {
	position: absolute;
	left: 947px;
	top: 237px;
	width: 57px;
	height: 35px;
	z-index: 3;
}
#apDiv3 {
	position: absolute;
	left: 947px;
	top: 448px;
	width: 57px;
	height: 35px;
	z-index: 4;
}
#dianhuabt {
	position: absolute;
	left: 947px;
	top: 298px;
	width: 57px;
	height: 58px;
	z-index: 5;
	background-image: url(image/dianhua2.png);
}
#weixinbt {
	position: absolute;
	left: 947px;
	top: 368px;
	width: 57px;
	height: 57px;
	z-index: 6;
	background-color: #D6D6D6;
	background-image: url(image/weixing.png);
}
#weixinnr {
	position: absolute;
	left: 817px;
	top: 343px;
	width: 100px;
	height: 100px;
	z-index: 7;
	background-image: url(image/wx2.png);
	visibility: hidden;
}
#dianhuanr {
	position: absolute;
	left: 587px;
	top: 297px;
	width: 345px;
	height: 57px;
	z-index: 8;
    visibility: hidden;
	background:#333;
}
#apDiv8 {
	position: absolute;
	left: 641px;
	top: 250px;
	width: 364px;
	height: 218px;
	z-index: 9;
}
</style>

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
</script>

<body> <div class="xhl">
<div id="apDiv2"><a href="#sy"><img src="image/top.png" name="置顶" width="57" height="35" id="置顶" /></a></div>
<div id="apDiv3"><a href="#dl1"><img src="image/down.png" name="置尾" width="57" height="35" id="置尾" /></a></div>
<div id="dianhuabt" onMouseMove="MM_showHideLayers('dianhuabt','','show','weixinbt','','inherit','weixinnr','','hide','dianhuanr','','show')"></div>
<div id="weixinbt" onMouseMove="MM_showHideLayers('dianhuabt','','inherit','weixinbt','','show','weixinnr','','show','dianhuanr','','hide')"></div>
<div id="weixinnr"></div>
<div id="dianhuanr">

  <p><font size="+2" color="#ffffff"><b>客服电话：0731-89825161</b></font></p>
</div></div>
<div class="qb">
  <div class="sb2">
    <ul>
      <li><a href="#sy" title="网站首页" target="_top"><b>网站首页</b></a></li>
      <li><a href="#hyzx" title="会员中心" target="_top"><b>会员中心</b></a></li>
      <li><a href="#hsjj" title="会所简介" target="_top"><b>会所简介</b></a></li>
      <li><a href="#hjss" title="环境设施" target="_top"><b>环境设施</b></a></li>
      <li><a href="#jd" title="教练团队" target="_top"><b>教练团队</b></a></li>
      <li><a href="#zp1" title="人才招聘" target="_top"><b>人才招聘</b></a></li>
      <li><a href="#dl1" title="关于我们" target="_top"><b>关于我们</b></a></li>
    </ul>
  </div>
  <div class="sb">
    <a name="sy" id="sy"></a>
    <div class="logo"></div>
  <div class="wz">
    <div class="wz1"></div>
    <div class="wz2" align="center"></div>
    <div class="wz3"><font size="3"><b>Tian Yue Hui Fitness </b></font></div>
  </div>
  <div class="kf">
    <div class="tb"></div>
    <div class="wz4"><font size="+2" color="#00238f"><b>客服电话：</b></font></div>
    <div class="dh"><font size="+3" color="#00238f"><b>0731-89825161</b></font></div>
  </div>
</div>
</div>
<div class="qb2" >
<div class="lunbou">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1000" height="500" id="FlashID" title="lb1">
    <param name="movie" value="FLASH/LUNBO.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="15.0.0.0" />
    <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="FLASH/LUNBO.swf" width="1000" height="500">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="15.0.0.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
      <div>
        <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
</object>
</div>

 <div class="toutiao">
 <div class="TQ"><a name="toutiao" id="toutiao"></a></div><div class="WB">
<marquee direction="up" scrolldelay="600" scrollamount="15" align="middle"; onmouseover="this.stop()"; onmouseout="this.start()";>
<ul>
    <li><a href="#toutiao" title="动感单车和健身车的区别？" target="_self" onclick="MM_popupMsg('动感单车和健身车的区别?\r\r　　动感单车运动量比较大，健身车运动量小一点。动感单车能模拟登山、转弯、冲刺等骑行方式，尤其是跟着音乐节奏骑行，可以减轻疲劳还有枯燥的感觉，让运动乐趣提高，不过对于体重过重还有老年群体是不适合的;健身车只可以坐着骑行，不过对中老年人还有运动水平较差的人群是非常不错的选择。')">动感单车和健身车的区别？</a></li>
    <li><a href="#toutiao" title="跑步时用不用穿鞋，穿什么鞋？" target="_self" onclick="MM_popupMsg('跑步时用不用穿鞋，穿什么鞋?\r\r　　跑步的时候务必要穿运动鞋或专业跑步鞋。(跑步过程中专业运动鞋可以有效缓冲身体关节。光脚是绝对不行的，原因是运动中脚底会出汗，光脚容易滑倒。)')">跑步时用不用穿鞋，穿什么鞋？</a></li>
    <li><a href="#toutiao" title="跑步一次跑多久？" target="_self" onclick="MM_popupMsg('一次跑多久?\r\r　　以减脂为目的的跑步训练，一次运动时间不可以少于20分钟，大概50分钟最好。')">跑步一次跑多久？</a></li>
    <li><a href="#toutiao" title="健身器材对膝盖是不是有伤害？" target="_self" onclick="MM_popupMsg('健身器材对膝关节是不是有伤害?\r\r　　不管是什么样的健身器械，只要依据正确方法使用，都不会伤害到身体。')">健身器材对膝盖是不是有伤害？</a></li>
    <li><a href="#toutiao" title="减肥练那个更有效果？" target="_self" onclick="MM_popupMsg('减肥效果哪个更显著?\r\r　　不管是什么运动项目，只要坚持去做，对减肥的帮助都是很大的，(有氧器械里依据训练强度从强到弱依次是：动感单车、登山器、椭圆机、跑步机、磁控车。)')">减肥练那个更有效果？</a></li>
    <li><a href="#toutiao" title="跑步机与椭圆机的区别？" target="_self" onclick="MM_popupMsg('跑步机和椭圆机的区别?\r\r　　跑步机属于被动性运动，一般是下肢进行的有氧运动;椭圆机是主动性运动，运动的时候可手脚并用，而且相对于跑步机可以让身体各个关节，尤其是膝关节的压力有效减小。')">跑步机与椭圆机的区别？</a></li>
    <li><a href="#toutiao" title="老年人适合进行那种运动?" target="_self" onclick="MM_popupMsg('老年人适合进行哪种运动?\r\r　　有氧器械不妨能选择立式健身车或卧式健身车。无氧训练不妨能采用一些徒手或静态式的力量训练。')">老年人适合进行那种运动?</a></li>
    <li><a href="#toutiao" title="哑铃多重合适？" target="_self" onclick="MM_popupMsg('哑铃多重合适?\r\r　　哑铃属于力量训练的一种有效器械。 力量训练分3种健身目的：\r\r　　① 以肌肉力量增加为目的的训练，我们选择一组可以进行1到6次的重量为合适;\r\r　　② 以肌肉围度发达为目的的训练，我们选择一组可以进行8到12次的重量为合适;\r\r　　③ 以减脂还有增加肌肉耐力为目的的训练，我们选择一组可以进行15到20次的重量为合适。')">哑铃多重合适？</a></li>
    <li><a href="#toutiao" title="仰卧板直板与弧形板的区别？" target="_self" onclick="MM_popupMsg('仰卧板直板与弧形板的区别?\r\r　　对于腹部运动，弧形板的运动幅度更大、更可以好好地锻炼腹部。对于训练功能，仰卧板直板还能替代哑铃平凳做其他训练。')">仰卧板直板与弧形板的区别？</a></li>
    <li><a href="#toutiao" title="刚用跑步机为啥会头晕?" target="_self" onclick="MM_popupMsg('刚用跑步机为啥会头晕?\r\r　　原因是在跑步机上运动的时候，我们走路或跑步周边的物体是静止的，初次进行跑步机运动的人会不适应，容易出现头晕;另一种原因是没进行热身运动。因此初次和刚刚进行跑步机运动的时候要从慢过渡到快、循序渐进，让身体可以快点适应。')">刚用跑步机为啥会头晕?</a></li>
    <li><a href="#toutiao" title="跑步时能否喝水？" target="_self" onclick="MM_popupMsg('跑步时能否喝水?\r\r　　跑步的时候因为运动强度比较大，是不可以喝水的。(假如口渴，不妨能将速度降低，在呼吸顺畅的条件下，以少量多次的方式来补水是最好的。)')">跑步时能否喝水？</a></li>
    <li><a href="#toutiao" title="韧带有伤可以运动恢复？" target="_self" onclick="MM_popupMsg('韧带有伤可以运动恢复?\r\r　　建议能避开受伤关节做锻炼。对受伤的关节要尽量避免运动，在医生允许的条件下，也能做一些静态或徒手的训练。')">韧带有伤可以运动恢复？</a></li>
    <li><a href="#toutiao" title="心脏不好做什么运动缓解？" target="_self" onclick="MM_popupMsg('心脏不好做什么运动缓解?\r\r　　不妨能用健身车，跑步机，不过运动量不可以太大。要按照自己的心肺功能做循序渐进的训练。')">心脏不好做什么运动缓解？</a></li>
</ul></marquee></div><a name="hyzx" id="hyzx"></a>
</div></div>
<div class="qb3">
<div class="huzxbt" align="center"> <font size="+6" color="#00ccff"><b><p><font color="#FFCC00">M</font><font color="#FFFFFF">EMBER CENTER</font></p></b></div>
<div class="huzxbt2"><font size="+3" color="#ffffff"><b>会员中心</b>
</font></div>
<div class="hyzx">
<table width="800px" border="0">
  <tr>
  <td height="80" valign="middle">
  <form action="<%=MM_editAction%>" method="post" id="form1" name="form1">
    <p><span class="xmbt"><font size="6" color="#FFCC00"><b>姓</b></font><font color="#FFFFFF" size="6"><b>名：</b></font></span></span>
      <input name="xingming" type="text" class="xinmin" id="xingming" style="background:url(image/hyzx.png); width:330px; height:33px; font-size:30px;" value="姓名" />
    </p>
    <p><span class="xmbt"><font size="6" color="#FFCC00"><b>电</b></font><font color="#FFFFFF" size="6"><b>话：</b></font></span>
      <input name="dianhua" type="text" class="xinmin" id="dianhua" style="background:url(image/hyzx.png); width:330px; height:33px; font-size:30px;" value="电话" />
    </p>
    <p><span class="xmbt"><font size="6" color="#FFCC00"><b>留</b></font><font color="#FFFFFF" size="6"><b>言：</b></font></span>
      <input name="liuyan" type="text" class="xinmin" id="liuyan" style="background:url(image/hyzx2.png); width:330px; height:170px; font-size:30px;" value="留言" />
    </p>
    <p>
      <input class="anniu2" type="submit" name="btn2" id="btn2" value="提交" style="width:75px; height:35px;" />
    </p>
  </form></td></tr></table>
</div></div>
<div class="qb4">
<div class="xqb4">
<div class="bt"><font color="#00ccff"><b><font color="#0066FF";><a name="hsjj" id="hsjj"></a>B</font><font color="#FFFFFF">RIEF     INTRODUCTION</font></b>
</div>
<div class="bt2">
<font size="+3" color="#ffffff"><b>会所简介</b></font></div>
<div class="nr">
<div  class="DZ"  onload="MM_preloadImages('image/jsf4.png','image/jsf3.png','image/yyg4.png','image/hyzxx2.png','image/dgdc3.png','image/dgdc5.png','image/jl8.png','image/jl5.png','image/jl7.png','image/jl6.png')"> 
<div class="t" id="bt1"><a href="#hsjj" title="关于会所"><b onMouseMove="MM_showHideLayers('bt1','','show','bt2','','inherit','bt3','','inherit','wb1','','hide','wb2','','hide','wb3','','show')">关于会所</b></a></div>
<div class="t" id="bt2"><a href="#hsjj" title="项目介绍"><b onMouseMove="MM_showHideLayers('bt1','','inherit','bt2','','show','bt3','','inherit','wb1','','hide','wb2','','show','wb3','','hide')">项目介绍</b></a></div>
<div class="t" id="bt3"><a href="#hsjj" title="专业团队"><b onMouseMove="MM_showHideLayers('bt1','','inherit','bt2','','inherit','bt3','','show','wb1','','show','wb2','','hide','wb3','','hide')">专业团队</b></a></div>
<div id="wb1">
  <p><font color="#FFFFFF" size="+2">&nbsp;<br />
&nbsp;    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;教练全部获得亚洲运动及体适能专业学院（AASFP)专业体适能教练资格认证。丰富的指教经验和全面的学识，让你在最短的时间到&nbsp;达预期效果。<br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拥有独立的体能评估测试室，每三个月教练为您免费做体能评估及训练计划的制定。拥有独立的VIP私教专区。<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;有一对一的健身顾问为您服务，帮助解答您所有健身的难题，让您感受&nbsp;五星级的服务标准。</font></p>
</div>
<div id="wb2"><font size="+3" color="0066ff"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成为我们的会员您将享受到</b></font><br />
<font size="+1" color="ffffff">&nbsp;&nbsp;<br />
<br />
&nbsp; 1.拥有绿色生态瑜伽馆和恒温游泳馆<br />
&nbsp;&nbsp;2.200万RMB意大利全球顶级专业健身设备<br />
&nbsp;&nbsp;3.每月150节以上国际流行团体操课程<br />
&nbsp;&nbsp;4.拥有 AASFP（全球42个国家同步论证的专业体适能教练健身教练团队专业辅导<br />
&nbsp;&nbsp;5.高级私人教练为您量身定做的健身计划<br />
&nbsp;&nbsp;6.享受免费的桑拿、沐浴服务<br />
&nbsp;&nbsp;7.享受VIP服务的商务休闲吧、网上冲浪、乒乓球、美式台球。<br />
&nbsp;&nbsp;8.享受动感时尚、炫舞动感单车房。<br />
&nbsp;&nbsp;9.丰富多彩的会员交友活动</font></div>
<div id="wb3"><font size="+1" color="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天悦荟健身投资管理有限公司成立于2010年，现已拥有数家具有一定规模与影响力的全国连锁健身俱乐部。其中广州会所有：广州海珠昌岗健身会所、海珠宝业路健身会所、越秀健身会所、珠江新城希尔顿酒店健身游泳会所。长沙天悦荟健身：金源酒店健身游泳会所。另外有广州珠江新城南天店健身会所正在筹建中。长沙望城健身游泳会所、株洲健身游泳会所正在筹建中。<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天悦荟游泳健身会所是天悦荟健身管理公司斥资千万打造的集健身、游泳、休闲娱乐及商务交友于一体的高端时尚会所，总面积已逾2000平方米，位于长沙市芙蓉中路金源大酒店天麒楼6楼。会所采用全球顶尖器械、欧美时尚设计风格，负氧离子空调系统净化空气质量，开放式的空间组合适宜各类健身，五星级酒店管理模式让会员身、心、灵在这里得到彻底放松，成为长沙市民除家、公司之外的第三休闲空间！天天健身，悦享生活，群英荟集，天悦荟健身总有一项运动你值得拥有！ </font><br />
</div></div></div></div>
<div class="qb5">
<div class="btGS"><span class="bt5"><font color="#00ccff"></span>
  <p class="bt5"><b><font color="#FFCC00"><a name="hjss" id="hjss"></a>E</font><font color="#FFFFFF">NVIRONMENTAL  FACILITY</font></b></p>
</div>
<div class="bt5"><font size="+3" color="#ffffff"><b><a name="jx1" id="jx1"></a>环境设施</b></font></div>
<div class="hjss1">
<div class="wb"><font color="ffcc00">器</font><font color="ffffff">械区：</font></div>
<div class="hjss1">
<div class="dqy1"><div class="qy1"><a href="#jx1" onmouseover="MM_swapImage('qx1','','image/jsf4.png',1)" onmouseout="MM_swapImgRestore()"><img src="image/jsf1.png" width="387" height="290" id="qx1" /></a></div>
<div class="qy2"><a href="#jx1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('qx2','','image/jsf3.png',1)"><img src="image/jsf.png" width="387" height="290" id="qx2" /></a></div>
<div class="wb2"><font color="ffcc00">游</font><font color="ffffff">泳区：</font></div>
<div class="dqy2">
<div class="qy3"><a href="#jx1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('yy1','','image/yyg4.png',1)"><img src="image/yyg3.png" width="386" height="290" id="yy1" /></a></div>
<div class="qy4"><a href="#jx1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('yy2','','image/hyzxx2.png',1)"><img src="image/yyzx.png" width="386" height="290" id="yy2" /></a></div>
<div class="wb3"><font color="ffcc00">动</font><font color="ffffff">感区：</font></div>
<div class="dqy3"><div class="qy5"><a href="#jx1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('dg1','','image/dgdc3.png',1)"><img src="image/dgdc2.png" name="dg1" width="368" height="290" id="dg1" /></a></div>
<div class="qy6"><a href="#jx1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('dg2','','image/dgdc5.png',1)"><img src="image/dgdc4.png" width="387" height="290" id="dg2" /></a></div></div></div>
</div></div>
</div>
<div class="qb6">
<div class="bt6"><b><font color="0066FF">C</font><font color="ffffff">OACH  TEAM</b></font></div>
<div class="bt7"><font color="ffffff" size="+3"><b>教练团队</b></div>
<div class="jjtb">
<div class="jd1"><a name="jd" id="jd"></a><a href="#jd" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('jd1','','image/jl8.png',1)"><img src="image/jl1.jpg" width="900" height="489" id="jd1" /></a></div>
<div class="jd2"><a href="#jd" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('jd2','','image/jl6.png',1)"><img src="image/jl3.jpg" width="900" height="491" id="jd2" /></a></div>
<div class="jd3"><a href="#jd" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('jd3','','image/jl5.png',1)"><img src="image/jl4.jpg" width="900" height="537" id="jd3" /></a></div>
<div class="jd4"><a href="#jd" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('jd4','','image/jl7.png',1)"><img src="image/jl2.jpg" width="900" height="470" id="jd4" /></a></div></div>
</div>
<div class="qb7">
<div class="bt8"><b><font color="#FFCC00">T</font><font color="#FFFFFF">ALENT  RECRUITMENT</font></b></div>
<div class="bt9"><font color="#FFFFFF" size="+3"><b>人才招聘</b></font></div>
<diV class="WE">
<div class="WX"><a name="zp1" id="zp1"></a><img src="image/wx.jpg" /></div>
<div class="DZ">
<br/><br/><br/>微信号：15116411678<br/><br/>
联系电话：17388939167<br/><br/>
地址：芙蓉中路金源大酒店天麟楼6层（贺龙体育馆旁）</div></diV>
</div>
<div class="qb8">
<div class="bt10"><font color="#0066FF"><b>A</font><font color="#ffffff">BOUT  US</b></font></div>
<div class="bt11"><font size="+3" color="#ffffff">关于我们</font></div>
<div class="blwzbt"><font size="+3" color="#ffffff"><a name="dl1" id="dl1"></a>地理位置：</font></div>
<div class="blwz"><iframe width="604" height="720" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://j.map.baidu.com/kz8FI"></iframe></div>
</div>
<div class="js">
  <div class="1k">
  <div class="DH">
    <p><font color="#ffffff" size="+1"><b>&nbsp;&nbsp;&nbsp;&nbsp;联系我们<br/><br/>
      &nbsp;&nbsp;&nbsp;&nbsp;电话：0731-89825161<br />
      &nbsp;&nbsp;&nbsp;&nbsp;微信：15116411678<br/>
      &nbsp;&nbsp;&nbsp;&nbsp;地址：芙蓉中路金源大酒店天麟楼6层（贺龙体育馆旁）</b></font></p>
  </div>
</div>
<div class="2k">
  <p><font size="+2" color="#ffffff"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;版权所有 Copyright （C）2017-2017&nbsp;&nbsp;&nbsp; 天悦荟健身</b></font></p>
</div></div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
</script>

</body>
</html>
