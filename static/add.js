   layui.use(['form', 'layedit', 'laydate'], function(){
                    var $ = layui.jquery;
                    var form = layui.form
                        ,layer = layui.layer
                        var layedit = layui.layedit;


                    layedit.set({
                        uploadImage: {
                            url: '/api/index/upImg'
                            ,type: ''
                        }
                    });

                    var index = layedit.build('pattern', {height: 380}); //建立编辑器



                    layer.open({
                        type: 1
                        ,title: false 
                        ,area: '300px;'
                        ,shade: 0.8
                        ,id: 'LAY_layuiadd'
                        ,resize: false
                        
                        ,btn: '我知道了'
                        ,btnAlign: 'c'
                        ,moveType: 1 
                        ,content: '<div style="padding: 20px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">帖子发表使用教务处账号和密码，请注意自己的言论是否恰当。新生账号需等待教务处分配</div>'
                        ,success: function(layero){
                            var btn = layero.find('.layui-layer-btn');
                            btn.find('.layui-layer-btn0').attr({
                                // href: '#',
                                target: '_blank'
                            });
                        }
                    });
                                     form.verify({
                        pattern:function () {
                            layedit.sync(index);
                        }
                    });
                    form.render();
                   


            form.on('submit(demo1)', function(data){
                layer.msg('确定都填对了，提交会就返回', {
                    time: 0 //不自动关闭
                    ,btn: ['我确定  ', '再看看']
                    ,yes: function(index){
                        $.post(url+'/api/index/add/',data.field,function(data){
                            if(data.status){
                                layer.msg(data.data, {icon:1,time:2000}, function(){
                                    var index = parent.layer.getFrameIndex(window.name);
                                    parent.location.reload(); //刷新父页面
                                    parent.layer.close(index);
                                });
                            }else{

                                {
                                     layer.msg(data.data, {icon:5,time:5000}, function(){
                                        var index = parent.layer.getFrameIndex(window.name);
                                        parent.location.reload(); //刷新父页面
                                        parent.layer.close(index);
                                    });

                                }
                           
                            }
                        },'json');

                    }
                });




            });



                    layui.$('#LAY-component-form-getval').on('click', function(){
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.location.reload(); //刷新父页面
                        parent.layer.close(index);
                    });


            });