<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><{$Title}></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script src="<{$rootpath}>/js/jquery.js"></script>
    <link href="<{$rootpath}>/themes/site_themes/LandMover/css/global.css" rel="stylesheet" type="text/css" />


</head>
<body id="home">
    <div id="outer">
        <div id="inner">
            <div id="wrapper">
                <div id="smallheader">
                    <div class="set1000 nav">
                        <ul>
                            <li><a id="addFavorite" href="#">收藏我们</a></li>
                            <li>|</li>
                            <li><a id="setHome" href="#">设为首页</a></li>
                        </ul>
                    </div>
                </div>
                <div id="header">
                    <div id="logo" style="float: left;"></div>
                    <div id="headerright" class="rightside" style="float: right;">
                        <div style="float: right">
                            <div id="slogan"></div>
                            <div style="float: right"><span class="bigfont">服务热线：<span style="color: red;">400-00-0000</span></span></div>
                        </div>
                    </div>
                    <!-- #header -->
                </div>
                <script>

                    $(document).ready(function () {
                        $("#setHome").click(function () {
                            var url = "<{$Url}>";
                            try {
                                this.style.behavior = 'url(#default#homepage)';
                                this.setHomePage(url);

                                alert("1");
                            } catch (e) {
                                if (window.netscape) {
                                    try {
                                        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                                    } catch (e) {
                                        alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
                                    }
                                } else {
                                    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【" + url + "】设置为首页。");
                                }
                            }
                        });
                        $("#addFavorite").click(function () {

                            //$(this).html("aaa");
                            //return;
                            var title = "<{$Title}>";
                            var url = "<{$Url}>";
                            try {
                                window.external.addFavorite(url, title);
                            }
                            catch (e) {
                                try {
                                    window.sidebar.addPanel(title, url, "");
                                }
                                catch (e) {
                                    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
                                }
                            }
                        });
                    });


                </script>
<{include file="$smarty_root/menu.tpl" }>