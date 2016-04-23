<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>订单列表</title>
    <link href="<?php echo (ADMIN_PUBLIC); ?>/tyles/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo (ADMIN_PUBLIC); ?>/styles/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/ww/shop/Public/js/jquery-1.11.2.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="/ww/shop/index.php/Admin/Order/add">添加新订单</a></span>
    <span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 订单列表 </span>
    <div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="javascript:search_orderName()">
        关键字 <input type="text" name="keyword" size="15" id="orderName">
        <input type="submit" value=" 搜索 " class="button">   
  </form>
</div>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tbody>
                <tr>
                    <th><input type="checkbox">订单号</th>
                    <th>用户ID</th>
                    <th>订单人姓名</th>
                    <th>地址ID</th>
                    <th>订单总额</th>
                    <th>订单时间</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><input type="checkbox" name="checkboxes[]" value="32"><?php echo ($vo["order_id"]); ?></td>
                        <td class="first-cell"><span><?php echo ($vo["user_id"]); ?></span></td>
                        <td align="center"><?php echo ($vo["user_name"]); ?></td>
                        <td><span><?php echo ($vo["address_id"]); ?></span></td>
                        <td align="right"><span><?php echo ($vo["order_amount"]); ?></span></td>
                        <td align="center"><?php echo ($vo["order_time"]); ?></td>
                        <td align="center">
                            <a href="/ww/shop/index.php/Admin/Order/edit/id/<?php echo ($vo["order_id"]); ?>" title="编辑"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_edit.gif" width="16" height="16" border="0"></a>
                            <a href="/ww/shop/index.php/Admin/Order/delete/id/<?php echo ($vo["order_id"]); ?>" onclick="listTable.remove(32, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_trash.gif" width="16" height="16" border="0"></a>        
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
         <table>
            <tr style="text-align: right;">
                <td><?php echo ($page); ?></td>
            </tr>
         </table>
    </div>
</form>
<div id="footer">
版权所有 &copy; 2015-2016  王波毕业设计 
</div>
<script type="text/javascript">
function search_orderName() {
    var orderName = document.getElementById('orderName').value;
    window.location.href = "/ww/shop/index.php/Admin/Order/index/id/"+orderName;
}
</script>
</body>
</html>