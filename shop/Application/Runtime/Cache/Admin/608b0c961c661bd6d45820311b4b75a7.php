<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <style type="text/css">
    td input{
        width: 80px;
    }
    </style>
    <link href="<?php echo (ADMIN_PUBLIC); ?>/tyles/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo (ADMIN_PUBLIC); ?>/styles/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/ww/shop/Public/js/jquery-1.11.2.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="/ww/shop/index.php/Admin/Goods/add">添加新商品</a></span>
    <span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
    <div style="clear:both"></div>
</h1>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tbody>
                <tr>
                    <th><input type="checkbox">编号</th>
                    <th>商品名称</th>
                    <th>货号</th>
                    <th>价格</th>
                    <th>上架</th>
                    <th>精品</th>
                    <th>新品</th>
                    <th>热销</th>
                    <th>推荐排序</th>
                    <th>库存</th>
                    <th>操作</th>
                </tr>
                <tr>
                    <td><input type="text" name="goods_id" value="<?php echo ($goods["goods_id"]); ?>"></td>
                    <td align="center"><input type="text" name="goods_name" value="<?php echo ($goods["goods_name"]); ?>"></td>
                    <td align="right"><input type="text" name="goods_sn" value="<?php echo ($goods["goods_sn"]); ?>"></td>
                    <td align="right"><input type="text" name="market_price" value="<?php echo ($goods["market_price"]); ?>"></td>
                    <td align="center"><input type="text" name="is_best" value="<?php echo ($goods["is_best"]); ?>"></td>
                    <td align="center"><input type="text" name="is_new" value="<?php echo ($goods["is_new"]); ?>"></td>
                    <td align="center"><input type="text" name="is_hot" value="<?php echo ($goods["is_hot"]); ?>"></td>
                    <td align="center"><input type="text" name="is_onsale" value="<?php echo ($goods["is_onsale"]); ?>"></td>
                    <td align="center"><input type="text" name="click_count" value="<?php echo ($goods["click_count"]); ?>"></td>
                    <td align="center"><input type="text" name="goods_number" value="<?php echo ($goods["goods_number"]); ?>"></td>
                    <td align="center">
                        <input type="submit" value="确认修改">        
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
function search_goodsName() {
    var goodsName = document.getElementById('goodsName').value;
    window.location.href = "/ww/shop/index.php/Admin/Goods/index/id/"+goodsName;
}
</script>
</body>
</html>