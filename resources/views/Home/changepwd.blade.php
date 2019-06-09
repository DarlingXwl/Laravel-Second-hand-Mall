@extends('Home.layout.home')
@section('content')


    <style type="text/css">
        .form-bg{
            width: 100%;
            margin-top: 120px;
        }
        .form-horizontal{
            /*width: 50%;*/
            background: #fff;
            padding-bottom: 40px;
            border-radius: 15px;
            text-align: center;
        }
        .form-horizontal .heading{
            display: block;
            font-size: 35px;
            font-weight: 700;
            padding: 35px 0;
            border-bottom: 1px solid #f0f0f0;
            margin-bottom: 30px;
        }
        .form-horizontal .form-group{
            padding: 0 40px;
            margin: 0 0 40px 0;
            position: relative;
        }
        .form-horizontal .form-control{
            background: #f0f0f0;
            border: none;
            box-shadow: none;
            padding: 0 20px 0 45px;
            height: 40px;
            transition: all 0.3s ease 0s;
        }
        .form-horizontal .form-control:focus{
            background: #e0e0e0;
            box-shadow: none;
            outline: 0 none;
        }
        .form-horizontal .form-group i{
            position: absolute;
            top: 12px;
            left: 60px;
            font-size: 17px;
            color: #c8c8c8;
            transition : all 0.5s ease 0s;
        }
        .form-horizontal .form-control:focus + i{
            color: #2c2c2c;
        }
        .form-horizontal .fa-question-circle{
            display: inline-block;
            position: absolute;
            top: 12px;
            right: 60px;
            font-size: 20px;
            color: #808080;
            transition: all 0.5s ease 0s;
        }
        .form-horizontal .fa-question-circle:hover{
            color: #000;
        }
        .form-horizontal .main-checkbox{
            float: left;
            width: 20px;
            height: 20px;
            background: #2c2c2c;
            border-radius: 50%;
            position: relative;
            margin: 5px 0 0 5px;
        }
        .form-horizontal .main-checkbox label{
            width: 20px;
            height: 20px;
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
        }
        .form-horizontal .main-checkbox label:after{
            content: "";
            width: 10px;
            height: 5px;
            position: absolute;
            top: 5px;
            left: 4px;
            border: 3px solid #fff;
            border-top: none;
            border-right: none;
            background: transparent;
            opacity: 0;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .form-horizontal .main-checkbox input[type=checkbox]{
            visibility: hidden;
        }
        .form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
            opacity: 1;
        }
        .form-horizontal .text{
            float: left;
            margin-left: 7px;
            line-height: 20px;
            padding-top: 5px;
            text-transform: capitalize;
        }
        .form-horizontal .login{
            float: right;
            font-size: 14px;
            color: #fff;
            background: #2c2c2c;
            border-radius: 30px;
            padding: 10px 25px;
            text-transform: capitalize;
            transition: all 0.5s ease 0s;
            line-height: 10px;
        }
        .form-horizontal .new{
            float: right;
            font-size: 14px;
            color: #fff;
            background: #666;
            border-radius: 30px;
            padding: 10px 25px;
            text-transform: capitalize;
            transition: all 0.5s ease 0s;
            line-height: 10px;
        }
        @media only screen and (max-width: 479px){
            .form-horizontal .form-group{
                padding: 0 25px;
            }
            .form-horizontal .form-group i{
                left: 45px;
            }
            .form-horizontal .login{
                padding: 10px 20px;
            }
        }
        .form-group span{
            display: block;
            height: 10px;
        }
    </style>
</head>
        <div class="demo form-bg" style="padding: 20px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <form class="form-horizontal" id="form-password" action="/action" method="post">
                                <input type="hidden" name="action" value="changepwd">
                                {{ csrf_field() }}
                                <span class="heading">修改密码</span>
                                <div class="form-group">
                                    <input type="password" name="repwd" required="" class="form-control" id="repwd" placeholder="请输入原密码">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pwd" required="" class="form-control" id="pwd" placeholder="新密码">
                                    <i class="fa fa-lock"></i><span id="pwd_tip"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pwd2" required="" class="form-control" id="pwd2" placeholder="请再次输入相同的新密码">
                                    <i class="fa fa-lock"></i><span id="pwd2_tip"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="login btn btn-default">确认修改</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
            $(function(){
                //验证密码
                $('#pwd').blur(function(){
                    var regPwd=/^[a-zA-Z0-9\.]{4,16}$/;
                    var pwd=$('#pwd').val();
                    if(regPwd.test(pwd)){
                        $('#pwd_tip').text('ok!');
                    }else if(pwd!=''){
                        $('#pwd_tip').text('密码只能是6-16位字母、数字、小数点组合。');
                    }
                })
                //验证两次密码是否一致
                $('#pwd2').blur(function(){
                    if($('#pwd').val()!=$('#pwd2').val()){
                        $('#pwd2_tip').text('密码不一致');
                        $('#sub').attr('disabled','false');
                    }else if($('#pwd').val()!=''){
                        $('#pwd2_tip').text('ok!');
                        $('#sub').removeAttr('disabled');
                    }
                })
            });
</script>
@endsection