<div id="menu">
    <div >
        <ul>
            <li class="menustart" ></li>
            <li  class="drop-menu-effect" >
                <a href="#" >主页</a>
            </li>
            <li class="drop-menu-effect">
                <a href="#" >关于我们</a>
                <ul class="submenu">
					<li><a href="#">发展历程</a></li>
					<li><a href="#">重大事件</a></li>
					<li><a href="#">我们的团队</a></li>
				</ul>
            </li>
            <li class="drop-menu-effect">
                <a href="#" >产品展示</a>
                <ul class="submenu" >
					<li style="width:150px;"><a href="#">初次关节置换术</a></li>
					<li style="width:150px;"><a href="#">关节翻修术</a></li>
				</ul>
            </li>
            <li class="drop-menu-effect">
                <a href="#" >全国网点</a>
            </li>
            <li  class="drop-menu-effect">
                <a href="#" >新闻中心</a>
                <ul class="submenu">
					<li><a href="#">近期活动</a></li>
				</ul>
            </li>
            <li class="drop-menu-effect">
                <a href="#" >联系我们</a>
            </li>
        </ul>
    </div>
    <!--#menu-->
</div>
<script>
    $(document).ready(function () {

        $("#menu").css("left", $("#headerright").offset().left-200);
        $("#menu li").hover(function () { $(this).addClass("menuhover"); },
            function () { $(this).removeClass("menuhover"); });

        dropMenu(".drop-menu-effect");
    });
    $(window).resize(function () {
        $("#menu").css("left", $("#headerright").offset().left - 200);
    });

    function dropMenu(obj) {
        $(obj).each(function () {
            var theSpan = $(this);
            var theMenu = theSpan.find(".submenu");
            var tarHeight = theMenu.height();
            theMenu.css({ height: 0, opacity: 0 });
            theSpan.hover(
                function () {
                    $(this).addClass("selected");
                    theMenu.stop().show().animate({ height: tarHeight, opacity: 1 }, 400);
                },
                function () {
                    $(this).removeClass("selected");
                    theMenu.stop().animate({ height: 0, opacity: 0 }, 400, function () {
                        $(this).css({ display: "none" });
                    });
                }
            );
        });
    }
    
</script>