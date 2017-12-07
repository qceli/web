<extend name="Public/base"/>

<block name="header">
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li><a href="javascript:;">环境检测</a></li>
    <li><a href="javascript:;">创建数据库</a></li>
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>
</block>

<block name="body">
    <h1>鸿山物联网小镇管理系统 安装协议</h1>
    <p>1：请确保安装环境的安全性。</p>
    <p>2：请确保数据库环境的安全性。</p>
    <p>3：请确保管理员账号的安全性。</p>
    <p>
        开发小组：江苏微盛·研发技术小组。
    </p>

</block>

<block name="footer">
    <a class="btn btn-primary btn-large" href="{:U('Install/step1')}">安装</a>
    <a class="btn btn-large" onclick="CloseWebPage()">不安装</a>
</block>
