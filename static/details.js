  layui.use(['util','flow','layer'], function(){
        var layer=layui.layer;
        var $ = layui.jquery;
        $("#top").load("./top.html");
        $("#right").load("./right.html");
        var flow = layui.flow;
        var id = layui.router().search.note;
        flow.load({
            elem: '#demo' 
            ,isAuto: false
            ,   end: '<p >我是有底线的</p>'
            ,isLazyimg: true
            ,done: function(page, next){ 
                var lis = [];
               
                $.get(url+'/api/index/details?note='+id, function(res){
                  
                    layui.each(res.data, function(index, item){
                    
                        lis.push('' +
                            '                <div class="layui-card-header layui-field-title"><h2>'+ item.title +'</h2><span class="layui-badge layui-layout-right">'+item.type+'</span></div>' +
                            '                <div class="layui-card-body ">'                + item.main +''+
                            ' <br>'+item.time+' <div class="layui-col-md7 layui-col-xs6"> &nbsp; </div>     <a  id="zq_login"><button type="button" class="layui-btn layui-btn-normal ">删除</button></a></div>'  );

                    });

                    next(lis.join(''), page < res.count);
                });
            }
        });

        $(document).on('click','#zq_login',function() {
            layer.prompt({ value:'发帖时填入的学号',title: '请输入学号',},function(val, index){

                var id = layui.router().search.note;
            
                layer.msg('加载中', {
                    icon: 16
                    ,shade: 0.01
                });

                $.get('/api/index/dele?id='+id+'&sno='+val, function(data) {    if(data.status) {
                     
                        layer.msg(data.data);
                    }else {
                        layer.alert(data.data, function(){
                            layer.closeAll();

                        }); }
                }, 'json');

            });

        })
    });