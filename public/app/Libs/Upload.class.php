<?php
namespace App\Http\Controllers;

	class Upload{
		public $pic;
		public $path;
		public $size;
		public $type;
		public $newImg;
		public $pathInfo = array();

		function __construct($pic,$path='./upload',$size=500000,array $type=array('image/jpeg','image/png','image/gif')){

			//初始化赋值
			$this->pic = $pic;
			$this->path = rtrim($path,'/').'/';
			$this->size = $size;
			$this->type = $type;
		}
		public function do_upload(){
			if($this->fileError() !== true){
				return $this->fileError();
			}elseif($this->patternType() !== true){
				return $this->patternType();
			}elseif($this->patternSize() !== true){
				return $this->patternSize();
			}elseif($this->renameImg() !== true){
				return $this->renameImg();
			}else{
				return $this->moveImg();
			}
		}

		//1. 判断上传过程中是否有错误
		protected function fileError(){
			if($_FILES[$this->pic]['error'] > 0){
				switch($_FILES[$this->pic]['error']){
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
		protected function patternType(){
			if(!in_array($_FILES[$this->pic]['type'],$this->type)){
				return '类型不符合';
			}
			return true;
		}
		//3.验证上传文件的大小是否符合要求
		protected function patternSize(){
			if($_FILES[$this->pic]['size'] > $this->size){
				return '上传文件大小超过了预设的'.$this->size.'byte';
			}
			return true;
		}
		//4.判断上传路径和上传成功后要保存文件的新名称
		protected function renameImg(){
			if(!file_exists($this->path)){
				mkdir($this->path);
			}
			$suffix = strrchr($_FILES[$this->pic]['name'],'.');
			do{
				$this->newImg = md5(time().mt_rand(1,1000).uniqid()).$suffix;

			}while(file_exists($this->path.$this->newImg));

			return true;
		}
		protected function moveImg(){
			if(move_uploaded_file($_FILES[$this->pic]['tmp_name'],$this->path.$this->newImg)){
				$this->pathInfo['pathinfo'] = $this->path.$this->newImg;
				$this->pathInfo['name'] = $this->newImg;
				$this->pathInfo['path'] = $this->path;
				return $this->pathInfo;
			}else{
				return '位置错误，请重新上传';
			}
		}
	}
?>