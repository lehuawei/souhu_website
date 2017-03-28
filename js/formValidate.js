//定义全局变量
var url = "index.php?mpd=api";
$(function(){
  $(".form_one").submit(function(event){
        var acc_l=$(".login .account").val().length;
        var pass_l=$(" .login .password").val().length;
        if(acc_l==0||pass_l==0){
            $(".red").html("输入不能为空！");
            $(".red").css("display","block");
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
    //注册
     $(".form_two").submit(function(event){
        var name_l=$(".register .name").val().length;
        var email_l=$(".register .email").val().length;
        var pass_ll=$(".register .password").val().length;
        var reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(" .email").val());
        var reg1=/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/.test($(".register .password").val());

        if(name_l==0||email_l==0||pass_ll==0){
            $(".red").html("输入不能为空！");
            $(".red").css("display","block");
             return;
        }
         else if(!reg){
             $(".red").html("请输入正确的邮箱格式！");
             $(".red").css("display",'block');
         }
         else if(!reg1){

            $(".red").html("请输入正确的密码格式！");
            $(".red").css("display",'block');
        }
        else if((!reg)&&(!reg1)){
            $(".red").html("请输入正确的邮箱和密码格式！");
            $(".red").css("display",'block');
        }
        else if(!$("#chk").is(":checked")){
            $(".red").html("请阅读并同意用户协议和版权声明！");
            $(".red").css("display",'block');
        }
        else {
            var data = {};
            data.action = "createUser";
            data.userName = $(".email").val();
            data.nickName=$(".name").val();
            data.userPass =$(".register .password").val();
            console.log(data);
            $(".red").html("");
            $(".red").css("display","none");
            $.post(url,data,function(result){
                var obj = JSON.parse(result);
                var code =parseInt(obj.CODE);
                if(code != 0){
                    //失败
                    alert(obj.DATA.ERRMSG);
                }
                else{
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
        }
    });

    $(".form_three").submit(function(event){
        var new_pass_l=$(".change_pass .new_pass").val().length;
        var sure_pass_l=$(".change_pass .sure_pass").val().length;
        var reg2=/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/.test($(".change_pass .sure_pass").val());
        var new_pass=$(".change_pass .new_pass").val();
        var sure_pass=$(".change_pass .sure_pass").val();
        if(new_pass_l==0||sure_pass_l==0){
            $(".red").html("输入不能为空！");
            $(".red").css("display","block");
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
});
