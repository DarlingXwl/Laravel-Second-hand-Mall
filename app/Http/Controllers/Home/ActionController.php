<?php


namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use DB;
use Fun;
use Session;
use Catpcha;

class ActionController extends IndexController
{

// 提交处理
    public function action(Request $request){
        $all = Input::all();
        if(!isset($all['action'])){
            $all['action'] = '';
        }
        switch ($all['action']) {
            case 'register':
                $this -> validate($request,[
                    'username' => 'required|alpha_dash|min:4|max:16',
                    'pwd' => 'required|alpha_dash|min:6|max:18',
                    'pwd2' => 'required|alpha_dash|min:6|max:18'
                ]);
                $result = DB::table('user') -> where('username',$all['username']) -> get();
                if(!$result -> isEmpty()){
                     echo '<script>alert("用户名重复");location="/register"</script>';
                }else{
                    Fun::adduser($all);
                    echo '<script>alert("注册成功");location="/login"</script>';
                }
                
                return $this -> register();
                break;

            case 'changepwd':
                $this -> validate($request,[
                    'pwd' => 'required|alpha_dash|min:6|max:18',
                    'pwd2' => 'required|alpha_dash|min:6|max:18'
                ]);
                $result = DB::table('user') -> where('id',Session::get('id')) -> get() -> toArray();
                 // dd(decrypt($result[0] -> pwd));
                if(decrypt($result[0] -> pwd) == $all['repwd']){
                    $pwd = encrypt($all['pwd']);
                    $re = DB::table('user') -> where('id',Session::get('id')) -> update( ['pwd' => $pwd]);
                    // dd($re);
                    echo '<script>alert("修改成功,请重新登录");location="/login"</script>';
                }else{
                     echo '<script>alert("原密码错误");location="/changepwd"</script>';
                }
               

            case 'login':
                $this -> validate($request,[
                    'username' => 'required|alpha_dash|min:4|max:16',
                    'pwd' => 'required|alpha_dash|min:6|max:18',
                    'captcha' => 'required|size:5|captcha'
                ]);
                if(FUN::login($all)){
                    echo '<script>alert("登陆成功");location="/"</script>';
                }
                echo '<script>alert("用户名不存在或密码错误");location="/login"</script>';
                break;

            case 'car_delete':
                if(isset($all['gid'])){
                    Fun::car_delete($all['gid']);
                    echo '<script>alert("删除成功");location="/shopcar"</script>';
                }
                echo '<script>alert("删除失败");location="/shopcar"</script>';
                break;

            case 'car_add':
                if(isset($all['gid'])){
                    Fun::car_add($all['gid']);
                    echo '<script>alert("添加成功");location="/shopcar"</script>';
                }
                echo '<script>alert("添加失败");location="/shopcar"</script>';
                break;

            case 'change':
                if(Fun::change($all)){
                    echo '<script>alert("修改成功");location="/member"</script>';
                }
                echo '<script>alert("修改失败");location="/member?page=change"</script>';
                break;

            case 'sell_delete':
                if(isset($all['gid'])){
                    Fun::sell_delete($all['gid']);
                    echo '<script>alert("删除成功");location="/seller"</script>';
                }
                echo '<script>alert("删除失败");location="/seller"</script>';
                break;

            case 'sell_add':
                $user = Fun::user_info();
                if($user[0] -> address == ''){
                    echo '<script>alert("请先填写用户信息");location="/member"</script>';
                }
                if(Fun::sell_add())
                {
                    echo '<script>alert("添加成功");location="/seller"</script>';
                }
                echo '<script>alert("添加失败");location="/seller"</script>';
                break;

            case 'sell_change':
                if(Fun::sell_change())
                {
                    echo '<script>alert("修改成功");location="/seller"</script>';
                }
                echo '<script>alert("修改失败");location="/seller"</script>';
                break;

            case 'message':
                if(Fun::user_ver()){
                    $result = DB::table('message') -> insertGetId([
                        'uid'=>Session::get('id'),
                        'message' => $all['content'],
                        'email' => $all['email'],
                        'gid' => $all['gid'],
                        'time' => date('Y-m-d H:i:s'),
                        'state' => '0'
                    ]);
                    if($result){
                        echo  '<script>alert("留言成功，请耐心等待审核");location="/goods?gid='.$all['gid'].'"</script>';
                    }else{
                         echo  '<script>alert("留言失败，系统发生未知错误");location="/goods?gid='.$all['gid'].'"</script>';
                    }
                    // dd($result);
                }else{
                    echo '<script>alert("请在登陆后留言");location="/login"</script>';
                }
                break;

            case 'ajax':
                if($all['username'] != ''){
                    $result = DB::table('user')
                     -> where('username',$all['username'])
                      -> get();
                    if($result->count()){
                        echo  '1';
                    }else{
                        echo '2';
                    }
                }
                break;

            case 'addorder':
                $order = [
                    'time' => date('Y-m-d H:i:s'),
                    'state' => '1',
                    'name' => $all['name'], 
                    'address' => $all['address'],
                    'price' => $all['pirce'],
                    'gid' => $all['gid'],
                    'sid' => $all['sid'],
                    'uid' => Session::get('id'),
                    'num' => $all['num']
                ];
                $state = DB::table('goods_info') -> select('state') -> where('id',$all['gid']) ->get() -> toArray();
                if($state[0] -> state == '1'){
                    $result = DB::table('goods_order') -> insertGetId($order);
                    if($result){
                        DB::table('goods_info') -> where('id',$all['gid']) -> update(['state' => '2']);
                        echo  '<script>alert("添加订单成功，请与商家保持联系，为了您的人身安全和财务安全，交易过程留下相关证据");location="/order"</script>';
                    }
                }else{
                    echo  '<script>alert("订单添加失败，请在几分钟后重试");location="/order"</script>';
                }
                break;

            case 'changeorder':
                $order = [
                    'time' => date('Y-m-d H:i:s'),
                    'state' => '1',
                    'name' => $all['name'], 
                    'address' => $all['address'],
                    'price' => $all['pirce'],
                    'gid' => $all['gid'],
                    'sid' => $all['sid'],
                    'uid' => Session::get('id'),
                    'num' => $all['num']
                ];
                $state = DB::table('goods_info') -> select('state') -> where('id',$all['gid']) ->get() -> toArray();
                // dd($state);
                if($state[0] -> state == '2'){
                    $result = DB::table('goods_order') -> update($order);
                    // dd($result);
                    if($result){
                        DB::table('goods_info') -> where('id',$all['gid']) -> update(['state' => '2']);
                        echo  '<script>alert("修改订单成功，请与商家保持联系，为了您的人身安全和财务安全，交易过程留下相关证据");location="/order"</script>';
                    }
                }else{
                    echo  '<script>alert("订单添加失败，请在几分钟后重试");location="/order"</script>';
                }
                break;

                case 'order_re':
                    DB::table('goods_order') -> where('id',$all['id']) -> update(['state'=>'3']);
                    echo  '<script>alert("成功驳回，请耐心等待买家修改，或主动联系买家");location="/sorder"</script>';
                    break;

                case 'order_cancel':
                    // DB::table('goods_order') -> where('id',$all['id']) -> update(['state'=>'3']);
                    $goods = DB::table('goods_order') -> select('gid') -> where('id',$all['id']) ->get() -> toArray();
                    // dd($goods);
                    DB::table('goods_info') -> where('id',$goods[0] -> gid) -> update(['state'=>'1']);
                    DB::table('goods_order') -> where('id',$all['id']) -> update(['state'=>'4']);
                    if($all['user'] == 'user'){
                        echo  '<script>alert("取消成功");location="/order"</script>';
                    }else{
                        echo  '<script>alert("取消成功");location="/sorder"</script>';
                    }
                    break;

                case 'order_delete':
                    DB::table('goods_order') -> where('id',$all['id']) -> delete();
                    if($all['user'] == 'user'){
                        echo  '<script>alert("删除成功");location="/order"</script>';
                    }else{
                        echo  '<script>alert("删除成功");location="/sorder"</script>';
                    }
                    break;

                case 'order_complete':
                    DB::table('goods_order') -> where('id',$all['id']) -> update(['state'=>'2']);
                    echo  '<script>alert("恭喜你，完成一单交易");location="/order"</script>';
                    break;
  
            default:
                return $this -> index();
                break; 
        }
    }
}