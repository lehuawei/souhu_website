//定义全局变量
var url = "index.php?mod=api";
$(function(){
    //登录
  $(".form_one").submit(function(event){
        var acc_l=$(".div_log .number").val().length;
        var pass_l=$(" .div_log .password").val().length;
        if(acc_l==0||pass_l==0){
            $(".div_log .red").html("输入不能为空！");
            $(".acc_con .div_log .red").css("display","inline-block");
        }
        else {
            $(".red").html("");
            $(".red").css("display","none");
            var data = {};
            data.action = "userLogin";
            data.userName = $(".account").val();
            data.userPass =$(".password").val();
            $.post(url,data,function(result){
                var obj = JSON.parse(result);
                var code =parseInt(obj.CODE);
                if(code != 0){
                    //失败
                    alert(obj.DATA.ERRMSG);
                }
                else{
                    //alert("登录成功");
                    var data = obj.DATA.RESULT;
                    //进入个人登录页面
                    $(".login").css("display","none");
                    $(".yhm").html(data.nickName);
                    $(".log").css("display","none");
                    $(".reg").css("display","none");
                    $(".register").css("display","none");
                    $("header .add_icon").css("display","inline");
                    $(".form_three")[0].reset();
                }
            });
        }
    });

    //获取验证码
    $(".btn_fu").click(function (e) {
        var countdown=5;
        var data={};
        //判断手机号是否为空
        var number_v=$(".phonenumber").val();
        var phone_n=number_v.length;
        var reg_num=/^1\d{10}$/.test(number_v);
        if(phone_n==0){
            $(".red").html("请输入手机号！");
            $(".red").css("display","inline-block");
        }
        else if(!reg_num){
            $(".red").html("请输入正确的电话号码格式！");
            $(".red").css("display",'inline-block');
        }
        else{
            $(".red").html("");
            $(".red").css("display","none");
            data.action = "sendRegSms";
            data.mobileNo = $(".phonenumber").val();
            $.post(url,data,function (result) {
                console.log(result);
               // var returnData = JSON.parse(result);
                //console.log(returnData);
                var code = parseInt(result.code);
                if(code == 0){
                    var status = result.DATA.RESULT;
                    if(!status){
                       //获取验证码失败
                        alert("失败");
                        return;
                    }else{
                        //获取验证码成功，按钮变不可点击
                        this.setAttribute("disabled", true);
                        this.value="重新发送(" + countdown + ")";
                        var that=this;
                        var timer=setInterval(function (){
                            that.value="重新发送(" + --countdown + ")";
                            if(countdown==0){
                                clearInterval(timer);
                                that.value="获取验证码";
                                that.removeAttribute("disabled");
                            }
                        },1000);
                    }
                }

            })
        }

    });
    //注册
     $(".form_two").submit(function(event){
        var name_l=$(".div_reg .name").val().length;
        var email_l=$(".div_reg .phonenumber").val().length;
        var pass_ll=$(".div_reg .password").val().length;
        var reg=/^1\d{10}$/.test($(".phonenumber").val());
        var reg1=/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/.test($(".div_reg .password").val());
        if(name_l==0||email_l==0||pass_ll==0){
            $(".red").html("输入不能为空！");
            $(".red").css("display","inline-block");
             return;
        }
         else if(!reg){
             $(".red").html("请输入正确的电话号码格式！");
             $(".red").css("display",'inline-block');
         }
         else if(!reg1){
            $(".red").html("请输入正确的密码格式！");
            $(".red").css("display",'inline-block');
        }
        else if((!reg)&&(!reg1)){
            $(".red").html("请输入正确的电话号码和密码格式！");
            $(".red").css("display",'inline-block');
        }
        else if(!$(".che_if").is(":checked")){
            $(".red").html("请阅读并同意用户协议和版权声明！");
            $(".red").css("display",'inline-block');
        }
        else {
            $(".red").html("");
            $(".red").css("display","none");
            var data = {};
            data.action = "createUser";
            data.mobileNo = $(".phonenumber").val();
            data.smsCode=$(".id_code").val();
            data.nickName=$(".name").val();
            data.userPass =$(".div_reg .password").val();
            console.log(data);
            var xhr=$.post(url,data,function(result){
                console.log(result)
                var obj = JSON.parse(result);
                console.log(obj);
                var code =parseInt(obj.CODE);
                if(code != 0){
                    //失败
                    alert(obj.DATA.ERRMSG);
                }
                else{
                    alert("注册成功");
                    var data = obj.DATA.RESULT;
                    //注册成功
                    //进入个人登录页面
                    $(".yhm").html(data.nickName);
                    $(".log").css("display","none");
                    $(".reg").css("display","none");
                    $(".register").css("display","none");
                    $("header .add_icon").css("display","inline");
                    $(".form_two")[0].reset();
                    $(".form_three")[0].reset();
                }
            });
            console.log(xhr)
        }
    });
//修改密码
    $(".form_three").submit(function(event){
        var new_pass_l=$(".form_three .new_pass").val().length;
        var sure_pass_l=$(".form_three .sure_pass").val().length;
        var num_l=$(".form_three .phone").val().length;
        var reg2=/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/.test($(".form_three .sure_pass").val());
        var reg=/^1\d{10}$/.test($(".form_three .phone").val());
        var new_pass=$(".form_three .new_pass").val();
        var sure_pass=$(".form_three .sure_pass").val();

        if(new_pass_l==0||sure_pass_l==0||num_l==0){
            $(".red").html("输入不能为空！");
            $(".red").css("display","block");
        }
        else if(!reg){
            $(".red").html("请输入正确的电话号码！");
            $(".red").css("display",'block');
        }
        else if(!reg2){
            $(".red").html("请输入正确的密码格式！");
            $(".red").css("display",'block');
        }
        else if(new_pass!=sure_pass){
            $(".red").html("两次密码不一致请重新输入！");
            $(".red").css("display",'block');
        }
        else {
            $(".red").html("");
            $(".red").css("display","none");
            var data = {};
            data.action = "modifyUserPass";
            data.newPass = $(".new_pass").val();
            data.newPassTwo=$(".sure_pass").val();
            console.log(data);
            $.post(url,data,function(result){
                var obj=JSON.parse(result);
                var code=parseInt(obj.CODE);
                if(code!=0){
                    //失败
                    alert("fail")
                }
                else{
                    //alert("修改成功");
                    $(".change_pass").css("display","none");
                    window.location.reload();//刷新当前页面.
                    $(".form_one")[0].reset();
                    $(".form_three")[0].reset();
                }
            })
        }
    });
    //添加账号
    $(".form_four").submit(function(event){
        var f_phone_l=$(".form_four .phonenumber").val().length;
        var f_pass_l=$(".form_four .password").val().length;
        if(f_phone_l==0||f_pass_l==0){
            $(".red").html("输入不能为空！");
            $(".red").css("display","inline-block");
        }
        else{
            $(".red").html("");
            $(".red").css("display","none");
        }
    })
});

