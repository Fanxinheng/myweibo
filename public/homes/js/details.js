       //表单验证

        var NI = 1;
        var EM;
        var AG = 0;
        var PH = 0;
        var ch2;

        //年龄失去焦点事件
        $('#age').blur(function(){
            //获取年龄
            var age = this.value;

            //判断为空
            if(age == ""){
                AG = 0;
            }else{
                AG = 1;
            }
            console.log(AG);
        })


        //昵称获取焦点事件
        $('#uname').focus(function(){
            //添加提示信息
            $('#spa').html('请输入4-8位用户名(数字,字母,下划线');
        })

        //昵称失去焦点事件
        $('#uname').blur(function(){

            //获取昵称
            var uname = this.value;
            // console.log(uname);

            //写正则
            var reg  = /^\w{4,8}$/;

            //检测
            var check = reg.test(uname);

            //判断
            if(uname == ""){
                $('#spa').html('昵称不能为空!');
                $('#spa').css('color','red');
                NI = 0;
            }else if(check){

                //ajax传过去连接数据库检验昵称
                $.get('/home/details/uname',{uname:uname},function(data){
                    if(data==0){
                        $('#spa').html('该昵称已存在,请换一个昵称!');
                        $('#spa').css('color','red');
                        NI = 0;

                    }else{
                        $('#spa').html('√');
                        $('#spa').css('color','green');
                        NI = 1;

                    }
                })
            }else{
                    $('#spa').html('昵称格式不正确!');
                    $('#spa').css('color','red');
                    NI = 0;
                }
                // console.log(NI);
        })


        

        //邮箱获取焦点事件
        $('#email').focus(function(){
            $('#spa1').html('请输入邮箱');
        })

        //邮箱失去焦点事件
        $('#email').blur(function(){
           
            var email  = $(this).val();

             ch2 = checkEmail($('#email'),$('#spa1'));
             // console.log(ch2);
            if(ch2!=100){
              $('#spa1').css('display','block');
              $('#spa1').css('color','red');
             // return;
              EM = 0;
            }else{
              $('#spa1').css('display','none');
              ch2 = 100;
              EM = 1;
            }
            $.get("/home/details/email",{email:email},function(data){
                // console.log(data);
              if(data==1){

              }else{
                $('#spa1').css('display','block');
                $("#spa1").html("该邮箱已被注册!"); 
                $('#spa1').css('color','red');
                data = 0;
              }
            })

            // console.log(ch2);
            console.log(EM);

            
        })

        //头像失去焦点事件
        $('#photo').blur(function(){
            //获取头像的值
            var photo = this.value;

            //判断为空
            if(photo== ""){
                PH = 0;
            }else{
                PH = 1;
            }
            console.log(PH);
            //判断
            if(PH==0){
                return false;
            }
        })
        // if (PH==1&&NI==1&&AG==1&&EM==1) {
        //  next();
        // }
