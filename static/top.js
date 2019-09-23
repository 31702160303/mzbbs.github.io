    layui.use('element', function(){
        var element = layui.element; 
    
        element.on('nav(demo)', function(elem){

        });
    });

    if( ('onhashchange' in window) && ((typeof document.documentMode==='undefined') || document.documentMode==8)) {
  
        window.onhashchange = hashChangeFire; 
    } else {
    
        setInterval(function() {
            
            var ischanged = isHashChanged();
            if(ischanged) { 
            }
        }, 150);
    }
    function hashChangeFire(){
        location.reload();
    }