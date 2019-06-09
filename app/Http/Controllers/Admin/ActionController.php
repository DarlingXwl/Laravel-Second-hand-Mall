<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Fun;
use Input;
use Session;
use Catpcha;

class ActionController extends IndexController
{

    public function action(){
        if(!Fun::user_ver()){
            return $this -> login();
        }
        $all = Input::all();
        switch ($all['action']) {
            case 'delete':
                DB::table('user') -> where('id',$all['uid']) -> delete();
                DB::table('user_info') -> where('uid',$all['uid']) -> delete();
                return $this -> member();
                break;

            case 'admindelete':
                DB::table('user') -> where('id',$all['uid']) -> delete();
                DB::table('user_info') -> where('uid',$all['uid']) -> delete();
                return $this -> admin();
                break;
            
            case 'stateup':
                DB::table('user') -> where('id',$all['uid']) -> update(['state' => '1']);
                DB::table('user_info') -> where('uid',$all['uid']) -> update(['state' => '1']);
                return $this -> member();
                break;

            case 'statedown':
                DB::table('user') -> where('id',$all['uid']) -> update(['state' => '2']);
                DB::table('user_info') -> where('uid',$all['uid']) -> update(['state' => '2']);
                return $this -> member();
                break;

            case 'adminup':
                DB::table('user') -> where('id',$all['uid']) -> update(['state' => '3']);
                DB::table('user_info') -> where('uid',$all['uid']) -> update(['state' => '3']);
                return $this -> admin();
                break;

            case 'admindown':
                DB::table('user') -> where('id',$all['uid']) -> update(['state' => '4']);
                DB::table('user_info') -> where('uid',$all['uid']) -> update(['state' => '4']);
                return $this -> admin();
                break;

            case 'changepwd':
                $result = DB::table('user') -> where('id',$all['uid']) -> update(['pwd' => encrypt($all['pwd'])]);
                if($result){
                    echo '<script>alert("修改成功")</script>';
                }else{
                     echo '<script>alert("修改失败")</script>';
                }
                break;

            case 'exdown':
                DB::table('goods_info') -> where('id',$all['id']) -> update(['state' => '3']);
                return $this -> goods();
                break;

            case 'exup':
                DB::table('goods_info') -> where('id',$all['id']) -> update(['state' => '1']);
                return $this -> goods();
                break;

            case 'changegoods':
                DB::table('goods_info') -> where('id',$all['id']) -> update(['name' => $all['name'],'tid' => $all['tid']]);
                return $this -> goods();
                break;    

            case 'deletegoods':
                DB::table('goods_info') -> where('id',$all['id']) -> delete();
                return $this -> goods();
                break;

            case 'addtype':
                $input = Input::post();
                if($input['name'] != '' ){
                    unset($input['action']);
                    unset($input['_token']);
                    $input['path'] = '1';
                    $id = DB::table('goods_type') -> insertGetId($input);
                    if($input == '0'){
                        $path = $id.',';
                    }else{
                        $path = $input['pid'].','.$id.',';
                    }
                    DB::table('goods_type') -> where('id',$id) -> update(['path' => $path]);
                }

                return back();
                break;

            case 'updatetype':
                $input = Input::post();
                $id = $input['id'];
                 if($input['name'] != '' ){
                    $input['path'] = '1';
                    if($input == '0'){
                        $path = $id.',';
                    }else{
                        $path = $input['pid'].','.$id.',';
                    }
                    DB::table('goods_type')
                     -> where('id',$id)
                      -> update(['path' => $path,'name' => $input['name'],'pid' => $input['pid']]);
                }
                return back();
                break;

            case 'deletetype':
                DB::table('goods_type') -> where('id',Input::get('id')) -> delete();
                break;

            case 'addadmin':
            // dd($all);
                Fun::adduser($all,'3');
                return $this -> admin();
                break;

            case 'messpass':
                // dd(Input::all());
                $result = DB::table('message') -> where('id',Input::get('id')) -> update(['state'=>'1']);
                return $this -> message();
                break;


            case 'messdel':
                $result = DB::table('message') -> where('id',Input::get('id')) -> delete();
                return $this -> message();
                break;

            case 'delete_order':
                DB::table('goods_order') -> where('id',Input::get('id')) -> delete();
                return $this -> order();
                break;

            default:
                return $this -> index();
                break;
        }
    }

}