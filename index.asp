<%@LANGUAGE="VBSCRIPT"%>
<!--#include file="Connections/hyzx.asp" -->
<%
Dim MM_editAction
MM_editAction = CStr(Request.ServerVariables("SCRIPT_NAME"))
If (Request.QueryString <> "") Then
  MM_editAction = MM_editAction & "?" & Server.HTMLEncode(Request.QueryString)
End If

' boolean to abort record edit
Dim MM_abortEdit
MM_abortEdit = false
%>
<%
' IIf implementation
Function MM_IIf(condition, ifTrue, ifFalse)
  If condition = "" Then
    MM_IIf = ifFalse
  Else
    MM_IIf = ifTrue
  End If
End Function
%>
<%
If (CStr(Request("MM_insert")) = "form1") Then
  If (Not MM_abortEdit) Then
    ' execute the insert
    Dim MM_editCmd

    Set MM_editCmd = Server.CreateObject ("ADODB.Command")
    MM_editCmd.ActiveConnection = MM_hyzx_STRING
    MM_editCmd.CommandText = "INSERT INTO [1] (xingming) VALUES (?)" 
    MM_editCmd.Prepared = true
    MM_editCmd.Parameters.Append MM_editCmd.CreateParameter("param1", 201, 1, -1, Request.Form("xingming")) ' adLongVarChar
    MM_editCmd.Execute
    MM_editCmd.ActiveConnection.Close
  End If
End If
%>
<%
If (CStr(Request("MM_insert")) = "form1") Then
  If (Not MM_abortEdit) Then
    ' execute the insert
    Dim MM_editCmd

    Set MM_editCmd = Server.CreateObject ("ADODB.Command")
    MM_editCmd.ActiveConnection = MM_hyzx_STRING
    MM_editCmd.CommandText = "INSERT INTO [1] (dianhua) VALUES (?)" 
    MM_editCmd.Prepared = true
    MM_editCmd.Parameters.Append MM_editCmd.CreateParameter("param1", 5, 1, -1, MM_IIF(Request.Form("dianhua"), Request.Form("dianhua"), null)) ' adDouble
    MM_editCmd.Execute
    MM_editCmd.ActiveConnection.Close
  End If
End If
%>
<%
If (CStr(Request("MM_insert")) = "form1") Then
  If (Not MM_abortEdit) Then
    ' execute the insert
    Dim MM_editCmd

    Set MM_editCmd = Server.CreateObject ("ADODB.Command")
    MM_editCmd.ActiveConnection = MM_hyzx_STRING
    MM_editCmd.CommandText = "INSERT INTO [1] (liuyan) VALUES (?)" 
    MM_editCmd.Prepared = true
    MM_editCmd.Parameters.Append MM_editCmd.CreateParameter("param1", 201, 1, -1, Request.Form("dianhua")) ' adLongVarChar
    MM_editCmd.Execute
    MM_editCmd.ActiveConnection.Close
  End If
End If
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>天悦荟健身</title>
<link href="index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 60px;
	margin-right: 60px;
}
</style>
</head>

<body>
<div class="qb">
<div class="sb2">
    <ul>
      <li><a href="#sy" target="_top"><b>网站首页</b></a></li>
      <li><a href="#hyzx" target="_top"><b>会员中心</b></a></li>
      <li><a href="#" target="_blank"><b>会所简介</b></a></li>
      <li><a href="#" target="_blank"><b>环境设施</b></a></li>
      <li><a href="#" target="_blank"><b>教练团队</b></a></li>
      <li><a href="#" target="_blank"><b>人才招聘</b></a></li>
      <li><a href="#" target="_blank"><b>关于我们</b></a></li>
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
<div class="qb2" id="">
<div class="lunbou"><img src="" alt="" name="lunbou" width="1000" height="202" id="lunbou" /></div>
<div class="toutiao"> <img src="" alt="" name="toutiao" width="1000" height="200" id="toutiao" /><a name="hyzx" id="hyzx"></a></div></div>
<div class="qb3">
<div class="huzxbt" align="center"> <font size="+6" color="#00ccff"><B><p><font color="#FFCC00">M</font><font color="#FFFFFF">EMBER CENTER</font></p></B>
<font size="+3" color="#ffffff"><B>会员中心</B></font>
</font></div>
<div class="hyzx">
<table width="800px" border="0">
<tr><td height="430px">
<table width="800px" border="0">
  <tr>
  <td height="80" valign="middle">
  <form ACTION="<%=MM_editAction%>" METHOD="POST" id="form1" name="form1">
<span class="xmbt"><font size="6" color="#FFCC00"><b>姓</b></font><font color="#FFFFFF" size="6"><b>名：</b></font></span></span>
  <input name="xingming" type="text" class="xinmin" id="xingming" style="background:url(image/hyzx.png); width:330px; height:33px; font-size:30px;" value="姓名" />
  <input type="hidden" name="MM_insert" value="form1" />
  </form></td></tr></table>
<table width="800px" border="0">
  <tr>
  <td height="80px" class="xmbt2"><form ACTION="<%=MM_editAction%>" METHOD="POST" id="form1" name="form1">
  <span class="xmbt"><font size="6" color="#FFCC00"><b>电</b></font><font color="#FFFFFF" size="6"><b>话：</b></font></span>
  <input name="dianhua" type="text" class="xinmin" id="dianhua" style="background:url(image/hyzx.png); width:330px; height:33px; font-size:30px;" value="电话" />
  <input type="hidden" name="MM_insert" value="form1" />
  </form></td></tr></table>
<table width="800px" border="0"><tr>
  <td height="190px">
  <form ACTION="<%=MM_editAction%>" METHOD="POST" id="form1" name="form1">
  <span class="xmbt"><font size="6" color="#FFCC00"><b>电</b></font><font color="#FFFFFF" size="6"><b>话：</b></font></span>
  <input name="dianhua" type="text" class="xinmin" id="dianhua" style="background:url(image/hyzx2.png); width:330px; height:170px; font-size:30px;" value="电话" />
  <input type="hidden" name="MM_insert" value="form1" />
  </form></td></tr></table>
<table width="800px" border="0"><tr>
  <td height="80px"><form id="form1" name="form1" method="post" action="">
    <input class="anniu2" type="submit" name="btn2" id="btn2" value="提交" style="width:75px; height:35px;" / >
  </form></td></tr></table>
</td>
</tr>
</table>
</div></div>
<div class="qb4"></div>
</body>
</html>
