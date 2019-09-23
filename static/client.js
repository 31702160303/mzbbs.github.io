var client = function(){
    var engine = {
        ie: 0,
        gecko: 0,
        webkit: 0,
        khtml: 0,
        opera: 0,

        ver: null
    };

    var browser = {
        ie: 0,
        firefox: 0,
        safari: 0,
        konq: 0,
        opera: 0,
        chrome: 0,

        ver: null
    };

    var system = {
        win: false,
        mac: false,
        x11: false,

        //mobile devices
        iphone: false,
        ipod: false,
        ipad: false,
        ios: false,
        android: false,
        nokiaN: false,
        winMobile: false,

        //game systems
        wii: false,
        ps: false
    };    

    var ua = navigator.userAgent;
    if (window.opera)
    {
        engine.ver = browser.ver = window.opera.version();
        engine.opera = browser.opera = parseFloat(engine.ver);
    }
    else if (/AppleWebKit\/(\S+)/.test(ua))
    {
        engine.ver = RegExp["$1"];
        engine.webkit = parseFloat(engine.ver);

        if (/Chrome\/(\S+)/.test(ua))
        {
            browser.ver = RegExp["$1"];
            browser.chrome = parseFloat(browser.ver);
        }
        else if (/Version\/(\S+)/.test(ua))
        {
            browser.ver = RegExp["$1"];
            browser.safari = parseFloat(browser.ver);
        }
        else
        {
            var safariVersion = 1;
            if (engine.webkit < 100){
                safariVersion = 1;
            } else if (engine.webkit < 312){
                safariVersion = 1.2;
            } else if (engine.webkit < 412){
                safariVersion = 1.3;
            } else {
                safariVersion = 2;
            }
            browser.safari = browser.ver = safariVersion;
        }
    } else if (/KHTML\/(\S+)/.test(ua) || /Konqueror\/([^;]+)/.test(ua)){
        engine.ver = browser.ver = RegExp["$1"];
        engine.khtml = browser.konq = parseFloat(engine.ver);
    } else if (/rv:([^\)]+)\) Gecko\/\d{8}/.test(ua)){
        engine.ver = RegExp["$1"];
        engine.gecko = parseFloat(engine.ver);

        if (/Firefox\/(\S+)/.test(ua)){
            browser.ver = RegExp["$1"];
            browser.firefox = parseFloat(browser.ver);
        }
    } else if (/MSIE ([^;]+)/.test(ua)){
        engine.ver = browser.ver = RegExp["$1"];
        engine.ie = browser.ie = parseFloat(engine.ver);
    }

    browser.ie = engine.ie;
    browser.opera = engine.opera;

    var p = navigator.platform;
    system.win = p.indexOf("Win") == 0;
    system.mac = p.indexOf("Mac") == 0;
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);

    if (system.win){
        if (/Win(?:dows )?([^do]{2})\s?(\d+\.\d+)?/.test(ua)){
            if (RegExp["$1"] == "NT"){
                switch(RegExp["$2"]){
                    case "5.0":
                        system.win = "2000";
                        break;
                    case "5.1":
                        system.win = "XP";
                        break;
                    case "6.0":
                        system.win = "Vista";
                        break;
                    case "6.1":
                        system.win = "7";
                        break;
                    default:
                        system.win = "NT";
                        break;
                }
            } else if (RegExp["$1"] == "9x"){
                system.win = "ME";
            } else {
                system.win = RegExp["$1"];
            }
        }
    }

    //mobile devices
    system.iphone = ua.indexOf("iPhone") > -1;
    system.ipod = ua.indexOf("iPod") > -1;
    system.ipad = ua.indexOf("iPad") > -1;
    system.nokiaN = ua.indexOf("NokiaN") > -1;

    //windows mobile
    if (system.win == "CE"){
        system.winMobile = system.win;
    } else if (system.win == "Ph"){
        if(/Windows Phone OS (\d+.\d+)/.test(ua)){;
            system.win = "Phone";
            system.winMobile = parseFloat(RegExp["$1"]);
        }
    }

    //determine iOS version
    if (system.mac && ua.indexOf("Mobile") > -1){
        if (/CPU (?:iPhone )?OS (\d+_\d+)/.test(ua)){
            system.ios = parseFloat(RegExp.$1.replace("_", "."));
        } else {
            system.ios = 2;
        }
    }

    //determine Android version
    if (/Android (\d+\.\d+)/.test(ua)){
        system.android = parseFloat(RegExp.$1);
    }

    //gaming systems
    system.wii = ua.indexOf("Wii") > -1;
    system.ps = /playstation/i.test(ua);

    return {
        engine:engine,
        browser:browser,
        system:system
    };
}();

(function(){
    if(client.browser.ie && client.browser.ver < 9)
    {

var div1 = document.createElement('DIV');
div1.setAttribute('id', 'browser_ie');
div1.style.height = '85px';
div1.style.backgroundColor = '#ffffcc';
div1.style.color = '#000';
div1.style.fontSize = '14px';
    var div2 = document.createElement('DIV');
    div2.className = 'brower_info';
    div2.style.width = '800px';
    div2.style.margin = '0px auto';
    div2.style.paddingTop = '15px';
    div1.appendChild(div2);
        var div3 = document.createElement('DIV');
        div3.className = 'notice_info';
        div3.style.marginTop = '5px';
        div3.style.cssFloat = 'left';
        div3.style.styleFloat = 'left';
        div2.appendChild(div3);
            var p1 = document.createElement('P');
            div3.appendChild(p1);
                var txt1 = document.createTextNode('hi，您当前的浏览器版本过低，可能导致网站不能正常访问！');
                p1.appendChild(txt1);
            var p2 = document.createElement('P');
            div3.appendChild(p2);
                var txt2 = document.createTextNode('为了你能正常使用网站功能，请使用这些现代web浏览器。');
                p2.appendChild(txt2);
        var div4 = document.createElement('DIV');
        div4.className = 'browser_list';
        div4.style.cssFloat = 'left';
        div4.style.styleFloat = 'left';
        div2.appendChild(div4);
            var span1 = document.createElement('SPAN');
            span1.style.display = 'inline-block';
            span1.style.width = '80px';
            span1.style.textAlign = 'center';
            div4.appendChild(span1);
                var a1 = document.createElement('A');
                a1.setAttribute('href', 'http://www.google.cn/intl/zh-CN/chrome/browser/');
                a1.setAttribute('target', '_blank');
                span1.appendChild(a1);
                    var img1 = document.createElement('IMG');
                    img1.setAttribute('src', 'browser_icon/chrome.png');
                    img1.setAttribute('width', '40');
                    img1.setAttribute('height', '40');
                    a1.appendChild(img1);
                    var br1 = document.createElement('BR');
                    a1.appendChild(br1);
                    var txt3 = document.createTextNode('chrome');
                    a1.appendChild(txt3);
            var span2 = document.createElement('SPAN');
            span2.style.display = 'inline-block';
            span2.style.width = '80px';
            span2.style.textAlign = 'center';
            div4.appendChild(span2);
                var a2 = document.createElement('A');
                a2.setAttribute('href', 'http://www.firefox.com.cn/');
                a2.setAttribute('target', '_blank');
                span2.appendChild(a2);
                    var img2 = document.createElement('IMG');
                    img2.setAttribute('src', 'browser_icon/firefox.png');
                    img2.setAttribute('width', '40');
                    img2.setAttribute('height', '40');
                    a2.appendChild(img2);
                    var br2 = document.createElement('BR');
                    a2.appendChild(br2);
                    var txt4 = document.createTextNode('firefox');
                    a2.appendChild(txt4);
            var span3 = document.createElement('SPAN');
            span3.style.display = 'inline-block';
            span3.style.width = '80px';
            span3.style.textAlign = 'center';
            div4.appendChild(span3);
                var a3 = document.createElement('A');
                a3.setAttribute('href', 'http://www.apple.com/cn/safari/');
                a3.setAttribute('target', '_blank');
                span3.appendChild(a3);
                    var img3 = document.createElement('IMG');
                    img3.setAttribute('src', 'browser_icon/safari.png');
                    img3.setAttribute('width', '40');
                    img3.setAttribute('height', '40');
                    a3.appendChild(img3);
                    var br3 = document.createElement('BR');
                    a3.appendChild(br3);
                    var txt5 = document.createTextNode('safari');
                    a3.appendChild(txt5);
            var span4 = document.createElement('SPAN');
            span4.style.display = 'inline-block';
            span4.style.width = '80px';
            span4.style.textAlign = 'center';
            div4.appendChild(span4);
                var img4 = document.createElement('IMG');
                img4.setAttribute('src', 'browser_icon/ie.png');
                img4.setAttribute('width', '40');
                img4.setAttribute('height', '40');
                span4.appendChild(img4);
                var br4 = document.createElement('BR');
                span4.appendChild(br4);
                var txt6 = document.createTextNode('ie9及以上');
                span4.appendChild(txt6);

        var body = document.getElementsByTagName('body')[0];
        if(body.firstChild){
            body.insertBefore(div1,body.firstChild);
        }else{
            body.appendChild(div1);
        }
    }

})();