<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>用户添加</title>
    <link href="<?php echo (ADMIN_PUBLIC); ?>/tyles/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo (ADMIN_PUBLIC); ?>/styles/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/ww/shop/Public/js/jquery-1.11.2.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新用户 </span>
    <div style="clear:both"></div>
</h1>
<form method="post" action="/ww/shop/index.php/Admin/User/add" name="listForm" onsubmit="return confirmSubmit(this)">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tbody>
                <tr>
                    <th><input type="checkbox">用户编号</th>
                    <th>用户名</th>
                    <th>密码</th>
                    <th>操作</th>
                </tr>
                <tr>
                    <td><input type="text" name="user_id" value="<?php echo ($user["user_id"]); ?>"></td>
                    <td align="center"><input type="text" name="user_name" value="<?php echo ($user["user_name"]); ?>"></td>
                    <td align="right"><input type="text" name="password" value="<?php echo ($user["password"]); ?>"></td>
                    <td align="center">
                        <input type="submit" value="添加">        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
<div id="footer">
版权所有 &copy; 2015-2016  王波毕业设计 
</div>
<script type="text/javascript">
function search_orderName() {
    var orderName = document.getElementById('orderName').value;
    window.location.href = "/ww/shop/index.php/Admin/User/index/id/"+orderName;
}
</script>
</body>
</html>