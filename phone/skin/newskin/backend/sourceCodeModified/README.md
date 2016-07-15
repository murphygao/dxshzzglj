###  该目录下的文件为修改帝国源码的文件

- connect.php
该文件位于e/class目录下,
修改记录:
修改了ReturnClassLink函数
现在输出为下面的格式:
```html
<li><a>首页</a></li><li><a>二级栏目</a></li><li class="active">当前栏目名称</li>
```
模板中用\[!--newsnav--\]标签调用

- connect.php
该文件位于e/class目录下
修改了page1函数,该函数动态内容分页函数
现在输出的格式为:
```html
    <li><a href="">首页</a></li>
    <li><a href="">上一页</a></li>
    <li><a href="">1</a></li>
    <li class="disabled"><a><b>2</b></a></li>
    <li><a href="">3</a></li>
    <li><a href="">下一页</a></li>
    <li><a href="">尾页</a></li>
```

- t_functions.php
该文件位于e/classs目录下
修改了分页函数sys_ShowListMorePage
现在输出分页格式如下:
```html
    <li><a href="">首页</a></li>
    <li><a href="">上一页</a></li>
    <li><a href="">1</a></li>
    <li class="disabled"><a><b>2</b></a></li>
    <li><a href="">3</a></li>
    <li><a href="">下一页</a></li>
    <li><a href="">尾页</a></li>
```

- ListInfo.php
该文件位于e/action目录下
修改了$page_line的值,默认为10个,现在修改为系统后台设置的分页显示个数


- 添加ueditor(1.4.3.2 php utf-8版本)编辑器替换帝国cms老旧的编辑器
将该目录下的ueditor移动至 e\data\ecmseditor\
进入帝国CMS后台，点击顶部【系统】
再点击左侧【数据表与系统模型】>>>【管理数据表】
然后右侧找到相应的数据表，点击【管理字段】
在弹出的新窗口内找到字段名〖newstext〗，然后点击此行的【修改】
找到〖输入表单替换html代码〗。

```
<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/e/data/ecmseditor/ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="/e/data/ecmseditor/ueditor/lang/zh-cn/zh-cn.js"></script>
<link rel="stylesheet" href="/e/data/ecmseditor/ueditor/themes/default/css/ueditor.min.css">
<script type="text/plain" id="myEditor" name="newstext" style="width:99%;height:450px;"> 
<?=$ecmsfirstpost==1?"":stripSlashes($r[newstext])?> 
</script>
<script type="text/javascript"> 
var editor = new baidu.editor.ui.Editor(); 
editor.render("myEditor"); 
editor.classid = <?=$classid?>; 
editor.filepass = <?=$filepass?>; 
</script>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
<tr>
<td bgcolor="#FFFFFF">
<input name="dokey" type="checkbox" value="1"<?=$r[dokey]==1?' checked':''?>>关键字替换&nbsp;&nbsp;
<input name="copyimg" type="checkbox" id="copyimg" value="1">远程保存图片(
<input name="mark" type="checkbox" id="mark" value="1"><a href="SetEnews.php" target="_blank">加水印</a>)&nbsp;&nbsp;
<input name="copyflash" type="checkbox" id="copyflash" value="1">远程保存FLASH(地址前缀：
<input name="qz_url" type="text" id="qz_url" size="">)
</td>
</tr>
<tr>
<td bgcolor="#FFFFFF">
<input name="repimgnexturl" type="checkbox" id="repimgnexturl" value="1">图片链接转为下一页&nbsp;&nbsp;
<input name="autopage" type="checkbox" id="autopage" value="1">自动分页,每
<input name="autosize" type="text" id="autosize" value="5000" size="5">个字节为一页&nbsp;&nbsp; 取第
<input name="getfirsttitlepic" type="text" id="getfirsttitlepic" value="" size="1">张上传图为标题图片(
<input name="getfirsttitlespic" type="checkbox" id="getfirsttitlespic" value="1">缩略图: 宽
<input name="getfirsttitlespicw" type="text" id="getfirsttitlespicw" size="3" value="<?=$public_r[spicwidth]?>">*高
<input name="getfirsttitlespich" type="text" id="getfirsttitlespich" size="3" value="<?=$public_r[spicheight]?>">)
</td>
</tr>
</table>
```
小贴士

如果需要修改编辑器的尺寸，在上面的代码内找到〖style="width:99%;height:450px;"〗进行修改即可。
举例：宽600像素，高500像素，则style="width:600px;height:500px;"
如果是自定义模型或改过模型，字段名不叫〖newstext〗的话，请把上面代码里面所有的〖newstext〗改成你的字段名（一共两处），否则会无法使用。
这样一次修改，只能针对一张数据表，如果有多张数据表，请每个都要修改。
END
注意事项

UEditor的版本一定要和帝国CMS相同，否则会出现乱码。也就是说，都用GBK或者都用UTF-8。
这是最简单的整合方法，还有更多扩展应用，可以参看UEditor官网文档

- admin/index.php为admin后台登录的首页
替换位置为e/admin/

- admin/style/1/AdminMain.php登录后台的主框架视图,替换对应目录即可

- admin/main.php 为后台登录后的首页,替换即可


- 该文件位于e/class目录下,
  修改记录:
  修改了ReturnZtLink函数

