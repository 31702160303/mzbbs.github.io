
 
    layui.use(['util','flow'], function(){
        var $ = layui.jquery;
         $("#top").load("./top.html");
          $("#right").load("./right.html");
            var type = layui.router().search.type||'';
        var flow = layui.flow;
        var util = layui.util;
        flow.load({
            elem: '#demo'
            ,isAuto: false
            ,isLazyimg: true
            ,done: function(page, next){
                var lis = [];
             
                    $.get(url+'/api/?page='+page+'&type='+type, function(res){
                  
                    layui.each(res.data, function(index, item){
                  
                                              lis.push('<li ng-repeat="b in list">\n' +
                            '    <a href="details.html#/note='+ item.id +'"><div class="layui-card">                        <div class="" > <h2>'+item.title +'' +
                            '                               </h2> <div class="blog-info" style="height: 25px;line-height: 17px">\n' +
                            '                                    <span class="layui-badge">'+ item.type +'</span> </div>\n' +
                            '                                <p class="layui-elip" style="height: max-content">'+item.main+' </p></div>\n' +
                            '                       <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;"> <legend><span > '+item.time +'</span>      </legend></fieldset></a> </li>' )
                      

                    });

                 
                    next(lis.join(''), page < res.count);
                });
            }
        });
     
        util.fixbar({
            bar1: '&#xe654;'
          
            ,css: {right: 20, bottom: 30 ,}
            ,click: function(type){
                if(type === 'bar1'){

                    layui.use('layer', function(){
                        var layer = layui.layer;
                      
                        var index = layer.open({
                            title: '新建帖子'
                            ,type: 2,
                            content: 'add.html#/note=1',
                            
                            maxmin: true
                        });
                        layer.full(index);
                    });


                }
            }

    });
    });
