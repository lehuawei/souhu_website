//定义全局变量
var url = "index.php?mod=api";
$(function(){
    //登录
  $(".form_one").submit(function(event){
        var acc_l=$(".div_log .number").val().length;
        var pass_l=$(" .div_log .password").val().length;
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var ifStrong= strongRegex.test($(".div_log .password").val());
        if(acc_l==0||pass_l==0){
            $(".div_log .red").html("输入不能为空！");
            $(".acc_con .div_log .red").css("display","inline-block");
        }
        else {
            $(".red").html("");
            $(".red").css("display","none");
            var data = {};
            data.action = "userLogin";
            data.userName = $(".number").val();
            data.userPass =$(".password").val();
            $.post(url,data,function(result){
                var obj = JSON.parse(result);
                var code =parseInt(obj.CODE);
                if(code != 0){
                    //失败
                    alert(obj.DATA.ERRMSG);
                }
                else{
                   // alert("登录成功");
                    var data = obj.DATA.RESULT;
                    //进入个人登录页面
                    $(".yhm").html(data.nickName);
                    $(".form_one")[0].reset();
                    localStorage.ifStrong=ifStrong;
                    console.log(localStorage.ifStrong);
                    location.replace('?mod=acc_recharge');
                }
            });
        }
    });
    //获取验证码
    $(".btn_fu").click(function (e) {
        $(".id_code,.code").val('');
        var red=$(".red");
        var that = this;
        var countdown=30;
        var data={};
        data.action = "sendSms";
        //判断手机号是否为空
        var num_reg=$(".phone").val();
        var num_fgt=$(".phone_num").val();
        var reg_num=/^1[3|4|5|7|8][0-9]{9}$/.test(num_reg);
        var reg_fgt=/^1[3|4|5|7|8][0-9]{9}$/.test(num_fgt);
        if($(this).attr('name')=='reg_code'){ //注册获取验证码
            data.smsType = 1;
            data.mobileNo = $(".phone").val();
            if(!reg_num){
                red.html("请输入正确的电话号码格式！");
                red.css("display","inline-block");
            }
            else {
                red.html("");
                red.css("display","none");
            }
        }else { //找回密码获取验证码
            data.smsType = 2;
            data.mobileNo = $(".phone_num").val();
            if(!reg_fgt){
                red.html("请输入正确的电话号码格式！");
                red.css("display","inline-block");
            }
            else {
                red.html("");
                red.css("display","none");
            }
        }
           $.post(url,data,function (result) {
                console.log(result);
                var jsonData = JSON.parse(result);
                var code = parseInt(jsonData.CODE);
                if(code == 0){
                    that.setAttribute("disabled", true);
                    that.value="重新发送(" + countdown + ")";
                    var timer=setInterval(function (){
                        that.value="重新发送(" + --countdown + ")";
                        if(countdown==0){
                            clearInterval(timer);
                            that.value="获取验证码";
                            that.removeAttribute("disabled");
                           }
                    },1000);
                }else{
                    //获取验证码失败
                    alert(jsonData.DATA.ERRMSG);
                }
            });
    });
    //注册
     $(".form_two").submit(function(event){
        var name_l=$(".div_reg .name").val().length;
        var email_l=$(".div_reg .phone").val().length;
        var pass_ll=$(".div_reg .password").val().length;
        var reg=/^1\d{10}$/.test($(".phone").val());
        var reg1=/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/.test($(".div_reg .password").val());
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var ifStrong= strongRegex.test($(".div_reg .password").val());
        localStorage.ifStrong=ifStrong;
         if(name_l==0||email_l==0||pass_ll==0){
            $(".red").html("输入不能为空！");
            $(".red").css("display","inline-block");
             return;
        }
         else if(!reg1){
            $(".red").html("请输入正确的密码格式！");
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
            data.mobileNo = $(".phone").val();
            data.smsCode=$(".id_code").val();
            data.nickName=$(".name").val();
            data.userPass =$(".div_reg .password").val();
            var xhr_reg=$.post(url,data,function(result){
                var obj = JSON.parse(result);
                console.log(obj);
                var code =parseInt(obj.CODE);
                if(code != 0){
                    //失败
                    alert(obj.DATA.ERRMSG);
                }
                else{
                    //注册成功
                    alert("注册成功");
                    var data = obj.DATA.RESULT;
                    $(".yhm").html(data.nickName);
                    $(".form_two")[0].reset();
                    location.replace('?mod=acc_recharge');
                }
            });
        }
    });
    //找回密码
    $(".form_fgtpass ").submit(function () {
        var phone_f=$(".form_fgtpass .phone_num").val();
        var new_pass=$(".form_fgtpass .new_pass").val();
        var sure_newPass=$(".form_fgtpass .sure_newPass").val();
        var reg=/^1\d{10}$/.test(phone_f);
         if(new_pass!=sure_newPass){
            $(".red").html("两次密码不一致请重新输入！");
            $(".red").css("display",'inline-block');
        }
        else{
            $(".red").html("");
            $(".red").css("display","none");
            var data = {};
            data.action = "findUserPass";
            data.mobileNo = phone_f;
            data.smsCode=$(".fgt_code").val();
            data.newPass =new_pass;
            data.newPassTwo=sure_newPass;
            var xhr_reg=$.post(url,data,function(result){
                var obj = JSON.parse(result);
                var code =parseInt(obj.CODE);
                if(code != 0){
                    //失败
                    //alert('fail');
                    alert(obj.DATA.ERRMSG);
                }
                else{
                    alert("找回成功");
                    var data = obj.DATA.RESULT;
                    $(".form_fgtpass")[0].reset();
                }
            });
        }
    });
    //修改密码强度
    $(".form_three .new_pass").blur(function () {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var modify_ifStrong= strongRegex.test($(".form_three .new_pass").val());
        localStorage.modify_ifStrong=modify_ifStrong;
        var modifyifStrong=localStorage.modify_ifStrong;
       // console.log('修改密码后密码强度测试'+modifyifStrong);
        switch(modifyifStrong)
        {
            case "true":
                $('#chg_span').addClass('orange_span').removeClass('grey_span');
                $('#chg_strong').html('强');
                break;
            case "false":
                $("#chg_span").addClass('grey_span').removeClass('orange_span');
                $("#chg_strong").html('中');
                break;
            default:
        }
    });
//修改密码
    $(".form_three").submit(function(event){
        var new_pass_l=$(".form_three .new_pass").val().length;
        var sure_pass_l=$(".form_three .sure_pass").val().length;
        var reg2=/(?!^[0-9]+$)(?!^[A-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/.test($(".form_three .sure_pass").val());
        var new_pass=$(".form_three .new_pass").val();
        var sure_pass=$(".form_three .sure_pass").val();
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
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
            $.post(url,data,function(result){
                var obj=JSON.parse(result);
                var code=parseInt(obj.CODE);
                if(code!=0){
                    //失败
                    alert("fail")
                }
                else{
                    alert("修改成功");
                    $(".log_a").css("display","inline");
                    $(".form_three")[0].reset();
                    window.location.reload('?mod=acc_recharge');
                }
            })
        }
    });
   //修改用户资料
    $(".user_info .save").click(function () {
        var data = {};
        var user_name=$(".userName").val();
        var user_gender=$(".userGender option:selected").val();
        var user_id=$(".userId").val();
        var user_prov=$(".prov").val();
        var user_city=$(".city").val();
        var user_address=$('.userAddress').val();
        data.action='modifyUserInfo';
        data.userName=user_name;
        data.userSex=user_gender;
        data.userId=user_id;
        data.userProv=user_prov;
        data.userCity=user_city;
        data.address=user_address;
        console.log(data);
        data.userAddress=user_address;
        $.post(url,data,function(result){
        });
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
        var data = {};
        data.pId = $('#st_produrce').val();
        data.bindAccountNo =$(".form_four .phonenumber").val();
        data.bindPwd = $(".form_four .password").val();
        data.action ="bindProdurce";
        $.post(url,data,function(result){
            
        });
    });
});

