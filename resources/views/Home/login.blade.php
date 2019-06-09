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
        .catp{
            width: 50%;
            display: inline;
        }
        .form-group>img{
            width: 30%;
            display: inline-block;
        }
    </style>
</head>
        <div class="demo form-bg" style="padding: 20px 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <form class="form-horizontal" action="/action" methob="post">
                                <input type="hidden" name="action" value="login">
                                {{ csrf_field() }}
                                <span class="heading">用户登录</span>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" required="" id="username" placeholder="用户名或电子邮件">
                                    <i class="fa fa-user"></i>
                                    @if($errors->has('username'))
                                    <div class="col-md-12">
                                        <p class="text-danger text-left"><strong>{{$errors->first('username')}}</strong></p>
                                    </div>
                                @endif
                                </div>

                                <div id="Info">
                                    
                                </div>
                                
                                <div class="form-group help">
                                    <input type="password" name="pwd" class="form-control" required="" id="inputPassword3" placeholder="密　码">
                                    <i class="fa fa-lock"></i>
                                </div>
                                @if($errors->has('pwd'))
                                    <div class="col-md-12">
                                        <p class="text-danger text-left"><strong>{{$errors->first('pwd')}}</strong></p>
                                    </div>
                                @endif
                                <div class="form-group help">
                                    <input type="text" name="captcha" class="form-control catp" required="" placeholder="验证码">
                                    <img src="{{captcha_src('inverse')}}" alt="">
                                </div>
                                @if($errors->has('captcha'))
                                    <div class="col-md-12">
                                        <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <button type="submit" class="login btn btn-default">登录</button>
                                    <a href="/register" class="btn btn-default new">注册新会员</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
    $(function (){

        var src = $('.form-group>img').attr('src');
        $('.form-group>img').click(function (){
            $('.form-group>img').attr('src',src+'&_='+Math.random());
        });
    
        // $("#username").blur(function(){  
        //     $.ajax({
        //         type:"GET",
        //         url:"http://leyouda.cc/action",
        //         data:"action=ajax&_token=&username="+$("#username").val(); 
        //         beforeSend:function(msg) {                     
        //             $("#Info").text("正在查询..."); 
        //             alert("添加成功"); 
        //         },
        //         success:function(msg){             
        //             if(msg==1){                   
        //                $("#Info").html("改用户名已经存在");   
        //             }else if(msg==0){
        //                $("#Info").html("改用户名可用");
        //             }     
        //         }
        //     })
        // });
    });
</script>
@endsection

<?php
    class Test
    {
        public $str1 = 'one';
        private $str2 = 'two';
        public $str3 = 'three';
        public $str4 = 'four';
        /**
         * 获取所有内部公有属性变量
         * @return 内部共有属性‘变量名=>值’的数组
         */
        public function publics(){
            $array = [];
            $this_tmp = new ReflectionClass($this);;
            $var_public = $this_tmp->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach ($var_public as $v) {
                $name_tmp = $v -> name;
                $array[$name_tmp] = $this -> $name_tmp; 
            }
            return $array;
        }
    }
    echo '<hr><hr><hr><hr><hr><hr><hr><hr><hr>';
    $Test = new Test;
    $array = $Test -> publics();
    print_r($array);
?>

'/^\$\d+.*\d*+$/'
注：PHP使用双引号会解析$*为变量


    class Test
    {
        public $str1 = 'one';
        private $str2 = 'two';
        public $str3 = 'three';
        public $str4 = 'four';
        /**
         * 获取所有内部公有属性变量
         * @return 内部共有属性‘变量名=>值’的数组
         */
        public function publics(){
            $array = [];
            $this_tmp = new ReflectionClass($this);;
            $var_public = $this_tmp->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach ($var_public as $v) {
                $name_tmp = $v -> name;
                $array[$name_tmp] = $this -> $name_tmp; 
            }
            return $array;
        }
    }
    echo '<hr><hr><hr><hr><hr><hr><hr><hr><hr>';
    $Test = new Test;
    $array = $Test -> publics();
    print_r($array);
    测试结果   
    Array ( [str1] => one [str3] => three [str4] => four )