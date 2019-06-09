<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Upload;
use Input;
use Cache;

class FunController extends Controller
{

    /**
     * 首页商品信息获取
     * @return 首页所有分类的商品信息数组
     */
    static public function index_show(){
        if(Cache::get('index_show') == null){
            $tmp = DB::table('goods_info')
             -> orderBy('addtime','desc')
             ->where('state','1')
              -> limit('200')
               -> get();
            foreach ($tmp as $k => $v) {
                if($k <= 10){
                    $new[] = $v;
                }
                if($v->tid == 3){
                    $phone[] = $v;
                }
                if($v->tid == 2){
                    $computer[] = $v;
                }
                if($v->replace ==1){
                    $replace[] = $v;
                }
            }
            $result['new'] = isset($new)?$new:'';
            $result['phone'] = isset($phone)?$phone:'';
            $result['computer'] = isset($computer)?$computer:'';
            $result['replace'] = isset($replace)?$replace:'';
            Cache::put('index_show',$result,5);
        }
        return Cache::get('index_show');
    }

    /**
     * 获取活跃用户信息
     * @return 最新注册 的用户
     */
    static public function user_active(){
        if(Cache::get('user_active') == null){
            $tmp = DB::table('user')
             -> select('addtime','username')
              -> orderBy('addtime','desc')
               -> limit('10')
                -> get()
                 -> toArray();
            Cache::put('user_active',$tmp,5);
        }
        return Cache::get('user_active');
    }

    /**
     * 获取用户购物车商品信息
     * @param  用户id
     * @return 购物商品信息数组
     */
    static public function shopcar($id){
        $goods = DB::table('user_info')
         -> where('uid','=',$id)
          -> select('shopcar')
           -> get();
           if($goods -> isEmpty()){
                return false;
           }
           $gid = str_replace(',', "','", $goods[0] -> shopcar);
           // dd($gid);
        $tmp = DB::table('goods_info') -> whereRaw("id in('$gid')")  -> get() -> toArray();
        // dd($tmp);
        return $tmp;
    }

    /**
     * 获取用户上架商品
     * @return 用户上架商品列表
     */
    static public function seller(){
        $goods = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> select('sell')
           -> get();
        if($goods -> isEmpty()){
                return false;
        }
        $gid = str_replace(',', "','", $goods[0] -> sell);
           // dd($gid);
        $tmp = DB::table('goods_info') -> whereRaw("id in('$gid')") -> orderBy('addtime','desc') -> paginate(5);
        // dd($tmp);
        return $tmp;
    }

    /**
     * 获取目录结构
     * @param  数据表名
     * @return 分类结构二维数组
     */
    static public function class($table){
        if(Cache::get('type') == null){
            $type = DB::table($table)
             -> get()
               -> toArray();
            foreach ($type as $v) {
                if(sizeof(explode(',',$v->path)) == 2){
                    $total[$v -> id][] = $v;
                }
            }
            foreach ($type as $v){
                if(sizeof(explode(',',$v->path)) == 3){
                    $total[$v -> pid][] = $v;
                }
            }
            Cache::put('type',$total,20);
        }
        return Cache::get('type');
    }

    /**
     * 获取分类名称
     * @param  分类id
     * @return 分类名称
     */
    static public function type($tid){
        $tmp =  DB::table('goods_type')
         -> where('id',$tid)
          -> select('name')
           ->get()
            ->toArray();
        // dd($tmp);
        return $tmp;
    }

    /**
     * 获取商品信息
     * @param  商品信息表
     * @param  商品id
     * @return 商品信息数组
     */
    static public function goods_info($gid){
        $good = DB::table('goods_info');
        $tmp = $good
         -> where('id','=',$gid)
          -> get()
           -> toArray();
        return $tmp;
    }

    /**
     * 验证用户id
     * @return 返回验证结果
     */
    static public function user_ver(){
        $id = Session::get('id','0');
        $pwd = Session::get('pwd','0');
        $result = DB::table('user')
         -> where('id','=',$id)
          -> select('pwd')
           ->get();
        if(isset($result[0] -> pwd) && decrypt($result[0] -> pwd) == decrypt($pwd)){
            return true;
        }
        return false;
    }

    

    /**
     * 添加用户
     * @param  用户输入的所有数据
     * @return 返回注册结果
     */
    static public function adduser($input,$state = '1'){
        $result = DB::table('user') -> insertGetId([
            'username' => $input['username'],
            'pwd' => encrypt($input['pwd']),
            'state' => $state,
            'addtime' => time()
        ]);
        // dd($result);
		
		if($result){
			DB::table('user_info') -> insert([
				'uid' => $result,
				'username' => $input['username'],
                'addtime' => time(),
                'state' => $state,
                'pic' => 'moren.jpg'
				]);
		}
        return $result;
    }

    /**
     * 验证登陆
     * @param  用户输入数据
     * @return 返回登陆结果
     */
    static public function login($input,$admin = ''){
        if($admin == ''){
            $result = DB::table('user')
             -> select('id','pwd')
              -> where('state','1')
               -> where('username','=',$input['username'])
                -> first();
        }else{
         $result = DB::table('user')
         -> select('id','pwd')
         ->where('state',$admin)
          -> where('username','=',$input['username'])
            -> first();
        }
        
        if($result && $result -> id > 0 && $input['pwd'] == decrypt($result -> pwd)){
            Session::put('id',$result ->id);
            Session::put('pwd',encrypt($input['pwd']));
            return true;
        }
        return false;
    }

    /**
     * 用户信息
     * @param  用户信息表
     * @param  用户id
     * @return 用户信息对象
     */
    static public function user_info($id = ''){
        // dd($id);
        if($id == ''){
            $tmp = DB::table('user_info')
             -> where('uid','=',Session::get('id','0'))
              -> get() 
               -> toArray();
           }else{
            $tmp = DB::table('user_info')
             -> where('uid','=',$id)
              -> get() 
               -> toArray();
           }
        
           // dd($tmp);
        return $tmp;
    }

    /**
     * 购物车删除商品
     * @param  商品id
     * @return 删除行数
     */
    static public function car_delete($gid){
        $user = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> get()
           -> toArray();
        //dd($user)    验证查询结果
        $info = json_decode(json_encode($user[0]), true);
        //dd($info)     验证对象转换数组后的结果
        $good = array(",$gid","$gid,","$gid");
        $info['shopcar'] = str_replace($good,"",$info['shopcar']);
        //dd($info['shopcar'])  验证修被字符串剪后的购物车剩余商品id
        $result = DB::table('user_info') -> where('uid','=',Session::get('id','0')) -> update($info);
        return $result;
    }

    /**
     * 用户删除上架商品
     * @param  商品id
     * @return 删除行数
     */
    static public function sell_delete($gid){
        $pic = DB::table('goods_info')
         -> select('pic')
          -> where ('id',$gid)
           -> get()
            -> toArray();
        DB::table('goods_info')
         -> where('id',$gid)
          ->delete();
        if(is_file('upload/goods/pic/'.$pic[0] -> pic) && $pic[0]->pic != 'moren.jpg'){
            unlink('upload/goods/pic/'.$pic[0] -> pic);
        }
        $user = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> get()
           -> toArray();
        $info = json_decode(json_encode($user[0]), true);
        $good = array(",$gid","$gid,","$gid");
        $info['sell'] = str_replace($good,"",$info['sell']);
        $result = DB::table('user_info') -> where('uid','=',Session::get('id','0')) -> update($info);
        return $result;
    }


    /**
     * 添加购物车
     * @param  商品ID
     * @return 添加结果
     */
    static public function car_add($gid){
        $user = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> get()
           -> toArray();
        $info = json_decode(json_encode($user[0]), true);
        if($info['shopcar'] == ''){
            $info['shopcar'] = $gid;
        }else{
            $info['shopcar'] .= ",$gid";
        }
        $result = DB::table('user_info') -> where('uid','=',Session::get('id','0')) -> update($info);
        return $result;

    }

    /**
     * 退出登陆
     * @return 无
     */
    static public function logout(){
        if(Session::has('id')){
            Session::forget('id');
        }
        if(Session::has('pwd')){
            Session::forget('pwd');
        }
    }


    /**
     * 修改用户资料
     * @param  输入信息
     * @return 修改结果
     */
    static public function change($input){
        $info = Input::post(); 
        if(!empty($_FILES['pic']['tmp_name'])){
            $upload = new UploadPic('pic','upload/header');
            $result = $upload -> do_upload(); 
            $info['pic'] = $result['name'];
        }else{
            unset($info['pic']);
        }
        unset($info['_token']);
        $result = DB::table('user_info')
         -> where('uid','=',Session::get('id'))
          ->update($info);
        return $result;
    }

    // 添加商品
    static public function sell_add(){
        $good = Input::post();
        $good['pic'] = 'moren.jpg';
        if(!empty($_FILES['pic']['tmp_name'])){
            $upload = new UploadPic('pic','upload/goods/pic');
            $result = $upload -> do_upload(); 
            if(isset($result['name'])){
                 $good['pic'] = $result['name'];
            }
           
        }
        $good['uid'] = Session::get('id');
        $good['addtime'] = time();
        // dd(Session::all()); 
        unset($good['_token']);
        // dd($good);
        $gid = DB::table('goods_info') -> insertGetId($good);
        

        $user = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> get()
           -> toArray();
        $info = json_decode(json_encode($user[0]), true);
        if($info['sell'] == ''){
            $info['sell'] = $gid;
        }else{
            $info['sell'] .= ",$gid";
        }
        $result = DB::table('user_info') -> where('uid','=',Session::get('id','0')) -> update($info);
        // dd($result);
        return $result;
    }

    /**
     * 修改商品资料
     * @param  输入信息
     * @return 修改结果
     */
    static public function sell_change(){
        $info = Input::post(); 
        if(!empty($_FILES['pic']['tmp_name'])){
            $upload = new UploadPic('pic','upload/goods/pic');
            $result = $upload -> do_upload(); 
            $info['pic'] = $result['name'];
        }else{
            unset($info['pic']);
        }
        $id = $info['id'];
        unset($info['id']);
        unset($info['_token']);
        $result = DB::table('goods_info')
         -> where('uid','=',Session::get('id'))
          ->where('id',$id)
          ->update($info);
        return $result;
    }

    /**
     * 获取目录结构
     * @param  数据表名
     * @return 分类结构二维数组
     */
    static public function admin_class($table){
            $type = DB::table($table)
             -> get()
               -> toArray();
            foreach ($type as $v) {
                if(sizeof(explode(',',$v->path)) == 2){
                    $total[$v -> id][] = $v;
                }
            }
            foreach ($type as $v){
                if(sizeof(explode(',',$v->path)) == 3){
                    $total[$v -> pid][] = $v;
                }
            }
        return $total;
    }
}
