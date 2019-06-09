<?php


namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use DB;
use Fun;
use Session;

class GoodsController extends IndexController
{
//分类管理
    public function class(){
        if(!isset($_GET['page'])){
            $_GET['page'] = '1';
        }
        $title = '乐优达：全部商品';
        $logo = 'none';
        if(Fun::user_ver()){
            $logged = '';
            $nologged = 'none';
            $shopcar = Fun::shopcar(Session::get('id','0'));
        }else{
            $logged = 'none';
            $nologged = '';
            $shopcar = '';
        }
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:'';
        $sort = isset($_GET['sort'])?$_GET['sort']:'';
        $tid = isset($_GET['tid'])?$_GET['tid']:'';
        $search = isset($_GET['search'])?$_GET['search']:'';
        $url = '?orderby='.$orderby.'&sort='.$sort.'&tid='.$tid.'&search='.$search;
        //商品分级目录结构
        $type = Fun::class('goods_type');

        $good = DB::table('goods_info');
        if($tid != ''){
            $tmp = $good  -> where('state','1') -> where('tid','=',$tid) ->get();
        }
        if($search != ''){
            $uid = DB::table('user_info') -> select('sell') -> where('address','like','%'.$search.'%') -> get() -> toArray();
            $gid = 0;
            // dd($tmp);   
            if(isset($uid[0])){
                foreach ($uid as $v) {
                    if($v-> sell != ''){
                        $sell = str_replace(',', "','", $v -> sell);
                        $gid .= "','".$sell;
                    }
                    
                }
            }
            $tmp = $good  -> where('state','1') -> whereRaw("id in('$gid')") -> orWhere('name','like','%'.$search.'%') ->get();
            // dd($tmp);
            
        }

            switch ($orderby) {
                case 'new':
                if($sort == '' || $sort == 'new'){
                    $page = $good  -> where('state','1')
                     -> orderBy('addtime','desc')
                       -> paginate(9);
                }elseif($sort == 'desc'){
                    $page = $good  -> where('state','1')
                     -> orderBy('addtime','desc')
                      -> orderby('price','desc')
                       -> paginate(9);
                }else{
                    $page = $good  -> where('state','1')
                     -> orderBy('addtime','desc')
                      -> orderby('price','asc')
                       -> paginate(9);
                }
                break;

                case 'replace':
                    if($sort == '' || $sort == 'new'){
                        $page = $good  -> where('state','1')
                         -> where('replace','=','1')
                          -> paginate(9);
                    }elseif($sort == 'desc'){
                        $page = $good  -> where('state','1')
                         -> where('replace','=','1')
                          -> orderby('price','desc')
                           -> paginate(9);
                        // dd($page);
                    }else{
                        $page = $good  -> where('state','1')
                         -> where('replace','=','1')
                          -> orderby('price','asc')
                           -> paginate(9);
                    }
                    break;

                default:
                    if($sort == '' || $sort == 'new'){
                        $page = $good  -> where('state','1')
                          -> paginate(9);
                    }elseif($sort == 'desc'){
                        $page = $good  -> where('state','1')
                          -> orderby('price','desc')
                           -> paginate(9);
                        // dd($page);
                    }else{
                        $page = $good  -> where('state','1')
                          -> orderby('price','asc')
                           -> paginate(9);
                    }
                    break;
            }
            
            $page->setPath('/class'.$url);
            // dd($page);
            foreach ($page as $v) {
                $all[] = $v;
            }
            if(isset($all)){
                $goods = $all;
            }else{
                $goods = false;
            }
            
       // dd($goods);
        return view('Home/goods/class',compact('title','logo','logged','type','goods','url','nologged','shopcar','page','orderby','sort','tid'));
    }

    //商家
    public function seller(){
        $title = '乐优达：卖家中心';
        $logo = '';
        $logged ='';
        $nologged = 'none';
        $sell = Fun::seller();
        $shopcar = Fun::shopcar(Session::get('id','0'));
        return view('Home/seller/seller',compact('title','logo','logged','nologged','sell','shopcar'));
    }

    //添加新商品
    public function addsell(){
        $title = '乐优达：添加新商品';
        $logo = '';
        $logged ='';
        $nologged = 'none';
        $type = Fun::class('goods_type');
        $shopcar = Fun::shopcar(Session::get('id','0'));
        $info = DB::table('user_info') -> where('uid',Session::get('id')) -> get() ->toArray();
        // dd($type);
        return view('Home/seller/addsell',compact('title','logo','logged','nologged','type','shopcar','info'));
    }

    

    

    // 商品详情页
    public function goods(){
        $title = '乐优达商品详情';
        $logo = '';
        $gid = isset($_GET['gid'])?$_GET['gid']:'';
        if($gid == ''){
            return $this -> index();
        }
        if(Fun::user_ver()){

            $logged = '';
            $nologged = 'none';
            $shopcar = Fun::shopcar(Session::get('id','0'));
            $message = DB::table('message') -> where('state','1') -> where('gid',$gid) -> orderBy('time','desc') -> paginate(5);
            if($message -> isEmpty()){
                $message = '';
            }   
        }else{
            $logged = 'none';
            $nologged = '';
            $shopcar = '';
            $message = '';
        }
        // dd($message);
        $title = '商品详情';
        $info = Fun::goods_info($gid);
        
        if(empty($info)){
            echo '<script>alert("商品不存在");location="/class"</script>';
        }
        $user = Fun::user_info($info[0] -> uid);
        $type = Fun::type($info[0] -> tid);
        // dd($user);
        return view('Home/goods/goods',compact('title','logo','logged','info','nologged','shopcar','user','type','message'));
    }


    // 购物车
    public function shopcar(){
        $title = '乐优达：购物车';
        $logo = '';
        $logged ='';
        $nologged = 'none';
        // $shopcar = Fun::shopcar(Session::get('id','0'));
        $goods = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> select('shopcar')
           -> get();
           if($goods -> isEmpty()){
                $shopcar = '';
           }else{
            $gid = str_replace(',', "','", $goods[0] -> shopcar);
           // dd($gid);
            $shopcar = DB::table('goods_info') -> whereRaw("id in('$gid')") -> get() ->toArray();
            // dd($shopcar);
        }
           
        return view('Home/shopcar',compact('title','logo','logged','nologged','shopcar'));
    }

    //买家订单
    public function order(){
        $title = '乐优达：买家订单管理';
        $logo = '';
        $logged ='';
        $nologged = 'none';
        $goods = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> select('shopcar')
           -> get();
        if($goods -> isEmpty()){
            $shopcar = '';
        }else{
            $gid = str_replace(',', "','", $goods[0] -> shopcar);
            $shopcar = DB::table('goods_info') -> whereRaw("id in('$gid')") -> get() ->toArray();
        }

        $order = DB::table('goods_order') -> where('uid',Session::get('id')) -> get() -> toArray();
        return view('Home/order/order',compact('title','logo','logged','nologged','shopcar','order'));
    }

    //卖家订单页
    public function sorder(){
        $title = '乐优达：卖家订单管理';
        $logo = '';
        $logged ='';
        $nologged = 'none';
        $goods = DB::table('user_info')
         -> where('uid','=',Session::get('id','0'))
          -> select('shopcar')
           -> get();
        if($goods -> isEmpty()){
            $shopcar = '';
        }else{
            $gid = str_replace(',', "','", $goods[0] -> shopcar);
            $shopcar = DB::table('goods_info') -> whereRaw("id in('$gid')") -> get() ->toArray();
        }

        $order = DB::table('goods_order') -> where('sid','=',Session::get('id')) -> get() -> toArray();
        // dd($order);
        return view('Home/order/sorder',compact('title','logo','logged','nologged','shopcar','order'));
    }

    // 添加订单
    public function addorder(){
        $title = '乐优达商品详情';
        $logo = '';
        $gid = isset($_GET['gid'])?$_GET['gid']:'';
        if($gid == ''){
            return $this -> index();
        }
        if(Fun::user_ver()){

            $logged = '';
            $nologged = 'none';
            $shopcar = Fun::shopcar(Session::get('id','0'));  
        }else{
            $logged = 'none';
            $nologged = '';
            $shopcar = '';
        }
        $title = '乐优达：添加商品';
        $info = Fun::goods_info($gid);
        
        if(empty($info)){
            echo '<script>alert("商品不存在");location="/class"</script>';
        }
        $user = Fun::user_info($info[0] -> uid);
        return view('Home/order/addorder',compact('title','logo','logged','info','nologged','shopcar','user','message'));
    }

    // 修改订单
    public function changeorder(){
        $logo = '';
        $gid = isset($_GET['gid'])?$_GET['gid']:'';
        if($gid == ''){
            return $this -> index();
        }
        if(Fun::user_ver()){

            $logged = '';
            $nologged = 'none';
            $shopcar = Fun::shopcar(Session::get('id','0'));  
        }else{
            $logged = 'none';
            $nologged = '';
            $shopcar = '';
        }
        $title = '乐优达：修改订单';
        $info = Fun::goods_info($gid);
        
        if(empty($info)){
            echo '<script>alert("商品不存在");location="/class"</script>';
        }
        $order = DB::table('goods_order') -> where('id',Input::get('id')) -> get() -> toArray();
        // dd($order);
        $user = Fun::user_info($info[0] -> uid);
        return view('Home/order/changeorder',compact('title','logo','logged','info','nologged','shopcar','user','message','order'));
    }


}