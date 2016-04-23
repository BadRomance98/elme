<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>ShopCZ-首页</title>
	<link rel="stylesheet" href="/ww/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/ww/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/ww/shop/Public/css/shop_header.css" type="text/css" />
        <link rel="stylesheet" href="/ww/shop/Public/css/shop_home.css" type="text/css" />
        <script type="text/javascript" src="/ww/shop/Public/js/jquery.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/topNav.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/focus.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/shop_home_tab.js" ></script>
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
	<!-- Header End -->
	

	<!-- Body -wll-2013/03/24 -->
	<div class="shop_bd clearfix">
            <!-- 第一块区域  -->
            <div class="shop_bd_top clearfix">
                <div class="shop_bd_top_left"></div>
                <div class="shop_bd_top_center">
                    <!-- 图片切换  begin  -->
                    <div class="xifan_sub_box">
                      <div id="p-select" class="sub_nav"><div class="sub_no" id="xifan_bd1lfsj"> <ul></ul></div></div>
                      <div id="xifan_bd1lfimg">
                        <div>
                            <dl></dl>
                            <?php if(is_array($bestGoods)): $i = 0; $__LIST__ = $bestGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
                                        <dt><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>">
                                        <img src="/ww/shop<?php echo ($vo["goods_img"]); ?>" width="160" height="120" /></a></dt>
                                        <dd><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></dd>
                                    </dl><?php endforeach; endif; else: echo "" ;endif; ?> 
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">movec();</script> 
                </div>
                
                <!-- 右侧 -->
                <div class="shop_bd_top_right clearfix">
                    <div class="shop_bd_top_right_quickLink">
                        <a href="" class="login" title="会员登录"><i></i>会员登录</a>
                        <a href="" class="register" title="免费注册"><i></i>免费注册</a>
                        <a href="" class="join" title="商家开店" ><i></i>帮助中心</a>
                    </div>
                    
                    <div class="shop_bd_top_right-style1 nc-home-news">
                        <ul class="tabs-nav">
                            <li><a href="javascript:void(0);" class="hover">商城广告</a></li>
                            <li><a href="javascript:void(0);">关于我们</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <!-- 右侧 End -->
            </div>
            <div class="clear"></div>
            <!-- 第一块区域 End -->
            
            <!-- 第二块区域 -->
            <div class="shop_bd_2 clearfix">
                <!-- 特别推荐 -->
                <div class="shop_bd_tuijian">
                    <ul class="tuijian_tabs">
                        <li class="hover"  onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');" onclick="return false;" id="tuijian_content_btn_1"><a href="javascript:void(0);">特别推荐</a></li>
                        <li onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');" onclick="return false;" id="tuijian_content_btn_2" ><a href="javascript:void(0);">热门商品</a></li>
                        <li onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');" onclick="return false;" id="tuijian_content_btn_3"><a href="javascript:void(0);">新品上架</a></li>
                    </ul>
                    <div class="tuijian_content">
                        <div id="tuijian_content_1" class="tuijian_shangpin" style="display: block;">
                            <ul>
                            	<?php if(is_array($bestGoods)): $i = 0; $__LIST__ = $bestGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                        <dl>
                                            <dt><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>">
                                            <img src="/ww/shop<?php echo ($vo["goods_img"]); ?>" width="160" height="120" /></a></dt>
                                            <dd><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></dd>
                                            <dd> 商城价：<em><?php echo ($vo["shop_price"]); ?></em>元</dd>
                                        </dl>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div id="tuijian_content_2" class="tuijian_shangpin">
                            <ul>
                                <?php if(is_array($hotGoods)): $i = 0; $__LIST__ = $hotGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li>
                                        <dl>
                                        <dt><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo1["goods_id"]); ?>">
                                        <img src="<?php echo ($vo1["goods_img"]); ?>" width="160" height="120" /></a></dt>
                                        <dd><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo1["goods_id"]); ?>"><?php echo ($vo1["goods_name"]); ?></a></dd>
                                        <dd> 商城价：<em><?php echo ($vo1["shop_price"]); ?></em>元</dd>
                                        </dl>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>  
                            </ul>
                        </div>
                        <div id="tuijian_content_3" class="tuijian_shangpin tuijian_content">
                            <ul>
                                <?php if(is_array($newGoods)): $i = 0; $__LIST__ = $newGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><li>
                                        <dl>
                                        <dt><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo2["goods_id"]); ?>">
                                        <img src="<?php echo ($vo2["goods_img"]); ?>" width="160" height="120" /></a></dt>
                                        <dd><a href="/ww/shop/index.php/Home/Goods/index/id/<?php echo ($vo2["goods_id"]); ?>"><?php echo ($vo2["goods_name"]); ?></a></dd>
                                        <dd> 商城价：<em><?php echo ($vo2["shop_price"]); ?></em>元</dd>
                                        </dl>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                            </ul>
                        </div>    
                    </div>
                </div>  
            </div>
            <div class="clear"></div>
	</div>
	<!-- Body End -->

	<!-- Footer - wll - 2013/3/24 -->
	<div class="clear"></div>
	<div class="shop_footer">
            <div class="shop_footer_copy">
                <p>版权所有 &copy; 2015-2016  王波毕业设计</p>
            </div>
        </div>
	<!-- Footer End -->
</body>
</html>