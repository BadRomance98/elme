<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>商品列表页</title>
	<link rel="stylesheet" href="/ww/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/ww/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/ww/shop/Public/css/shop_header.css" type="text/css" />
    <link rel="stylesheet" href="/ww/shop/Public/css/shop_list.css" type="text/css" />
    <script type="text/javascript" src="/ww/shop/Public/js/jquery.js" ></script>
    <script type="text/javascript" src="/ww/shop/Public/js/topNav.js" ></script>
    <script type="text/javascript" src="/ww/shop/Public/js/shop_list.js" ></script>
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
	<!-- 面包屑 注意首页没有 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<?php if(is_array($parentCats)): $i = 0; $__LIST__ = $parentCats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/ww/shop/index.php/Home/Category/index/id/<?php echo ($vo["cat_id"]); ?>">
					<?php echo ($vo["cat_name"]); ?></a> <?php if($i != count($parentCats)): ?>&nbsp;›&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</span>
	</div>
	<div class="clear"></div>
	<!-- 面包屑 End -->
	<div class="shop_bd clearfix">
		<div class="shop_bd_list_left clearfix">
			<!-- 热卖推荐商品 -->
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
			<div class="clear"></div>
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

		<div class="shop_bd_list_right clearfix">
			<div class="sort-bar">
				<div class="bar-l"> 
		            <ul class="array">
		              <li class="selected"><a title="默认排序" class="nobg" href="javascript:void(0)">默认</a></li>
		              <li><a title="点击按销量从高到低排序" href="/ww/shop/index.php/Home/category/index/asc/1">销量从高到低</a></li>
		              <li><a title="点击按销量从低到高排序" href="/ww/shop/index.php/Home/category/index/asc/2">销量从低到高</a></li>
		              <li><a title="点击按价格从高到低排序" href="/ww/shop/index.php/Home/category/index/asc/3">价格从高到低</a></li>
		              <li><a title="点击按价格从高到低排序" href="/ww/shop/index.php/Home/category/index/asc/4">价格从低到高</a></li>
		            </ul>
<!-- 		            <div class="prices"> <em>¥</em>
		              <input type="text" value="" class="w30">
		              <em>-</em>
		              <input type="text" value="" class="w30">
		              <input type="submit" value="确认" id="search_by_price">
		            </div>
 -->
		          </div>
			</div>
			<div class="clear"></div>
			<div class="shop_bd_list_content clearfix">
				<ul>
					<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<dl>
								<dt><a href="/ww/shop/index.php/Home/goods/index/id/<?php echo ($vo["goods_id"]); ?>/cate_id/<?php echo ($vo["cat_id"]); ?>"><img src="/ww/shop<?php echo ($vo["goods_img"]); ?>" /></a></dt>
								<dd class="title"><a href=""><?php echo ($vo["goods_name"]); ?></a></dd>
								<dd class="content">
									<span class="goods_jiage">￥<strong><?php echo ($vo["shop_price"]); ?></strong></span>
									<span class="goods_chengjiao">最近成交<?php echo ($vo["click_count"]); ?>笔</span>
								</dd>
							</dl>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="clear"></div>
            <div id="turn-page" style="float: right;">
            	<?php echo ($page); ?>
			</div>
		</div>
	</div>

	<div class="clear"></div>
	<div class="shop_footer">
        <div class="shop_footer_copy">
            <p>版权所有 &copy; 2015-2016  王波毕业设计</p>
        </div>
    </div>
</body>
</html>