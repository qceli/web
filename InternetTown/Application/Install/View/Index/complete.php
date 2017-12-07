<extend name="Public/base"/>

<block name="header">
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li class="active"><a href="javascript:;">安装</a></li>
    <li class="active"><a href="javascript:;">完成</a></li>
</block>

<block name="body">
    <h1>完成</h1>
    <p>安装完成！</p>
    <present name="info">
        {$info}
    </present>
</block>

<block name="footer">
    <a class="btn btn-success btn-large" href="__ROOT__/index.php/Admin/">登陆后台</a>
</block>
