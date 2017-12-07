<html>
<head>
    <title>{$block_name} - {$title}</title>
    <meta charset="UTF-8"/>
    <meta name="keywords" content="吴博园-鸿山物联网小镇"/>
    <meta name="description" content="吴博园-鸿山物联网小镇"/>
    <link href="__PUBLIC__/LigerUI/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" id="mylink"/>
    <script src="__PUBLIC__/LigerUI/lib/jquery/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/ligerUI/js/ligerui.all.js" type="text/javascript"></script>
    <script src="__PUBLIC__/LigerUI/lib/jquery.cookie.js"></script>
    <script src="__PUBLIC__/LigerUI/lib/json2.js"></script>
    <script type="text/javascript">

        var indexdata = [
            {
                text: '购票列表',
                isexpand: false,
                url: "{:U('Index/welcome')}"
            }
            <if condition="$username eq 'admin'">
            , {
                text: '内容列表',
                isexpand: false,
                url: "{:U('MicroArticle/index')}"
            },
            {
                text:'数据统计',
                isexpand:false,
                url:"{:U('Ticket/statistics')}"
            }
            </if>
        ];
        <if condition="$username eq 'admin'">
        var ticketdata = [
            {
                text: '门票列表',
                isexpand: false,
                url: "{:U('Ticket/index')}"
            }
        ];
        </if>

        <if condition="$username eq 'admin'">
        var systemdata = [
            {
                text: '管理员设置',
                isexpand: false,
                url: "{:U('System/adminUserList')}"
            },
//            {
//                text: '景点管理',
//                isexpand: false,
//                url: "{:U('System/signtList')}"
//            },
            {
                text: '分组设置',
                isexpand: false,
                url: "{:U('System/groupList')}"
            },
            {
                text: '分类设置',
                isexpand: false,
                url: "{:U('System/categoryList')}"
            },
//            {
//                text: '权限设置',
//                isexpand: false,
//                url: "{:U('System/permissionList')}"
//            },
//            {
//                text: '接口设置',
//                isexpand: false,
//                url: "{:U('System/interfaceList')}"
//            }
        ];
        </if>

        var tab = null;
        var accordion = null;
        var tree = null;
        var tabItems = [];

        $(function () {
            //布局
            $("#layout1").ligerLayout({
                leftWidth: 190,
                height: '100%',
                heightDiff: -34,
                space: 4,
                onHeightChanged: f_heightChanged
            });

            var height = $(".l-layout-center").height();

            //Tab
            window['tab'] = $("#framecenter").ligerTab({
                height: height,
                showSwitchInTab: true,
                showSwitch: true,
                onAfterAddTabItem: function (tabdata) {
                    tabItems.push(tabdata);
                    saveTabStatus();
                },
                onAfterRemoveTabItem: function (tabid) {
                    for (var i = 0; i < tabItems.length; i++) {
                        var o = tabItems[i];
                        if (o.tabid == tabid) {
                            tabItems.splice(i, 1);
                            saveTabStatus();
                            break;
                        }
                    }
                },
                onReload: function (tabdata) {
                    var tabid = tabdata.tabid;
                    addFrameSkinLink(tabid);
                }
            });

            //面板
            $("#accordion1").ligerAccordion({
                height: height - 24, speed: null
            });

            $(".l-link").hover(function () {
                $(this).addClass("l-link-over");
            }, function () {
                $(this).removeClass("l-link-over");
            });
            //树
            $("#userManager").ligerTree({
                data: indexdata,
                checkbox: false,
                slide: false,
                nodeWidth: 120,
                attribute: ['nodename', 'url'],
                render: function (a) {
                    if (!a.isnew) return a.text;
                    return '<a href="' + a.url + '" target="_blank">' + a.text + '</a>';
                },
                onSelect: function (node) {
                    if (!node.data.url) return;
                    if (node.data.isnew) {
                        return;
                    }
                    var tabid = $(node.target).attr("tabid");
                    if (!tabid) {
                        tabid = new Date().getTime();
                        $(node.target).attr("tabid", tabid)
                    }
                    f_addTab(tabid, node.data.text, node.data.url);
                }
            });
            <if condition="$username eq 'admin'">
            $("#ticketManager").ligerTree({
                data: ticketdata,
                checkbox: false,
                slide: false,
                nodeWidth: 120,
                attribute: ['nodename', 'url'],
                render: function (a) {
                    if (!a.isnew) return a.text;
                    return '<a href="' + a.url + '" target="_blank">' + a.text + '</a>';
                },
                onSelect: function (node) {
                    if (!node.data.url) return;
                    if (node.data.isnew) {
                        return;
                    }
                    var tabid = $(node.target).attr("tabid");
                    if (!tabid) {
                        tabid = new Date().getTime();
                        $(node.target).attr("tabid", tabid)
                    }
                    f_addTab(tabid, node.data.text, node.data.url);
                }
            });
            </if>
            <if condition="$username eq 'admin'">
            $("#systemManager").ligerTree({
                data: systemdata,
                checkbox: false,
                slide: false,
                nodeWidth: 120,
                attribute: ['nodename', 'url'],
                render: function (a) {
                    if (!a.isnew) return a.text;
                    return '<a href="' + a.url + '" target="_blank">' + a.text + '</a>';
                },
                onSelect: function (node) {
                    if (!node.data.url) return;
                    if (node.data.isnew) {
                        return;
                    }
                    var tabid = $(node.target).attr("tabid");
                    if (!tabid) {
                        tabid = new Date().getTime();
                        $(node.target).attr("tabid", tabid)
                    }
                    f_addTab(tabid, node.data.text, node.data.url);
                }
            });
            </if>

            function openNew(url) {
                var jform = $('#opennew_form');
                if (jform.length == 0) {
                    jform = $('<form method="post" />').attr('id', 'opennew_form').hide().appendTo('body');
                } else {
                    jform.empty();
                }
                jform.attr('action', url);
                jform.attr('target', '_blank');
                jform.trigger('submit');
            };


            tab = liger.get("framecenter");
            accordion = liger.get("accordion1");
            tree = liger.get("userManager");
            $("#pageloading").hide();

            pages_init();
        });

        function f_heightChanged(options) {
            if (tab)
                tab.addHeight(options.diff);
            if (accordion && options.middleHeight - 24 > 0)
                accordion.setHeight(options.middleHeight - 24);
        }

        function f_addTab(tabid, text, url) {
            tab.addTabItem({
                tabid: tabid,
                text: text,
                url: url
            });
        }

        function pages_init() {
            var tabJson = $.cookie('liger-home-tab');
            if (tabJson) {
                var tabitems = JSON2.parse(tabJson);
                for (var i = 0; tabitems && tabitems[i]; i++) {
                    f_addTab(tabitems[i].tabid, tabitems[i].text, tabitems[i].url);
                }
            }
        }

        function saveTabStatus() {
            $.cookie('liger-home-tab', JSON2.stringify(tabItems));
        }

        function attachLinkToFrame(iframeId, filename) {
            if (!window.frames[iframeId]) return;
            var head = window.frames[iframeId].document.getElementsByTagName('head').item(0);
            var fileref = window.frames[iframeId].document.createElement("link");
            if (!fileref) return;
            fileref.setAttribute("rel", "stylesheet");
            fileref.setAttribute("type", "text/css");
            fileref.setAttribute("href", filename);
            head.appendChild(fileref);
        }

        function getLinkPrevHref(iframeId) {
            if (!window.frames[iframeId]) return;
            var head = window.frames[iframeId].document.getElementsByTagName('head').item(0);
            var links = $("link:first", head);
            for (var i = 0; links[i]; i++) {
                var href = $(links[i]).attr("href");
                if (href && href.toLowerCase().indexOf("ligerui") > 0) {
                    return href.substring(0, href.toLowerCase().indexOf("lib"));
                }
            }
        }
    </script>
    <style type="text/css">
        body, html {
            height: 100%;
        }

        body {
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        .l-link {
            display: block;
            height: 26px;
            line-height: 26px;
            padding-left: 10px;
            text-decoration: underline;
            color: #333;
        }

        .l-link2 {
            text-decoration: underline;
            color: white;
            margin-left: 2px;
            margin-right: 2px;
        }

        .l-layout-top {
            background: #102A49;
            color: White;
        }

        .l-layout-bottom {
            background: #E5EDEF;
            text-align: center;
        }

        #pageloading {
            position: absolute;
            left: 0px;
            top: 0px;
            background: white url('__PUBLIC__/LigerUI/lib/images/loading.gif') no-repeat center;
            width: 100%;
            height: 100%;
            z-index: 99999;
        }

        .l-link {
            display: block;
            line-height: 22px;
            height: 22px;
            padding-left: 16px;
            border: 1px solid white;
            margin: 4px;
        }

        .l-link-over {
            background: #FFEEAC;
            border: 1px solid #DB9F00;
        }

        .l-winbar {
            background: #2B5A76;
            height: 30px;
            position: absolute;
            left: 0px;
            bottom: 0px;
            width: 100%;
            z-index: 99999;
        }

        .space {
            color: #E7E7E7;
        }

        /* 顶部 */
        .l-topmenu {
            margin: 0;
            padding: 0;
            height: 31px;
            line-height: 31px;
            background: url('__PUBLIC__/LigerUI/lib/images/top.jpg') repeat-x bottom;
            position: relative;
            border-top: 1px solid #1D438B;
        }

        .l-topmenu-logo {
            color: #E7E7E7;
            padding-left: 35px;
            line-height: 26px;
            background: url('__PUBLIC__/LigerUI/lib/images/topicon.gif') no-repeat 10px 5px;
        }

        .l-topmenu-welcome {
            position: absolute;
            height: 24px;
            line-height: 24px;
            right: 30px;
            top: 2px;
            color: #070A0C;
        }

        .l-topmenu-welcome a {
            color: #E7E7E7;
            text-decoration: underline
        }

        .body-gray2014 #framecenter {
            margin-top: 3px;
        }

        .viewsourcelink {
            background: #B3D9F7;
            display: block;
            position: absolute;
            right: 10px;
            top: 3px;
            padding: 6px 4px;
            color: #333;
            text-decoration: underline;
        }

        .viewsourcelink-over {
            background: #81C0F2;
        }

        .l-topmenu-welcome label {
            color: white;
        }
    </style>
</head>
<body style="background:#EAEEF5;">
<div id="pageloading"></div>
<div id="topmenu" class="l-topmenu">
    <div class="l-topmenu-logo">鸿山物联网小镇后台管理系统</div>
    <div class="l-topmenu-welcome">
        <a href="#" class="l-link2">欢迎您！ {$username}</a>
        <span class="space">|</span>
        <a href="{:U('Login/logout')}" class="l-link2">退出</a>
    </div>
</div>
<div id="layout1" style="width:99.2%; margin:0 auto; margin-top:4px; ">
    <div position="left" title="主要菜单" id="accordion1">
        <div title="内容管理" class="l-scroll">
            <ul id="userManager" style="margin-top:3px;"></ul>
        </div>
        <if condition="$username eq 'admin'">
        <div title="门票管理">
            <ul id="ticketManager" style="margin-top: 3px;"></ul>
        </div>
        </if>
        <if condition="$username eq 'admin'">
        <div title="系统管理">
            <ul id="systemManager" style="margin-top: 3px;"></ul>
        </div>
        </if>
    </div>
    <div position="center" id="framecenter">
        <div tabid="home" title="购票记录" style="height:300px">
            <iframe frameborder="0" name="home" id="home" src="{:U('Index/welcome')}"></iframe>
        </div>
    </div>

</div>
<div style="height:32px; line-height:32px; text-align:center;">
    Copyright © 2015-2020 江苏微盛网络科技有限公司
    <a href="http://www.miitbeian.gov.cn/" target="_blank">苏ICP备123456号-1</a>
</div>
<div style="display:none">
    <!--<script src="http://s21.cnzz.com/stat.php?id=2970137&web_id=2970137" language="JavaScript"></script>-->
</div>
</body>
</html>
