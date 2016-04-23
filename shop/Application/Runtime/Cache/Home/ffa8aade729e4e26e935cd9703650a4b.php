<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>订单</title>
    <link rel="stylesheet" href="/ww/shop/Public/css/base.css" type="text/css" />
    <link rel="stylesheet" href="/ww/shop/Public/css/shop_common.css" type="text/css" />
    <link rel="stylesheet" href="/ww/shop/Public/css/shop_header.css" type="text/css" />
        <link rel="stylesheet" href="/ww/shop/Public/css/shop_home.css" type="text/css" />
        <script type="text/javascript" src="/ww/shop/Public/js/jquery.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/topNav.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/focus.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/shop_home_tab.js" ></script>
    <style type="text/css">
    header{
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        padding: 10px;
    }
    header strong{
        color: #FE8502;
    }
    section{
        width: 980px;
        margin: 0 auto;
        border: solid #FE8502 2px;
        padding: 20px;
    }
    .vs-ib p{
        font-size: 14px;
        font-weight: bold;
    }
    section p span{
        color: #FE8502;
    }
    section .vs-ib{
        display: inline-block;
        vertical-align: top;
    }
    section .lf{
        float: left;
        width: 50%;
        padding: 10px;
        box-sizing: border-box;
    }
    section a{
        display: block;
        padding: 20px;
        border: solid 2px #000;
        text-align: center;
        font-weight: bold;
        font-size: 16px;
        background: #FE8502;
        text-decoration: none;
    }
    </style>
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



	
    <section>
        <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="lf">
                <div class="vs-ib">
                    <p>订单编号：<span><?php echo ($vo["order_id"]); ?></span></p>
                    <p>订单人姓名：<span><?php echo ($vo["user_name"]); ?></span></p>
                    <p>商品总额：<span><?php echo ($vo["order_amount"]); ?></p>
                    <p>下单时间：<span><?php echo ($vo["order_time"]); ?></p>
                </div>          
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div style="clear:both;"></div>
    </section>
</body>
</html>