<?php


namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use DB;
use Fun;
use Session;
use Catpcha;

class IndexController extends Controller
{

    //主页
    public function index(){
        $title = '乐优达:乐享优品,生活达人!';
        $logo = '';
        $index = Fun::index_show();
        $user = Fun::user_active();
        if(Fun::user_ver()){
            $logged = '';
            $nologged = 'none';
            $shopcar = Fun::shopcar(Session::get('id','0'));
        }else{
            $logged = 'none';
            $nologged = '';
            $shopcar = '';
        }
        // dd(Fun::goods());
        return view('Home/index',compact('title','logo','logged','index','nologged','user','shopcar'));
    }

    

    // 登陆页面
    public function login(){
        Fun::logout();
        $title = '乐优达：登陆';
        $logo = '';
        $logged ='none';
        $nologged = '';
        // dd(new Vcode());
        $shopcar ='';
        return view('Home/login',compact('title','logo','logged','nologged','shopcar'));
    }

    // 用户注册
    public function register(){
        Fun::logout();
        $title = '欢迎加入乐优达';
        $logo = '';
        $logged ='none';
        $nologged = '';
        $shopcar ='';
        return view('Home/register',compact('title','logo','logged','nologged','shopcar'));
    }

    // 个人中心
    public function member(){
        $title = '欢迎加入乐优达';
        $logo = '';
        $logged ='';
        $member = array('','active');
        $change = array('none','');
        $nologged = 'none';
        if(Fun::user_ver()){
            $logged = '';
            $nologged = 'none';
            $shopcar = Fun::shopcar(Session::get('id','0'));
        }else{
            return $this -> login();
        }
        $info = Fun::user_info(Session::get('id'));
        // dd($info);
        if(Input::get('page','0') == 'change'){
            $change = array('','active');
            $member = array('none','');
        }
        return view('Home/member',compact('title','logo','logged','nologged','info','shopcar','change','member'));
    }

    public function changepwd(){
        $title = '乐优达：修改密码';
        $logo = '';
        $logged ='';
        $member = array('','active');
        $change = array('none','');
        $nologged = 'none';
        if(Fun::user_ver()){
            $logged = '';
            $nologged = 'none';
            $shopcar = Fun::shopcar(Session::get('id','0'));
        }else{
            return $this -> login();
        }
        $info = Fun::user_info(Session::get('id'));
        // dd($info);
        if(Input::get('page','0') == 'change'){
            $change = array('','active');
            $member = array('none','');
        }
        return view('Home/changepwd',compact('title','logo','logged','nologged','info','shopcar','change','member'));
    }


    //修改商品
    public function changesell(){
        $title = '乐优达：修改商品信息';
        $logo = '';
        $logged ='';
        $nologged = 'none';
        if(Fun::user_ver()){
            $logged = '';
            $nologged = 'none';
            $sell = Fun::goods_info(Input::get('gid'));
            $shopcar = Fun::shopcar(Session::get('id','0'));
            if($sell[0] -> uid != Session::get('id')){
                echo '<script>alert("他人之物，不可侵犯");location="/seller"</script>';
            }
        }else{
            return $this -> login();
        }
        // dd($sell);
        $type = Fun::class('goods_type');
        return view('Home/seller/changesell',compact('title','logo','logged','nologged','sell','type','shopcar'));
    }

}
