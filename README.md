
</head>

<body lang=ZH-CN style='tab-interval:21.0pt;text-justify-trim:punctuation'>

<div class=WordSection1 style='layout-grid:15.6pt'>

<h1 align=center style='text-align:center'>乐优达<span lang=EN-US>O2O</span>二手商城系统安装教程</h1>

<h2 style='margin-left:21.25pt;text-indent:-21.25pt;mso-list:l0 level1 lfo1'><![if !supportLists]><span
lang=EN-US style='mso-fareast-font-family:"等线 Light";mso-fareast-theme-font:
major-latin;mso-bidi-font-family:"等线 Light";mso-bidi-theme-font:major-latin'><span
style='mso-list:Ignore'>1<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]>安装环境要求</h2>

<p class=MsoNormal style='margin-left:10.5pt;mso-para-margin-left:1.0gd'><span
lang=EN-US>PHP&gt;7.0.0(</span>建议大于<span lang=EN-US>7.1)</span></p>

<p class=MsoNormal style='margin-left:10.5pt;mso-para-margin-left:1.0gd'><span
lang=EN-US>PHP OpenSSL </span>扩展</p>

<p class=MsoNormal style='margin-left:10.5pt;mso-para-margin-left:1.0gd'><span
lang=EN-US>PHP PDO </span>扩展</p>

<p class=MsoNormal style='margin-left:10.5pt;mso-para-margin-left:1.0gd'><span
lang=EN-US>PHP Mbstring </span>扩展</p>

<p class=MsoNormal style='margin-left:10.5pt;mso-para-margin-left:1.0gd'><span
lang=EN-US>PHP Tokenizer </span>扩展</p>

<p class=MsoNormal style='margin-left:10.5pt;mso-para-margin-left:1.0gd'><span
lang=EN-US>PHP XML </span>扩展</p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<h2 style='margin-left:21.25pt;text-indent:-21.25pt;mso-list:l0 level1 lfo1'><![if !supportLists]><span
lang=EN-US style='mso-fareast-font-family:"等线 Light";mso-fareast-theme-font:
major-latin;mso-bidi-font-family:"等线 Light";mso-bidi-theme-font:major-latin'><span
style='mso-list:Ignore'>2<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]>安装方式</h2>

<h3 style='margin-left:49.6pt;text-indent:-1.0cm;mso-list:l2 level2 lfo3'><![if !supportLists]><span
lang=EN-US style='font-size:14.0pt;line-height:173%;mso-fareast-font-family:
等线;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:等线;mso-bidi-theme-font:
minor-latin;font-weight:normal;mso-bidi-font-weight:bold'><span
style='mso-list:Ignore'>2.1<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:14.0pt;line-height:173%;
font-weight:normal;mso-bidi-font-weight:bold'>移动目录<span lang=EN-US><o:p></o:p></span></span></h3>

<p class=MsoNormal style='text-indent:21.0pt'><b style='mso-bidi-font-weight:
normal'><span lang=EN-US>Windows</span></b>使用<span lang=EN-US>wamp</span>或<span
lang=EN-US>phpstudy</span>类似的集成环境，将整个<b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='color:red'>shop</span><span style='color:red'>目录复制</span></b>到<span
lang=EN-US>web</span>网站根目录下。</p>

<p class=MsoNormal style='text-indent:21.0pt'><span lang=EN-US>wamp</span>和<span
lang=EN-US>phpstudy</span>根目录皆为程序安装目录下的<b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='color:red'>www</span><span style='color:red'>目录</span></b>。</p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:21.0pt'><b style='mso-bidi-font-weight:
normal'><span lang=EN-US>Linux</span></b>用户的<span lang=EN-US>lamp</span>组合将<b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>shop</span><span
style='color:red'>目录复制到<span lang=EN-US>/var/www/html</span>目录下</span></b>，并设置<span
lang=EN-US>Selinux</span>和防火墙。</p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<h3 style='margin-left:49.6pt;text-indent:-1.0cm;mso-list:l2 level2 lfo3'><![if !supportLists]><span
lang=EN-US style='font-size:14.0pt;line-height:173%;mso-fareast-font-family:
等线;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:等线;mso-bidi-theme-font:
minor-latin;font-weight:normal;mso-bidi-font-weight:bold'><span
style='mso-list:Ignore'>2.2<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span style='font-size:14.0pt;line-height:173%;
font-weight:normal;mso-bidi-font-weight:bold'>数据库迁移<span lang=EN-US><o:p></o:p></span></span></h3>

<p class=MsoNormal style='text-indent:21.0pt'>打开<span lang=EN-US>MySQL</span>控制台，执行以下命令</p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd;
text-indent:21.0pt'><span class=MsoSubtleReference><span lang=EN-US
style='font-variant:normal !important;text-transform:uppercase'>//</span></span><span
class=MsoSubtleReference><span style='font-variant:normal !important;
text-transform:uppercase'>创建数据库<span lang=EN-US><o:p></o:p></span></span></span></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>CREATE database
shop;<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
class=MsoSubtleReference><span lang=EN-US style='font-variant:normal !important;
text-transform:uppercase'><span style='mso-tab-count:1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>//</span></span><span
class=MsoSubtleReference><span style='font-variant:normal !important;
text-transform:uppercase'>使用数据库<span lang=EN-US><o:p></o:p></span></span></span></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>USE
shop;<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
class=MsoSubtleReference><span lang=EN-US style='font-variant:normal !important;
text-transform:uppercase'><span style='mso-tab-count:1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>//</span></span><span
class=MsoSubtleReference><span style='font-variant:normal !important;
text-transform:uppercase'>恢复所有数据<span lang=EN-US><o:p></o:p></span></span></span></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>SOURCE </span><span
style='color:red'>文件绝对路径<span lang=EN-US>/shop.sql;</span></span></b></p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US><span style='mso-tab-count:1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>修改<span
lang=EN-US>/shop/.env</span>文件</p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>DB_CONNECTION=mysql<o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>DB_HOST=localhost<span
style='mso-spacerun:yes'>&nbsp; </span></span></b><span
class=MsoSubtleReference><span lang=EN-US style='font-variant:normal !important;
text-transform:uppercase'>//</span></span><span class=MsoSubtleReference><span
style='font-variant:normal !important;text-transform:uppercase'>服务器域名（<span
lang=EN-US>IP</span>）</span></span><b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='color:red'><o:p></o:p></span></b></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>DB_PORT=3306<span
style='mso-tab-count:2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b><span
class=MsoSubtleReference><span lang=EN-US style='font-variant:normal !important;
text-transform:uppercase'>//</span></span><span class=MsoSubtleReference><span
style='font-variant:normal !important;text-transform:uppercase'>默认端口号（默认情况下不要修改）<span
lang=EN-US><o:p></o:p></span></span></span></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>DB_DATABASE=shop<span
style='mso-tab-count:1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b><span
class=MsoSubtleReference><span lang=EN-US style='font-variant:normal !important;
text-transform:uppercase'>//</span></span><span class=MsoSubtleReference><span
style='font-variant:normal !important;text-transform:uppercase'>数据库名称（直接使用<span
lang=EN-US>shop</span>）<span lang=EN-US><o:p></o:p></span></span></span></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>DB_USERNAME=root<span
style='mso-spacerun:yes'>&nbsp; </span></span></b><span
class=MsoSubtleReference><span lang=EN-US style='font-variant:normal !important;
text-transform:uppercase'>//MySQL</span></span><span class=MsoSubtleReference><span
style='font-variant:normal !important;text-transform:uppercase'>用户<span
lang=EN-US><o:p></o:p></span></span></span></p>

<p class=MsoNormal style='margin-left:52.5pt;mso-para-margin-left:5.0gd'><b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>DB_PASSWORD=<span
style='mso-tab-count:2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b><span
class=MsoSubtleReference><span lang=EN-US style='font-variant:normal !important;
text-transform:uppercase'>//MySQL</span></span><span class=MsoSubtleReference><span
style='font-variant:normal !important;text-transform:uppercase'>密码<span
lang=EN-US><o:p></o:p></span></span></span></p>

<p class=MsoNormal><span class=MsoSubtleReference><span lang=EN-US
style='font-variant:normal !important;text-transform:uppercase'><o:p>&nbsp;</o:p></span></span></p>

<h2 style='margin-left:21.25pt;text-indent:-21.25pt;mso-list:l0 level1 lfo1'><![if !supportLists]><span
lang=EN-US style='mso-fareast-font-family:"等线 Light";mso-fareast-theme-font:
major-latin;mso-bidi-font-family:"等线 Light";mso-bidi-theme-font:major-latin'><span
style='mso-list:Ignore'>3<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]>虚拟主机</h2>

<p class=MsoNormal style='text-indent:21.0pt'>由于<span lang=EN-US>laravel</span>路由的原因，该系统必须使用虚拟主机才能拥有更好的体验。</p>

<p class=MsoListParagraph style='margin-left:.3pt;mso-para-margin-left:.03gd;
mso-list:l1 level1 lfo4'><![if !supportLists]><span lang=EN-US
style='mso-fareast-font-family:等线;mso-fareast-theme-font:minor-latin;
mso-bidi-font-family:等线;mso-bidi-theme-font:minor-latin'><span
style='mso-list:Ignore'>1)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]><span lang=EN-US>Wamp</span>及<span lang=EN-US>phpstudy</span>修改<b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>\apache\apache2.4.37\conf\extra</span></b>下的<b
style='mso-bidi-font-weight:normal'><span lang=EN-US style='color:red'>httpd-vhosts.conf</span></b>文件（也可以新建），修改内容为：</p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US>&lt;VirtualHost *:80&gt;</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp; </span>ServerName <b
style='mso-bidi-font-weight:normal'>www.leyouda.cc<o:p></o:p></b></span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp; </span>ServerAlias <b
style='mso-bidi-font-weight:normal'>leyouda.cc<o:p></o:p></b></span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp; </span>DocumentRoot &quot;</span><b
style='mso-bidi-font-weight:normal'><span style='color:red'>目录所在位置<span
lang=EN-US>\shop\public</span></span></b><span lang=EN-US>&quot;</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp; </span>&lt;Directory &quot;</span><b
style='mso-bidi-font-weight:normal'><span style='color:red'>目录所在位置<span
lang=EN-US>\shop\public</span></span></b><span lang=EN-US>&quot;&gt;</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span>Options
+Indexes</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;
</span>AllowOverride All</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span>Require
local</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><span style='mso-spacerun:yes'>&nbsp; </span>&lt;/Directory&gt;</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US>&lt;/VirtualHost&gt;</span></p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin-left:.3pt;mso-para-margin-left:.03gd;
mso-list:l1 level1 lfo4'><![if !supportLists]><span lang=EN-US
style='mso-fareast-font-family:等线;mso-fareast-theme-font:minor-latin;
mso-bidi-font-family:等线;mso-bidi-theme-font:minor-latin'><span
style='mso-list:Ignore'>2)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]>检查<b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='color:red'>\apache\apache2.4.37\conf\httpd.conf</span></b>是否包含了虚拟主机文件，没有包含的需要手动包含修改完成后重启<span
lang=EN-US>apache</span>服务器。</p>

<p class=MsoNormal style='text-indent:21.0pt;mso-char-indent-count:2.0'><span
lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US># Virtual hosts</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US>Include conf/extra/httpd-vhosts.conf</span></p>

<p class=MsoNormal style='margin-left:21.0pt;mso-para-margin-left:2.0gd'><span
lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoListParagraph style='margin-left:.3pt;mso-para-margin-left:.03gd;
mso-list:l1 level1 lfo4'><![if !supportLists]><span lang=EN-US
style='mso-fareast-font-family:等线;mso-fareast-theme-font:minor-latin;
mso-bidi-font-family:等线;mso-bidi-theme-font:minor-latin'><span
style='mso-list:Ignore'>3)<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]>修改<span lang=EN-US>hosts</span>文件</p>

<p class=MsoNormal style='text-indent:21.0pt;mso-char-indent-count:2.0'><span
lang=EN-US>Hosts</span>文件位于<b style='mso-bidi-font-weight:normal'><span
lang=EN-US style='color:red'>C:\Windows\System32\drivers\etc</span></b>，将其复制到任意位置<span
lang=EN-US>(</span>除<span lang=EN-US>windows</span>目录<span lang=EN-US>)</span>后添加一下内容：</p>

<p class=MsoNormal style='text-indent:21.0pt;mso-char-indent-count:2.0'><span
lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:21.0pt;mso-char-indent-count:2.0'><span
lang=EN-US>127.0.0.1 www.leyouda.cc</span></p>

<p class=MsoNormal style='text-indent:21.0pt;mso-char-indent-count:2.0'><span
lang=EN-US>127.0.0.1 leyouda.cc</span></p>

<p class=MsoNormal style='text-indent:21.0pt;mso-char-indent-count:2.0'><span
lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-indent:21.0pt;mso-char-indent-count:2.0'>保存文件，并覆盖源目录的中的<span
lang=EN-US>hosts</span>文件。</p>

<h2 style='margin-left:21.25pt;text-indent:-21.25pt;mso-list:l0 level1 lfo1'><![if !supportLists]><span
lang=EN-US style='mso-fareast-font-family:"等线 Light";mso-fareast-theme-font:
major-latin;mso-bidi-font-family:"等线 Light";mso-bidi-theme-font:major-latin'><span
style='mso-list:Ignore'>4<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span></span></span><![endif]>测试运行</h2>

<p class=MsoNormal>前台：域名<span lang=EN-US>/</span></p>

<p class=MsoNormal><span lang=EN-US style='mso-no-proof:yes'><!--[if gte vml 1]><v:shapetype
 id="_x0000_t75" coordsize="21600,21600" o:spt="75" o:preferrelative="t"
 path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f">
 <v:stroke joinstyle="miter"/>
 <v:formulas>
  <v:f eqn="if lineDrawn pixelLineWidth 0"/>
  <v:f eqn="sum @0 1 0"/>
  <v:f eqn="sum 0 0 @1"/>
  <v:f eqn="prod @2 1 2"/>
  <v:f eqn="prod @3 21600 pixelWidth"/>
  <v:f eqn="prod @3 21600 pixelHeight"/>
  <v:f eqn="sum @0 0 1"/>
  <v:f eqn="prod @6 1 2"/>
  <v:f eqn="prod @7 21600 pixelWidth"/>
  <v:f eqn="sum @8 21600 0"/>
  <v:f eqn="prod @7 21600 pixelHeight"/>
  <v:f eqn="sum @10 21600 0"/>
 </v:formulas>
 <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
 <o:lock v:ext="edit" aspectratio="t"/>
</v:shapetype><v:shape id="图片_x0020_2" o:spid="_x0000_i1026" type="#_x0000_t75"
 style='width:414.75pt;height:226.5pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="https://raw.githubusercontent.com/DarlingXwl/Laravel-Second-hand-Mall/master/README/1.png" o:title=""/>
</v:shape><![endif]--><![if !vml]><img width=553 height=302
src="https://raw.githubusercontent.com/DarlingXwl/Laravel-Second-hand-Mall/master/README/1.png" v:shapes="图片_x0020_2"><![endif]></span></p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal>后台访问：域名<span lang=EN-US>/ admin/public</span></p>

<p class=MsoNormal><span lang=EN-US style='mso-no-proof:yes'><!--[if gte vml 1]><v:shape
 id="图片_x0020_1" o:spid="_x0000_i1025" type="#_x0000_t75" style='width:415.5pt;
 height:286.5pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="https://raw.githubusercontent.com/DarlingXwl/Laravel-Second-hand-Mall/master/README/2.png" o:title=""/>
</v:shape><![endif]--><![if !vml]><img width=554 height=382
src="https://raw.githubusercontent.com/DarlingXwl/Laravel-Second-hand-Mall/master/README/2.png"><![endif]></span></p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal>前台账户 密码</p>

<p class=MsoNormal><span lang=EN-US>123456<span style='mso-spacerun:yes'>&nbsp;
</span>123465</span></p>

<p class=MsoNormal><span lang=EN-US>234567<span style='mso-spacerun:yes'>&nbsp;
</span>234567</span></p>

<p class=MsoNormal><span lang=EN-US>345678<span style='mso-spacerun:yes'>&nbsp;
</span>345678</span></p>

<p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal>后台账户：<span lang=EN-US>111413 </span>密码<span lang=EN-US>
123123</span></p>

</div>

</body>

</html>
