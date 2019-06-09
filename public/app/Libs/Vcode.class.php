<?php
namespace App\Http\Controllers;

	class Vcode{
		private $width;
		private $height;
		private $codeNum;
		private $fontFamily;
		private $image;
		private $font;
		function __construct($fontFamily='',$width=100,$height=40,$codeNum=4){
			//开启session
			session_start();
			$this->width = $width;
			$this->height = $height;
			$this->codeNum = $codeNum;
			$this->fontFamily = $fontFamily;
		}
		function __tostring(){
			$this->getCreateImg();//创建画布
			$this->setPixel();//输出干扰点
			$this->setLine();//输出干扰线
			$this->setChar();//输出文字
			$this->outputImage();//输出图像
			$_SESSION['code'] = $this->font;

			return '';
		}
		private function getCreateImg(){
			$this->image = imagecreatetruecolor($this->width,$this->height);
			$back = imagecolorallocate($this->image,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
			imagefill($this->image,0,0,$back);
			$borderColor = imagecolorallocate($this->image,255,0,0);
			imagerectangle($this->image,0,0,$this->width-1,$this->height-1,$borderColor);

		}
		private function setPixel(){
			for ($i=0; $i < 300; $i++) {
				$pixelColor = imagecolorallocate($this->image,mt_rand(150,200),mt_rand(150,200),mt_rand(150,200));
				imagesetpixel($this->image,mt_rand(2,$this->width-2),mt_rand(2,$this->height-2),$pixelColor);
			}
		}
		private function setLine(){
			for ($i=0; $i < 10; $i++) {
				$lineColor = imagecolorallocate($this->image,mt_rand(120,150),mt_rand(120,150),mt_rand(120,150));
				imageline($this->image,mt_rand(2,$this->width-2),mt_rand(2,$this->height-2),mt_rand(2,$this->width-2),mt_rand(2,$this->height-2),$lineColor);
			}
		}
		private function setChar(){
			$str = '3456789ABCDEFGHJKLMNPQRSTUVWXYabcdefghijkmnpqrstuvwxyz';
			for($i=0;$i<$this->codeNum;$i++){
				$this->font.=$str{mt_rand(0,strlen($str)-1)};
			}
			if($this->fontFamily == ''){
				for($i=0;$i<strlen($this->font);$i++){
					$fontColor = imagecolorallocate($this->image,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
					$x = $this->width/$this->codeNum*$i+mt_rand(3,8);
					$y = mt_rand(10,$this->height/2);
					imagechar($this->image,mt_rand(3,5),$x,$y,$this->font{$i},$fontColor);
				}
			}else{
				for($i=0;$i<strlen($this->font);$i++){
					$fontColor = imagecolorallocate($this->image,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
					$x = $this->width/$this->codeNum * $i + mt_rand(5,8);
					$y = mt_rand($this->height/2,$this->height);
					imagettftext($this->image,mt_rand($this->height/3,$this->height/2),mt_rand(0,45),$x,$y,$fontColor,$this->fontFamily,$this->font{$i});
				}
			}

		}
		private function outputImage(){
			header('Content-type:image/jpeg');
			imagejpeg($this->image);
		}
		function __destruct(){
			imagedestroy($this->image);
		}
	}

	//echo new Vcode('./xiaomi.ttf');
?>