<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>商品详细页面</title>
	<link rel="stylesheet" href="/ww/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/ww/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/ww/shop/Public/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/ww/shop/Public/css/shop_list.css" type="text/css" />
    <link rel="stylesheet" href="/ww/shop/Public/css/shop_goods.css" type="text/css" />
    <script type="text/javascript" src="/ww/shop/Public/js/jquery.js" ></script>
    <script type="text/javascript" src="/ww/shop/Public/js/topNav.js" ></script>
    <script type="text/javascript" src="/ww/shop/Public/js/shop_goods.js" ></script>
</head>
<body>
		<div class="shop_hd">
		<div class="shop_hd_topNav">
			<div class="shop_hd_topNav_all">
				<div class="shop_hd_topNav_all_left">
					<p><span class="user_name"><?php echo ($user["user_name"]); ?></span>
					<a href="/ww/shop/index.php/Home/user/login" class="<?php if(($hide) == "true"): ?>isHidden<?php endif; ?>" <?php if(($block) != "true"): ?>id="block"<?php endif; ?>>[登录]</a>
					<a href="/ww/shop/index.php/Home/user/reg" class="<?php if(($hide) == "true"): ?>isHidden<?php endif; ?>" <?php if(($block) != "true"): ?>id="block"<?php endif; ?>>[注册]</a></p>
				</div>

				<div class="shop_hd_topNav_all_right">
					<ul class="topNav_quick_menu">
						<li>
							<div>
								<a href="/ww/shop/index.php/Home/cart/index/user_id/<?php echo ($user["user_id"]); ?>">我的购物车</a>
							</div>
						</li>

						<li>
							<div>
								<a href="/ww/shop/index.php/Home/Order/index/user_id/<?php echo ($user["user_id"]); ?>">我的订单</a>
							</div>
						</li>

						<li>
							<div>
								<a href="/ww/shop/index.php/Home/Address/index/user_id/<?php echo ($user["user_id"]); ?>">我的地址</a>
							</div>
						</li>						
						<li>
							<div>
								<a title="退出" target="_top" href="/ww/shop/index.php/Home/user/logout">退出</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>

		<div class="shop_hd_header">
			<div class="shop_hd_header_logo"><h1 class="logo"><a href="/"><img src="/ww/shop/Public/images/logo.png" alt="ShopCZ" /></a><span>ShopCZ</span></h1></div>
		</div>
		<div class="clear"></div>

		<div class="shop_hd_menu">
			<div class="shop_hd_menu_all_category <?php if(($index) == "true"): ?>shop_hd_menu_hover<?php endif; ?>" <?php if(($index) != "true"): ?>id="shop_hd_menu_all_category"<?php endif; ?> ><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
				<div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:void(0);">所有商品分类</a></h2><i></i></div>
				<div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
					<ul class="shop_hd_menu_all_category_hd_menu clearfix">
						<?php if(is_array($cats)): $k = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k < 9): ?><li id="cat_1" class="">
								<h3><a href="/ww/shop/index.php/Home/Category/index/id/<?php echo ($vo["cat_id"]); ?>"><?php echo ($vo["cat_name"]); ?></a></h3>
								<div id="cat_1_menu" class="cat_menu clearfix" style="">
									<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><dl class="clearfix">
										<dt><a href="/ww/shop/index.php/Home/Category/index/id/<?php echo ($vo1["cat_id"]); ?>"><?php echo ($vo1["cat_name"]); ?></a></dt>
										<dd>
											<?php if(is_array($vo1["child"])): $i = 0; $__LIST__ = $vo1["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="/ww/shop/index.php/Home/Category/index/id/<?php echo ($vo2["cat_id"]); ?>"><?php echo ($vo2["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
										</dd>
									</dl><?php endforeach; endif; else: echo "" ;endif; ?>                                                     
								</div>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<ul class="shop_hd_menu_nav">
				<li class="current_link"><a href="/ww/shop/index.php/Home/Index"><span>首页</span></a></li>
			</ul>
		</div>



	
	</div>
	<div class="clear"></div>
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<?php if(is_array($parentCats)): $i = 0; $__LIST__ = $parentCats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/ww/shop/index.php/Home/Category/index/id/<?php echo ($vo["cat_id"]); ?>">
					<?php echo ($vo["cat_name"]); ?></a> <?php if($i != count($parentCats)): ?>&nbsp;›&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</span>
	</div>
	<div class="clear"></div>
	<div class="shop_goods_bd clear">

		<!-- 商品展示 -->
		<div class="shop_goods_show">
			<div class="shop_goods_show_left">
				<!-- 京东商品展示 -->
				<link rel="stylesheet" href="/ww/shop/Public/css/shop_goodPic.css" type="text/css" />
				<script type="text/javascript" src="/ww/shop/Public/js/shop_goodPic_base.js"></script>
				<script type="text/javascript" src="/ww/shop/Public/js/lib.js"></script>
				<script type="text/javascript" src="/ww/shop/Public/js/163css.js"></script>
				<div id="preview">
					<div class=jqzoom id="spec-n1" onClick="window.open('/')"><img class="goods_img" height="350" src="/ww/shop<?php echo ($goods["goods_img"]); ?>" jqimg="/ww/shop<?php echo ($goods["goods_img"]); ?>" width="350">
						</div>
						<div id="spec-n5">
							<div class=control id="spec-left">
								<img src="/ww/shop/Public/images/left.gif" />
							</div>
							<div id="spec-list">
								<ul class="list-h">
									<li><img src="/ww/shop<?php echo ($goods["goods_img"]); ?>"> </li>
								</ul>
							</div>
							<div class=control id="spec-right">
								<img src="/ww/shop/Public/images/right.gif" />
							</div>
							
					    </div>
					</div>

					<SCRIPT type=text/javascript>
						$(function(){			
						   $(".jqzoom").jqueryzoom({
								xzoom:400,
								yzoom:400,
								offset:10,
								position:"right",
								preload:1,
								lens:1
							});
							$("#spec-list").jdMarquee({
								deriction:"left",
								width:350,
								height:56,
								step:2,
								speed:4,
								delay:10,
								control:true,
								_front:"#spec-right",
								_back:"#spec-left"
							});
							$("#spec-list img").bind("mouseover",function(){
								var src=$(this).attr("src");
								$("#spec-n1 img").eq(0).attr({
									src:src.replace("\/n5\/","\/n1\/"),
									jqimg:src.replace("\/n5\/","\/n0\/")
								});
								$(this).css({
									"border":"2px solid #ff6600",
									"padding":"1px"
								});
							}).bind("mouseout",function(){
								$(this).css({
									"border":"1px solid #ccc",
									"padding":"2px"
								});
							});				
						})
						</SCRIPT>
					<!-- 京东商品展示 End -->

			</div>
			<div class="shop_goods_show_right">
				<input type="hidden" value="<?php echo ($goods["goods_id"]); ?>" class="goods_id">	
				<ul>
					<li>
						<strong style="font-size:14px; font-weight:bold;" class="goods_name"><?php echo ($goods["goods_name"]); ?></strong>
					</li>
					<li>
						<label>价格：</label>
						<span><strong class="shop_price"><?php echo ($goods["shop_price"]); ?></strong>元</span>
					</li>
					<li>
						<label>运费：</label>
						<span>卖家承担运费</span>
					</li>
					<li>
						<label>累计售出：</label>
						<span><?php echo ($goods["click_count"]); ?>件</span>
					</li>
					<li class="goods_num">
						<label>购买数量：</label>
						<span><a class="good_num_jian" id="good_num_jian" href="javascript:void(0);"></a><input type="text" value="1" id="good_nums" class="good_nums sell_number" /><a href="javascript:void(0);" id="good_num_jia" class="good_num_jia"></a>(当前库存<?php echo ($goods["goods_number"]); ?>件)</span>
					</li>
					<li style="padding:20px 0;">
						<label>&nbsp;</label>
						<span><a href="/ww/shop/index.php/Home/cart/index" class="goods_sub goods_sub_gou" onclick="addShopCar()">加入购物车</a></span>
					</li>
				</ul>		
			</div>
		</div>
		<!-- 商品展示 End -->

		<div class="clear mt15"></div>
		<!-- Goods Left -->
		<div class="shop_bd_list_left clearfix">
		<div class="shop_bd_list_bk clearfix">
				<div class="title">热卖推荐商品</div>
				<div class="contents clearfix">
					<ul class="clearfix">						
						<?php if(is_array($hotGoods)): $i = 0; $__LIST__ = $hotGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix">
								<div class="goods_name"><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></div>
								<div class="goods_pic"><span class="goods_price"><?php echo ($vo["shop_price"]); ?> </span><a href=""><img src="/ww/shop<?php echo ($VO["goods_img"]); ?>" /></a></div>
								<div class="goods_xiaoliang">
									<span class="goods_xiaoliang_link"><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>">去看看</a></span>
									<span class="goods_xiaoliang_nums">已销售<strong><?php echo ($vo["click_count"]); ?></strong>笔</span>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<!-- 热卖推荐商品 -->
			<div class="clear"></div>

			<!-- 浏览过的商品 -->
			<div class="shop_bd_list_bk clearfix">
				<div class="title">浏览过的商品</div>
				<div class="contents clearfix">
					<ul class="clearfix">
					<?php if(is_array($hotGoods)): $i = 0; $__LIST__ = $hotGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix">
							<div class="goods_name"><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></div>
							<div class="goods_pic"><span class="goods_price"><?php echo ($vo["shop_price"]); ?> </span><a href=""><img src="/ww/shop<?php echo ($VO["goods_img"]); ?>" /></a></div>
							<div class="goods_xiaoliang">
								<span class="goods_xiaoliang_link"><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>">去看看</a></span>
								<span class="goods_xiaoliang_nums">已销售<strong><?php echo ($vo["click_count"]); ?></strong>笔</span>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- 商品详情 -->
		<script type="text/javascript" src="/ww/shop/Public/js/shop_goods_tab.js"></script>
		<div class="shop_goods_bd_xiangqing clearfix">
			<div class="shop_goods_bd_xiangqing_tab">
				<ul>
					<li><a href=""><span>商品详情</span></a></li>
				</ul>
			</div>
			<div class="shop_goods_bd_xiangqing_content clearfix">
				<div>
					<div>
						<?php if(is_array($attr)): $i = 0; $__LIST__ = $attr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><?php echo ($vo["attr_name"]); ?> : <?php echo ($vo["attr_value"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Footer - wll - 2013/3/24 -->
	<div class="clear"></div>
	<div class="shop_footer">
            <div class="shop_footer_copy">
                <p>版权所有 &copy; 2015-2016  王波毕业设计</p>
            </div>
        </div>
	<!-- Footer End -->
<script type="text/javascript">
var goods_id = $('.goods_id').val();
var goods_name = $('.goods_name').html();
var sell_number = 1;
var shop_price = $('.shop_price').html();
var goods_img = $('.goods_img').attr('src');
var user_name = $('.user_name').html();
function addShopCar(){
	if( user_name ) {
		$.ajax({
			type: "post",
			url: "/ww/shop/index.php/Home/goods/shopCar",
			async: true,//异步or同步
			data: {goods_id:goods_id,goods_name:goods_name,sell_number:sell_number,shop_price:shop_price,goods_img:goods_img},
			success: function(msg)
			{
			  alert(msg);
			}
		});
		$.ajax({
			type: "post",
			url: "/ww/shop/index.php/Home/goods/edit",
			async: true,//异步or同步
			data: {goods_id:goods_id,sell_number:sell_number},
			success: function(msg)
			{}
		});
	}else {
		alert('请先登录');
	}
}
</script>
</body>
</html>