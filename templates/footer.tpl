<!-- 页脚-->
<div class="footer">
    <div class="page clearfix">
        <dl>
            <dt>关于我们</dt>
            <dd><a href="#" target="_blank">企业介绍</a></dd>
            <dd><a href="#" target="_blank">企业荣誉</a></dd>
            <dd><a href="#" target="_blank">我们的团队</a></dd>
            <dd><a href="#" target="_blank">企业历程</a></dd>
        </dl>
        <dl>
            <dt>产品</dt>
            <dd><a href="#" target="_blank">全部产品</a></dd>
            <dd><a href="#" target="_blank">合作伙伴</a></dd>
            <dd><a href="#" target="_blank">合作伙伴</a></dd>
            <dd><a href="#" target="_blank">售后服务</a></dd>
        </dl>
        <dl>
            <dt>其它</dt>
            <dd><a href="#" target="_blank">招聘信息</a></dd>
            <dd><a href="#" target="_blank">新闻回顾</a></dd>
            <dd><a href="#" target="_blank">活动回顾</a></dd>
            <dd><a href="#" target="_blank">进入论坛</a></dd>
        </dl>
    </div>

    <div class="page clearfix bottom-menu">

        <div class="l fl J_down_menu_box">
          <a href="#" target="_blank">站点导航</a>
            |  <a href="#" target="_blank">使用条款</a>
            |  <a href="#" target="_blank">联系我们</a>
        </div>
        <div class="m fl" style="text-align:right;">
          <img  src="themes/site_themes/LandMover/logo/logo3.png" />
        </div>
        <div class="r fr">
            &copy;2014雷德睦华医药科技（北京）有限公司 版权所有<br />
        </div>
    </div>

    <!-- 页脚End -->
</div>

</div>
	    <a id="showDialogLink" href="#popup-dialog" style="display: none"></a>
<div id="popup-dialog" style="display: none;"></div>
<input id="viewPageId" type="hidden" value="">

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-143964-19']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageLoadTime']);
    (function () {

        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

    })();
</script>
<script type="text/javascript" src="themes/site_themes/LandMover/apps/base/js/sdk.js?3801042459"></script>
<script type="text/javascript" src="themes/site_themes/LandMover/apps/cms/default/js/jquery/plugins/jquery.cycle.all.js?1448680044"></script>
<script type="text/javascript" src="themes/site_themes/LandMover/apps/cms/default/js/jquery/plugins/jquery.masonry.js?2441411614"></script>
<script type="text/javascript" src="themes/site_themes/LandMover/apps/cms/default/js/kingdee.js?1876572040"></script>
<script type="text/javascript" src="themes/site_themes/LandMover/apps/cms/default/js/base.js?4128997615"></script>
<script type="text/javascript" src="themes/site_themes/LandMover/apps/cms/default/js/front.js?3214566309"></script>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://"); document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Faff7fbe8fcb98b060541077cc76465f2' type='text/javascript'%3E%3C/script%3E"));</script>

<script type="text/javascript">
    (function ($) {

        var m = $('.J-scroll-menu');
        var t = $('.J_tab').find('.tab');

        $('.J_posters').cycle({

            fx: 'scrollLeft',
            pager: '.J_contro_dot',
            timeout: 10000,
            speed: 300,
            pauseOnPagerHover: false

        });

        t.find('li').click(function () {//tab 切换
            var index = $(this).index();
            var tabcon = $(this).parents('.J_tab').find('.tabcon');
            $(this).parents('.tab').find('li').removeClass('cur');
            $(this).addClass('cur');
            tabcon.hide().eq(index).show();

        });

        m.find('li').click(function () {

            var i = $(this).index();
            $('html,body').animate({ scrollTop: $('#t' + i).offset().top - 40 + 'px' }, 200);

        });

        $(window).scroll(function () {

            if ($(document).scrollTop() > 470) {

                m.addClass('fix');

            } else {

                m.removeClass('fix');

            }

        });


    })(jQuery);
</script>
<script>
    var shareId = "";
    var shareUrl = window.location.href;
    if (shareId != "" && shareUrl.indexOf("shareId=") == -1) {

        if (shareUrl.indexOf("?") > 0) {

            shareUrl += "&shareId=" + shareId;

        } else {

            shareUrl += "?shareId=" + shareId;

        }

    }
    window._bd_share_config = { "common": { "bdUrl": shareUrl, "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "16" }, "share": {}, "image": { "viewList": ["tsina", "qzone", "weixin", "renren", "t163", "tqq"], "viewText": "分享到：", "viewSize": "16" }, "selectShare": { "bdContainerClass": null, "bdSelectMiniList": ["tsina", "qzone", "weixin", "renren", "t163", "tqq"] } }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>
</body>
	<!--[if IE 6]>
	<script type="text/javascript" src="http://cms.kingdee.com/st/static/apps/cms/default/js/DD_belatedPNG.js" ></script>
	<script type="text/javascript">
			//IE6透明
			$(window).load(function(){
				DD_belatedPNG.fix('img,.open,.close,.nav-arrow,.about-web,.iepngfix,.menu');				
			});
	</script>
	<![endif]-->
</html>