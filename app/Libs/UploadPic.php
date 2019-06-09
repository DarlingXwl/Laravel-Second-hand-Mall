<?php
namespace App\Http\Controllers;

	class UploadPic{
		static public $pic;
		static public $path;
		static public $size;
		static public $type;
		static public $newImg;
		static public $pathInfo = array();

		function __construct($pic,$path='./upload',$size=500000,array $type=array('image/jpeg','image/png','image/gif')){

			//初始化赋值
			self::$pic = $pic;
			self::$path = rtrim($path,'/').'/';
			self::$size = $size;
			self::$type = $type;
			// dd($pic);
		}
		static public function do_upload(){
			if(self::fileError() !== true){
				return self::fileError();
			}elseif(self::patternType() !== true){
				return self::patternType();
			}elseif(self::patternSize() !== true){
				return self::patternSize();
			}elseif(self::renameImg() !== true){
				return self::renameImg();
			}else{
				return self::moveImg();

			}
		}

		//1. 判断上传过程中是否有错误
		static protected function fileError(){
			if($_FILES[self::$pic]['error'] > 0){
				switch($_FILES[self::$pic]['error']){
					case 1:
						return '超出了php.ini配置文件中的upload_max_fileszie设置的值';
					case 2:
						return '超过了HTML表单中设置的MAX_FILE_SIZE的值';
					case 3:
						return '只有部分文件被上传';
					case 4:
						return '没有文件上传';
					case 6:
						return '找不到临时目录';
					case 7:
						return '文件写入失败';
				}
			}
			return true;
		}
		//2.验证上传文件的类型是否符合要求
		static protected function patternType(){
			if(!in_array($_FILES[self::$pic]['type'],self::$type)){
				return '类型不符合';
			}
			return true;
		}
		//3.验证上传文件的大小是否符合要求
		static protected function patternSize(){
			if($_FILES[self::$pic]['size'] > self::$size){
				return '上传文件大小超过了预设的'.self::size.'byte';
			}
			return true;
		}
		//4.判断上传路径和上传成功后要保存文件的新名称
		static protected function renameImg(){
			if(!file_exists(self::$path)){
				// dd(self::$path);
				mkdir(self::$path);
			}
			$suffix = strrchr($_FILES[self::$pic]['name'],'.');
			do{
				self::$newImg = md5(time().mt_rand(1,1000).uniqid()).$suffix;

			}while(file_exists(self::$path.self::$newImg));

			return true;
		}
		static protected function moveImg(){
			if(move_uploaded_file($_FILES[self::$pic]['tmp_name'],self::$path.self::$newImg)){
				self::$pathInfo['pathinfo'] = self::$path.self::$newImg;
				self::$pathInfo['name'] = self::$newImg;
				self::$pathInfo['path'] = self::$path;
				return self::$pathInfo;
			}else{
				return '位置错误，请重新上传';
			}
		}
	}
?>