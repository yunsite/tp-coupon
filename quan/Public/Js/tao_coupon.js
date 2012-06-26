// JavaScript Document
var tb_coupon = {
	init : function(){
		var self=this;
		$('a#pull').click(function() {
			if(user.user_id == 0){
				if (/MSIE (\d+\.\d+);/.test(navigator.userAgent) || /MSIE(\d+\.\d+);/.test(navigator.userAgent)){
					var referLink = document.createElement('a');
					referLink.href = login_url;
					document.body.appendChild(referLink);
					referLink.click();
				} else {
					window.location.href = login_url;
				}
				return false;
			}
			var html = '';
			if(parseInt($(this).attr('ptype'))==2){
				html += '<font color="#ff6600">确定购买该优惠券吗？<br />';
				html += '需要支付'+parseFloat($(this).attr('price'))+'元购买该优惠券</font>';
			}else if(parseInt($(this).attr('ptype'))==3){
				html += '<font color="#ff6600">确定购买该优惠券吗？<br />';
				html += '需要支付'+parseInt($(this).attr('price'))+'积分购买该优惠券</font>';
			}
			if(html.length > 0){
				html += '<br />';
			}
			html += '<font color="#ff6600">领取淘宝优惠券需要允许弹出本站窗口</font>';
			html += '<br /><br />是否继续领取？<br />';
			$.fn.jmodal({
                    data: { c_id:parseInt($(this).attr('cid')) },
                    title: '温馨提示',
                    content: html,
                    buttonText: { ok: '确定', cancel: '取消' },
                    fixed: false,
					marginTop: 200,
					okEvent: function(data, args) {
                        self.pull(data.c_id);
                    }
                });
            });
	},
	pull : function(c_id){
		$.getJSON(pull_url+'&ajax=1&c_id='+c_id, function(data){
												   var html = '';
												   if(data.status == 0){
													   html = data.info;
												   }else{
													   html = '<ul id="pullinfo" class="clear"><li class="code">1、如果没有看到领取优惠券页面，请按提示设置允许本站弹出窗口</li><li class="code">&nbsp;</li><li class="code">2、领取淘宝优惠券需要登陆淘宝网，领取优惠券前请先登陆淘宝网</li><li class="code">&nbsp;</li><li class="code">3、领取的优惠券在"账号中心"也可以查到：</li><li class="code"><a target="_blank" href="'+mycodes_url+'">&nbsp;&nbsp;账号中心地址</a></li><li class="code">&nbsp;</li><li><ins><a target="_blank" id="go_shopping" href="'+data.data.shop_click_url+'"><span>去商家购物</span></a></ins></li></ul>';
													   window.open(data.data.shop_click_url);
													   window.open(data.data.coupon_url);
												   }
												   $.fn.jmodal({
															data: {},
                    										title: '温馨提示',
                    										content: html,
                    										buttonText: { ok: '确定', cancel: '' },
                    										fixed: false,
															marginTop: 200,
															okEvent: function(data, args) {
                        													args.hide();
                    										}
                											});
												   });
	}
};