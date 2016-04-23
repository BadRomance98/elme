<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
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

<div class="form-div">
  <form action="javascript:search_goodsName()">
  		关键字 <input type="text" name="keyword" size="15" id="goodsName">
		<input type="submit" value=" 搜索 " class="button">	
  </form>
</div>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
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
				<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" name="checkboxes[]" value="32"><?php echo ($vo["goods_id"]); ?></td>
						<td class="first-cell"><span><?php echo ($vo["goods_name"]); ?></span></td>
						<td><span><?php echo ($vo["goods_sn"]); ?></span></td>
						<td align="right"><span><?php echo ($vo["market_price"]); ?></span></td>
						<td align="center"><?php echo ($vo["is_best"]); ?></td>
						<td align="center"><?php echo ($vo["is_new"]); ?></td>
						<td align="center"><?php echo ($vo["is_hot"]); ?></td>
						<td align="center"><?php echo ($vo["is_onsale"]); ?></td>
						<td align="center"><span onclick=""><?php echo ($vo["click_count"]); ?></span></td>
						<td align="right"><span onclick=""><?php echo ($vo["goods_number"]); ?></span></td>
						<td align="center">
							<a href="/ww/shop/index.php/Admin/Goods/edit/id/<?php echo ($vo["goods_id"]); ?>" title="编辑"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_edit.gif" width="16" height="16" border="0"></a>
							<a href="/ww/shop/index.php/Admin/Goods/delete/id/<?php echo ($vo["goods_id"]); ?>" onclick="listTable.remove(32, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_trash.gif" width="16" height="16" border="0"></a>          
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
function search_goodsName() {
    var goodsName = document.getElementById('goodsName').value;
    window.location.href = "/ww/shop/index.php/Admin/Goods/index/id/"+goodsName;
}
</script>
</body>
</html>