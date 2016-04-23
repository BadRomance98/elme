<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html ng-app="myapp">
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
    .address{
        width: 980px;
        margin: 0 auto;
        font-weight: bold;
        font-size: 16px;
    }
    input{
        width: 200px;
        height: 30px;
        border: solid 1px #FE8502;
    }
    .address-form{
        width: 49%;
        border: solid 1px #FE8502;
        float: left;
    }
    .address-form label{
        width: 100px;
        display: inline-block;
        padding: 10px;
    }
    .add-address{
        color: rgb(0, 0, 238);
    }
    #special{
        position: relative;
    }
    .special{
        color: #FE8502;
    }
    .del-button,.add-address{
        float: right;
        margin-right: 40px;
        margin-top: 10px;
    }
    </style>
</head>
<body ng-controller="Address">
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



	
    <div class="address">
        <div class="address-form" id="special">
            <div>
                <label>收货人姓名</label>
                <input type="text" name="consignee" ng-model='consignee'> 
                <strong  class="consignee">{{consignee}}</strong>             
            </div>
            <div>
                <label>省</label>
                <input type="text" name="province" class="province" ng-model='province'>                
            </div>
            <div>
                <label>城市</label>
                <input type="text" name="city" class="city" ng-model='city'>                
            </div>            
                <label>区</label>
                <input type="text" name="district" class="district" ng-model='district'>
            <div>
                <label>街道</label>
                <input type="text" name="zipcode" class="street" ng-model='street'>                
            </div>
            <div>
                <label>邮政编码</label>
                <input type="text" name="zipcode" class="zipcode" ng-model='zipcode'>                
            </div>               
            <div>
                <label>移动电话</label>
                <input type="text" name="mobile" class="mobile" ng-model='mobile'>
                <a class="add-address" ng-click="addAddress()">添加新地址</a>
            </div>
        </div>        
    </div>
    <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="address">
            <div class="address-form">
                <div>
                    <label>收货人姓名：</label>
                     <span class="special"><?php echo ($vo["consignee"]); ?></span>              
                </div>
                <div>
                    <label>省：</label>
                    <span class="special"><?php echo ($vo["province"]); ?></span>                
                </div>
                <div>
                    <label>城市：</label>
                    <span class="special"><?php echo ($vo["consignee"]); ?></span>                
                </div>            
                    <label>区：</label>
                    <span class="special"><?php echo ($vo["city"]); ?></span>
                <div>
                    <label>街道：</label>
                    <span class="special"><?php echo ($vo["street"]); ?></span>                
                </div>                   
                <div>
                    <label>邮政编码：</label>
                    <span class="special"><?php echo ($vo["zipcode"]); ?></span>                
                </div>            
                <div>
                    <label>移动电话：</label>
                    <span class="special"><?php echo ($vo["mobile"]); ?></span>
                    <a href="/ww/shop/index.php/Home/Address/delete/id/<?php echo ($vo["address_id"]); ?>" class="del-button">删除</a>
                </div>
            </div>        
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
<script type="text/javascript">
angular.module('myapp',[])
    .controller('Address',['$scope','$http',function($scope,$http) {
        $scope.consignee='';
        $scope.province='';
        $scope.city='';
        $scope.district='';
        $scope.zipcode='';
        $scope.mobile='';
        $scope.addAddress = function(){
            var consignee = encodeURI($scope.consignee);
            var province = encodeURI($scope.province);
            var city = $scope.city;
            var district = $scope.district;
            var zipcode = $scope.zipcode;
            var mobile = $scope.mobile;
            var street = $scope.street;
            var json = {consignee: $scope.consignee, province:$scope.province,city:$scope.city, district:$scope.district,street:$scope.street,zipcode:$scope.zipcode,mobile:$scope.mobile};
            var req = {
             method: 'POST',
             url: '/ww/shop/index.php/Home/address/add',
             headers: {
               'Content-Type': 'text/html'
             },
             data: json
            }
            $http(req).then(function(data){console.log(data);}, function(data){console.log(data);});
        }

    }]);
</script>
</body>
</html>