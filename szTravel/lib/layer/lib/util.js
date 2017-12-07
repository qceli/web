//扩展方法
(function () {
    window.WAP_CACHE = {};
    /*原生扩展*/
    /**
     *  格式化:支持 动态参数/数组/json对象
     * @desc xxx{0}xx{1} --> a,b --> xxxaxxb  或 xxx{a}xx{b} --> {a:1,b:2} --> xxx1xx2
     * @returns
     */
    !String.format && (String.prototype.format = function () {
        var jsonFlag = arguments.length == 1 && arguments[0] instanceof Object,
            args = jsonFlag ? arguments[0] : arguments,
            reg = jsonFlag ? /\{(\w+)\}/g : /\{(\d+)\}/g;

        return this.replace(reg,
            function (m, i) {
                return args[i];
            });
    });

    var UTIL = $U = {
        vAjax: function (url, data, _callBack) {
            $.ajax({
                type: "GET",
                url: url,
                data: data,
                dataType: 'json',
                headers: $URL.headers,
                success: function (data) {
                    _callBack(data);
                },
                error: function (type) {
                    console.log(type);
                }
            });
        },
        dAjax: function (url, data, _callBack) {
            $.ajax({
                type: "DELETE",
                url: url,
                data: data,
                dataType: 'json',
                headers: $URL.headers,
                success: function (data) {
                    _callBack(data);
                },
                error: function (type) {
                    console.log(type);
                }
            });
        },
        pAjax: function (url, data, _callBack) {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: 'json',
                headers: $URL.headers,
                success: function (data) {
                    _callBack(data);
                },
                error: function (type) {
                    console.log(type);
                }
            });
        },
        paAjax: function (url, data, _callBack) {
            $.ajax({
                type: "PATCH",
                url: url,
                data: data,
                dataType: 'json',
                headers: $URL.headers,
                success: function (data) {
                    _callBack(data);
                },
                error: function (type) {
                    console.log(type);
                }
            });
        },
        getQueryStringArgs:function() {
            var qs = (location.search.length > 0 ? location.search.substring(1) : "");
            var args = {};
            var items = qs.length ? qs.split("&") : [];
            var item = null;
            var name = null;
            var value = null;
            len = items.length;
            for (var i = 0; i < len; i++) {
                item = items[i].split("=");
                name = decodeURIComponent(item[0]);
                value = decodeURIComponent(item[1]);
                if (name.length) {
                    args[name] = value;
                }
            }
            return args;
        },
        //x数组，数组内的属性
        strtype:function (x,y) {
            var str='';
            for(var i=0;i<x.length;i++){
                str+=x[i].y+','
            };
            if(str.length>0){
                str = str.substr(0,str.length-1)
            }
            return str;
        }

    };

    /**
     * URL常量类
     */
    var URL_CONST = $URL = {
        LOCALHOST: 'http://jiuguokeji.wshoto.com/',
        headers: {
            'uname': 'jiuguokeji',
            'upass': '91b1ea4de1f1c9eea88af4c831770b28',
            'addons': 'ewei_shop',
        }
    }
})();