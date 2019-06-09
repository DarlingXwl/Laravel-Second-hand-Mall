<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Fun;
use Input;
use Session;
use Catpcha;

class IndexController extends Controller
{
    //
    // 登陆
    public function login(){
        return view('Admin/login');
    }

    public function check(Request $request){
        $this -> validate($request,[
            'username' => 'required|min:2|max:20',
            'pwd' => 'required|min:6', 
            'captcha' => 'required|size:5|captcha'
        ]);
        // dd(Input::all());
        if(Fun::login(Input::all(),'3')){
            $user = Fun::user_info();
            $username = Input::get('username');
            echo '<script>alert("登陆成功");location="/admin/index"</script>';
        }else{
            echo '<script>alert("登陆失败");location="/admin/login"</script>';
        }
    }

    public function index(){
        if(Fun::user_ver()){
            $user = Fun::user_info();
            return view('/Admin/index',compact('user'));
        }else{
            $this -> login();
        }
        
    }

    public function welcome(){
        return view('Admin/welcome');
    }

    public function logout(){
        Fun::logout();
        return  $this -> login();
    }

    public function member(){
        $user = DB::table('user_info')->where('state','1') ->orwhere('state','2') -> paginate(15);
        // dd($user);
        return view('/Admin/member',compact('user'));
    }

    public function changepwd(){
        $username = Input::get('username');
        $uid = Input::get('uid');
        return view('/Admin/changepwd',compact('username','uid'));
    }

    public function admin(){
        $user = DB::table('user_info')->where('state','3') -> orWhere('state','4') -> paginate(15);
        return view('/Admin/admin',compact('user'));
    }

    public function goods(){
        $goods = DB::table('goods_info') -> orderBy('addtime','desc') -> paginate(15);
        return view('/Admin/goods',compact('goods'));
    }

    public function changegoods(){
        $goods = DB::table('goods_info') -> where('id',Input::get('id')) -> paginate(15);
        // dd($goods);
        $type = Fun::class('goods_type');
        return view('/Admin/changegoods',compact('goods','type'));
    }

    public function class(){
        $type = Fun::admin_class('goods_type');
        // dd($type);
        return view('/Admin/class',compact('type'));
    }

    public function changeclass(){
        $types = Fun::class('goods_type');
        $type = '';
        if(null != Input::get('id')){
            $type = DB::table('goods_type') -> where('id',Input::get('id')) ->get() -> toArray();
        }
        return view('/Admin/changeclass',compact('type','types'));
    }

    public function addadmin(){
        return view('/Admin/addadmin');
    }

    public function message(){
        $message =DB::table('message') -> orderBy('time','desc') -> get() -> toArray();
        return view('/Admin/message',compact('message'));
    }

    public function order(){
        $order =DB::table('goods_order') -> orderBy('time','desc') ->  paginate(15);
        return view('/Admin/order',compact('order'));
    }
}
