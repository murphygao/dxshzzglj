## 定西市社会组织管理局

###  介绍
定西市社会组织管理局

###  默认字体
- 首选宋体

### 定西市社会组织管理局网站栏目设计

- 新闻中心
    - 政务新闻
    - 社会关注
    - 社会组织动态
    - 理论观点
    - 社会组织风采
- 信息公开
    - 行政许可
    - 查处公告
    - 评估结果
    - 年检结果
- 区县动态
- 政策法规
- 政策解读
- 网上办事大厅
    - 办事指南
    - 表格下载
    - 年检材料
- 通知公告

修改之后的
- 首页
- 新闻中心
- 信息公开
- 通知公告
- 社会团体
- 民办非企业单位
- 基金会
- 社会组织党建
- 办事大厅



###  构建工具
- 模板构建用gulp
- css编写用sass预处理器
- 编译css文件用gulp-sass
- 处理浏览器厂商前缀用插件gulp-autoprefixer
- 所需的额外插件gulp-sourcemaps
- 处理url目录层次用到gulp-replace
- 启动php用gulp-connect-php
- 处理html模板用gulp-file-include
- gulp插件del
- 图片压缩优化gulp-imagemin
- css文件压缩gulp-clean-css
- html文件压缩gulp-htmlmin
- js文件连接gulp-concat
- js文件压缩gulp-uglify

###  所需第三方库文件
- jQuery#2.0+
- 图标字体font-awesome#4.5.0
- css animate使用animate.css
- css reset 使用Eric Meyer reset,(normalize.css备用)
- slider使用owl-carousel#2.0
- 多处使用jquery.SuperSlide.2.1.1,感谢

### 不完善的IE8支持
```javascript
//页面head加入如下代码
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<![endif]-->

//如果要引入jquery,则需要引入如下代码
<!--[if (!IE)|(gt IE 8)]><!-->
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.js"></script>
<!--<![endif]-->

<!--[if lte IE 8]>
<script src="//cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
<![endif]-->
```

