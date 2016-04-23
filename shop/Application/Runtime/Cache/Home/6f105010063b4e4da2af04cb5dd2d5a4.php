<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>购物车</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="/ww/shop/Public/css/base.css" type="text/css" />
    <link rel="stylesheet" href="/ww/shop/Public/css/shop_common.css" type="text/css" />
    <link rel="stylesheet" href="/ww/shop/Public/css/shop_header.css" type="text/css" />
        <link rel="stylesheet" href="/ww/shop/Public/css/shop_home.css" type="text/css" />
        <script type="text/javascript" src="/ww/shop/Public/js/jquery.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/topNav.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/focus.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/shop_home_tab.js" ></script>
        <script type="text/javascript" src="/ww/shop/Public/js/angular.min.js" ></script>
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
    section img{
        width: 200px;
        height: 200px;
        margin-right: 20px;
    }
    section .vs-ib{
        display: inline-block;
        vertical-align: top;
    }
    section .lf{
        float: left;
        width: 50%;
    }
    section p a{
        text-align: center;
        display: inline-block;
        font-weight: bold;
        font-size: 14px;
        background: #FE8502;
        padding: 6px 10px;
        margin: 5px;
        color: #fff;
        cursor: pointer;
    }
    a:hover{
        text-decoration: none;
    }
    .icon{
        width: 10px;
        height: 10px;
        border: solid 1px #343939;
        border-radius: 50%;
        display: inline-block;
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
        <?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="lf">
                <img src="<?php echo ($vo["goods_img"]); ?>jpg">
                <div class="vs-ib">
                    <p>商品编号：<span><?php echo ($vo["goods_id"]); ?></span></p>
                    <p>商品名称：<span><?php echo ($vo["goods_name"]); ?></p>
                    <p>商品价格：<span><?php echo ($vo["shop_price"]); ?></p>
                    <p>商品购买数量：<span><?php echo ($vo["sell_number"]); ?></p>
                    <p>商品总价格：<span class="subtotal"><?php echo ($vo["subtotal"]); ?></p>
                    <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><p><i class="icon"><input type="hidden" value="<?php echo ($vo1["address_id"]); ?>"></i>
                        <?php echo ($vo1["province"]); echo ($vo1["city"]); echo ($vo1["district"]); echo ($vo1["street"]); ?><div>&nbsp&nbsp&nbsp&nbsp&nbsp电话：<?php echo ($vo1["mobile"]); ?></div></p><?php endforeach; endif; else: echo "" ;endif; ?>
                    <p><a href="/ww/shop/index.php/Home/Order/index" onclick="deleteShopOrder()">提交订单</a></p>
                </div>
                <input type="hidden" value="<?php echo ($vo["cart_id"]); ?>" class="cart_id">      
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div style="clear:both;"></div>
    </section>
    <script type="text/javascript">
    var address_id = null;
    var cart_id = $('.cart_id').val();
    var order_amount = $('.subtotal').html();
    var date = new Date();
    var order_time = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()+' '+date.getHours()+':'+date.getMinutes()+':'+date.getSeconds();
    $('.icon').click(function(){
       $(this).css('background','#000');
       $(this).parent().siblings('p').find('.icon').css('background','#fff');
       address_id = $(this).children().val();
    });
    function deleteShopOrder(){
    $.ajax({
            type: "post",
            url: "/ww/shop/index.php/Home/cart/delete",
            async: true,//异步or同步
            data: {id:cart_id},
            success: function(msg)
            {}
        });
    $.ajax({
            type: "post",
            url: "/ww/shop/index.php/Home/cart/submitOrder",
            async: true,//异步or同步
            data: {address_id:address_id,order_amount:order_amount,order_time:order_time},
            success: function(msg)
            {
                alert(msg);
            }
        });
    }
    </script>
</body>
</html>