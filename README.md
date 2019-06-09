
1	安装环境要求
PHP>7.1.0
PHP OpenSSL 扩展
PHP PDO 扩展
PHP Mbstring 扩展
PHP Tokenizer 扩展
PHP XML 扩展

2	安装方式
2.1	移动目录
Windows使用wamp或phpstudy类似的集成环境，将整个shop目录复制到web网站根目录下。
wamp和phpstudy根目录皆为程序安装目录下的www目录。

Linux用户的lamp组合将shop目录复制到/var/www/html目录下，并设置Selinux和防火墙。

2.2	数据库迁移
打开MySQL控制台，执行以下命令
//创建数据库
CREATE database shop;
	//使用数据库
USE shop;
	//恢复所有数据
SOURCE 文件绝对路径/shop.sql;

	修改/shop/.env文件
DB_CONNECTION=mysql
DB_HOST=localhost  //服务器域名（IP）
DB_PORT=3306		//默认端口号（默认情况下不要修改）
DB_DATABASE=shop	//数据库名称（直接使用SHOP）
DB_USERNAME=root  //MYSQL用户
DB_PASSWORD=		//MYSQL密码

3	虚拟主机
由于laravel路由的原因，该系统必须使用虚拟主机才能拥有更好的体验。
1)	Wamp及phpstudy修改\apache\apache2.4.37\conf\extra下的httpd-vhosts.conf文件（也可以新建），修改内容为：

<VirtualHost *:80>
  ServerName www.leyouda.cc
  ServerAlias leyouda.cc
  DocumentRoot "目录所在位置\shop\public"
  <Directory "目录所在位置\shop\public">
    Options +Indexes
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>


2)	检查\apache\apache2.4.37\conf\httpd.conf是否包含了虚拟主机文件，没有包含的需要手动包含修改完成后重启apache服务器。


# Virtual hosts
Include conf/extra/httpd-vhosts.conf

3)	修改hosts文件
Hosts文件位于C:\Windows\System32\drivers\etc，将其复制到任意位置(除windows目录)后添加一下内容：

127.0.0.1 www.leyouda.cc
127.0.0.1 leyouda.cc

保存文件，并覆盖源目录的中的hosts文件。

4	测试运行
前台：域名/
 

后台访问：域名/ admin/public
 

前台账户 密码
123456  123465
234567  234567
345678  345678

后台账户：111413 密码 123123

