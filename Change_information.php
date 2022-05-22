<?php
if (isset($_COOKIE["cur_user"])) {
    setcookie("cur_user", $_COOKIE["cur_user"], time() + 3600);
    setcookie("cur_sid", $_COOKIE["cur_sid"], time() + 3600);
} else {
    echo <<<EOF
<script>alert("You need to log in!")</script>
EOF;
    echo <<<EOF
<script>url="index.php";window.location.href=url;</script>
EOF;
}
?>

<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更改个人信息</title>

    <link rel="stylesheet" href="bootstrap_min.css">
    <style>
        #no-result-warning {
            font-family: Sansation, sans-serif;
            color: gray;
        }

        .hide {
            display: none;
        }
        .photo{
            float:left;
            width:150px;
        }

        #login-pad {
            background-color: rgba(255, 255, 255, 0.5);

            border-radius: 8%;
            /* 边框的倒角 */
            padding: 6%;
        }

        #login-pad > h3 {
            font-family: Sansation, sans-serif;
            /* 设置字体样式 */
        }


        /* 以下为个人头像展示部分的图文排版排版 */
        div.img
            /* 边框 */
        {
            margin: 2px;
            border: 1px solid #000000;
            height: auto;
            /* 高度自动匹配 */
            width: auto;
            /* 宽度自动匹配 */
            float: left;
            text-align: center;
            /* 文本居中 */
        }

        div.img img
        {
            display: inline;
            margin: 3px;
            border: 1px solid #ffffff;
        }

        /* 图片下文字的排版 */
        div.img a:hover img {border: 1px solid #0000ff;}
        div.desc
        {
            text-align: center;
            font-weight: normal;
            /* 字体粗细 */
            width: 120px;
            /* 宽度 */
            margin: 2px;
            /* 页边空白宽度 */
            
        }
        #no-result-warning {
            font-family: Sansation, sans-serif;
            /* 字体样式 */
            color: gray;
            /* 字体颜色 */
        }

        .hide {
            display: none;
        }
        #customers
        {
            font-family: Arial, Helvetica, sans-serif;
            /* 字体样式 */
            border-collapse: collapse;
            /* 为表格设置合并边框模型 */
            width: 75%;
            /* 定义基于包含块（父元素）宽度的百分比宽度。 */

        }

        #customers td, #customers th
        {
            border: 1px solid white;
            /* 边框粗细和风格 */
            padding: 8px;
            font-size:14px;
            /* 字体大小 */
        }


       
/* 表单的排版 */
        #customers tr:hover {background-color: #ddd;}
    /* 滑过时的变色 */
        #customers th
        {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ddd;
            /* 划过时背景颜色为#ddd */
            color: white;
            /* 划过时文字颜色变为白色的 */
        }
/* 网页全部类型为main的文字，都居中对齐*/
        p.main{text-align:center;}
   

        
        /* 输入新信息的填写框排版 */
      .mytxt {
    background:transparent;   
    /* 透明背景 */
    color:#333;  
    line-height:normal;
    font-family:"Microsoft YaHei",Tahoma,Verdana,SimSun;
    font-style:normal;
    /* font - family属性指定一个元素的字体。 */
    font-variant:normal;
    font-size-adjust:none;
/* 定义字体的 aspect 值比率。小写字母 "x" 的高度与 "font-size" 高度之间的比率被称为一个字体的 aspect 值。 */
/* 默认值 */
    font-stretch:normal;
    font-weight:normal;
    /* font-weight 属性设置文本的粗细 */
    border-top-left-radius:0px;
    /* 为div元素的左上角添加一个圆角边框：边框倒角为0px */
    border-top-right-radius:0px;
    /* 为div元素的右上角添加一个圆角边框：边框倒角为0px */
    border-bottom-left-radius:0px;
      /* 为div元素的左下角添加一个圆角边框：边框倒角为0px */
    border-bottom-right-radius:0px;
     /* 为div元素的右下角添加一个圆角边框：边框倒角为0px */
    text-shadow:0px 1px 2px #fff;
    background-attachment:scroll;
    background-repeat:repeat-x;
    background-position-x:left;
    background-position-y:top;
    background-size:auto;
    /* 背景图片大小自动匹配 */
    background-origin:padding-box;
    background-clip:border-box;
    background-color:rgb(255,255,255);
    /* 背景颜色 */
    margin-right:8px;
    border-top-color:#ddd;
    /* 设置上边框颜色 */
    border-right-color:#ddd;
      /* 设置右边框颜色 */
    border-bottom-color:#ddd;
      /* 设置下边框颜色 */
    border-left-color:#ddd;
      /* 设置左边框颜色 */

    /* 边框的粗细 */
    border-top-width:0px;
    border-right-width:0px;
    border-bottom-width:0px;
    border-left-width:0px;
    border-top-style:solid;
    border-right-style:solid;
    border-bottom-style:solid;
    border-left-style:solid;

    font-size:14px;
}
p.mytxt{text-align:center;text-indent:50px;font-size:200%;}

/* 下拉框的排版 */
.select{
   margin-top:1px;
   /* 相对于上边的距离 */
   outline:none;
   border:0px solid #BBBBBB;  
   /*边框*/
   border-radius:4px;
   /*外边框倒角*/
   position:relative;
   width: auto;
   /*框的宽度*/
}
/* 下拉框中文字框的排版 */
.text{
   height:25px;
   /*文本框的高度*/
   -webkit-appearance:none;
   appearance:none;
   /*下拉三角*/
   border:1px transparent;
   /*内边框*/
   font-size:14px;
   /*字体大小*/
   padding:1px 200px;
   /*字在边框的定位 相对于左上角*/
   display:block;
   width:100%;
  webkit-box-sizing:auto;
  box-sizing: inherit;
    background-color:transparent;
    /*框的背景填充颜色*/
   color:black; 
   /*未选中的字体颜色*/
    border-radius:4px;
    /* 下拉框的倒角 */
}
p.text{text-align:center}


</style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span>Beijing Institute of Technology</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="mainframe_stu.php">全校课程信息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Favor_stu.php">我的关注</a>
                </li>
                <li class="nav-item">
                    <a href="stu_ad.php" class="nav-link">通知公告</a>
                </li>
            </ul>
            <form class="d-flex" method="get" action="#">
                <input class="form-control me-2" type="search" placeholder="Search" name="keyword">
                <!--                <button class="btn btn-outline-success me-2" type="submit">Search</button>-->
                <a href="#" width="200px" height="200px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="40" fill="currentColor" class="bi bi-search icon d-block" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
            </form>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <form action="HomePage.php" method="post" class="d-flex">  
                <!-- 由Homepage链接过来 -->
                <button class="btn btn-light" type="submit">个人中心</button>
            </form>
        </div>
    </div>
</nav>
<?php
    $sid = $_COOKIE["cur_sid"];
    $conn = mysqli_connect("localhost","root","yry001223","main");
    $sql = mysqli_query($conn, "select * from user where sid='$sid'");

    //循环遍历出数据表中的数据

    $sql_arr = mysqli_fetch_assoc($sql);
    $name = $sql_arr['MemberRealName'];
    $nick = $sql_arr['MemberName'];
    $Id = $sql_arr['MemberId'];
    $Email = $sql_arr['Email'];
    $time = $sql_arr['Date'];
    $signature = $sql_arr['Signature'];
?>

<div class="container-fluid">
    <div class="form row">
        <div class="col-md-1"></div>

        <!-- 头像列 -->
        <div class="col-md-2">
            <br>
            <img style="border-radius: 16%" src="avatar.jpg" class="photo" alt="icon">
        </div>


        <!-- 个人信息表单列 -->


        <div class="col-md">
            <form action = "changecheck.php" class="form-horizontal" role="form" method="post" >
            <br>
            <table id="customers" class="align-content-center">
                <tbody>
                    <!-- 第一行 -->
                <tr>
                    <td><p class="main"><b>姓名</b></td>
                    <!-- 第一行第一列 -->
                    <td>
                        <div class="form row">
                                <div class="col-md">
                                    <input type="text"  value="<?php echo $name?>" class="form-control" style="text-align: center" name="realname"></b>
                                </div>
                        </div>
                    </td>
                    <!-- 第一行第二列 -->
                </tr>

                   <!-- 第二行 -->
                <tr>
                    <td><p class="main"><b>昵称</b></p></td>
                    <!-- 第二行第一列 -->
                    <td> 
                        <div class="form row">
                                <div class="col-md">
                                    <input type="text"  class="form-control" style="text-align: center" name="nickname" value="<?php echo $nick?>"></b>
                                </div>
                        </div>
                    </td>
                    <!-- 第二行第一列 -->
                </tr>

                <!-- 第三行 -->
                <tr>
                    <td><p class="main"><b>学号</b></p></td>
                    <!-- 第三行第一列 -->
                    <td> 
                        <div class="form row">
                                <div class="col-md">
                                    <input type="text" value="<?php echo $Id?>" class="form-control"  style="text-align: center" name="id"></b>
                                </div>
                        </div>
                    </td>
                     <!-- 第三行第二列 -->
                </tr>

                  <!-- 第四行 -->
                <tr>
                    <td><p class="main"><b>邮箱</b></p></td>
                      <!-- 第四行第一列 -->
                    <td> 
                        <div class="form row">
                                <div class="col-md">
                                    <input type="text" value="<?php echo $Email?>" class="form-control"  style="text-align: center" name="email"></b>
                                </div>
                        </div>
                    </td>
                  <!-- 第四行第二列 -->
                </tr>


                 <!-- 第五行 -->
                <tr>
                    <td><p class="main"><b>书院</b></p></td>
                     <!-- 第五行第一列 -->
                    <td>
                        <div class="col-md">
                            <select name="shuyuan" id="shuyuan-select" class="form-control" style="text-align: center">
                                <option>--请选择书院--</option>
                                <option value="睿信书院">睿信书院</option>
                                <option value="知艺书院">知艺书院</option>
                                <option value="明德书院">明德书院</option>
                                <option value="精工书院">精工书院</option>
                                <option value="求是书院">求是书院</option>
                                <option value="特立书院">特立书院</option>
                                <option value="令闻书院">令闻书院</option>
                                <option value="北京书院">北京书院</option>
                            </select>
                            <!-- 格式摘自  https://developer.mozilla.org/zh-CN/docs/Web/HTML/Element/select -->
                          <!-- 下拉列表，字体居中 -->
                        <!-- </select> -->
                        </div>                  
                    </td>
                     <!-- 第五行第二列 -->
                </tr>
                </tbody>
            </table>




            <br><br/>
            <h5>个人简介</h5><textarea rows="5" cols="100" name="signature"><?php echo $signature?></textarea>
            <!-- 文本框输入个人简介，文本框大小为5行，100列 -->
            <br><br/>
            <button type="submit" class="btn btn-primary" name ="change" value="333" >提交</button>
            <!-- 按键的功能是提交文本框信息，与后台的数据库产生交互 -->
            </form>
        </div>

    </div>
</div>
