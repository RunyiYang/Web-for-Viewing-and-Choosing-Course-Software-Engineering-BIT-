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
    <title>选课</title>

    <link rel="stylesheet" href="bootstrap_min.css">
    <style>
        #no-result-warning {
            font-family: Sansation, sans-serif;
            color: gray;
        }

        .hide {
            display: none;
        }
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
         <!--定义导航栏：全校课程信息、我的关注、通知公告-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="mainframe_stu.php">全校课程信息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Favor_stu.php">我的关注</a>
                </li>
                <li class="nav-item">
                    <a href="stu_ad.php" class="nav-link">通知公告</a>
                </li>
            </ul>

            <!--定义导航栏：课程搜索-->
            <form class="d-flex" method="get" action="mainframe_stu.php">
                <input class="form-control me-2" type="search" placeholder="Search" name="keyword">
                <a href="#" width="200px" height="200px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="40" fill="currentColor" class="bi bi-search icon d-block" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
            </form>

              <!--定义导航栏：个人主页-->
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <form action="HomePage.php" method="post" class="d-flex">
                <button class="btn btn-primary" type="submit">个人中心</button>
            </form>
        </div>
    </div>
</nav>

<section>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>课程编号</th>
                <th>课程名称</th>
                <th>任课教师</th>
                <th>课程时间</th>
                <th>课程属性</th>
                <th>关注人数</th>
                <th>&nbsp&nbsp&nbsp操作说明</th>
            </tr>
            </thead>
            <tbody id="course-add">

            </tbody>
        </table>
    </div>
</section>


<script src="bootstrap_bundle_min.js"></script>
<script src="popper_min.js"></script>
<script src="bootstrap_js.js"></script>


<script>
    //定义添加课程函数add_course
    //cid课程编号,cname课程名称,cteacher任课教师,week_day+period上课时间,ccategory课程属性,cnum关注人数
    function add_course(cid, cname, cteacher, week_day, period,ccategory,cnum) {
        let target_table = document.getElementById("course-add");//表格target_table为id=course-add的文档
        let new_tr = document.createElement("tr");//创建新的一行new_tr
        new_tr.id = cid;

        let temp_cid = document.createElement("td");//创建新列temp_cid
        temp_cid.classList.add("align-middle");//在temp_cid中添加类并实现内容居中
        let wrapper_cid = document.createElement("div");//创建新的包装wrapper_cid
        wrapper_cid.innerHTML = cid;//将cid放入包装wrapper_cid中
        temp_cid.appendChild(wrapper_cid);//将wrapper_cid放入单元格temp_cid
        new_tr.appendChild(temp_cid); //将temp_cid放入新建记录new_tr中

        let temp_cname = document.createElement("td");
        temp_cname.classList.add("align-middle");
        let wrapper_cname = document.createElement("div");
        wrapper_cname.innerHTML = cname;
        temp_cname.appendChild(wrapper_cname);
        new_tr.appendChild(temp_cname);

        let temp_cteacher = document.createElement("td");
        temp_cteacher.classList.add("align-middle");
        let wrapper_cteacher = document.createElement("div");
        wrapper_cteacher.innerHTML = cteacher;
        temp_cteacher.appendChild(wrapper_cteacher);
        new_tr.appendChild(temp_cteacher);

        let temp_ctime = document.createElement("td");
        temp_ctime.classList.add("align-middle");
        let wrapper_ctime = document.createElement("div");
        wrapper_ctime.classList.add("align-middle");
        wrapper_ctime.innerHTML = week_day + ", " + period;
        temp_ctime.appendChild(wrapper_ctime);
        new_tr.appendChild(temp_ctime);

        let temp_ccategory = document.createElement("td");
        temp_ccategory.classList.add("align-middle");
        let wrapper_ccategory = document.createElement("div");
        wrapper_ccategory.innerHTML = ccategory;
        temp_ccategory.appendChild(wrapper_ccategory);
        new_tr.appendChild(temp_ccategory);

        let temp_cnum = document.createElement("td");
        temp_cnum.classList.add("align-middle");
        let wrapper_cnum = document.createElement("div");
        wrapper_cnum.classList.add("align-middle");
        wrapper_cnum.innerHTML = cnum;
        temp_cnum.appendChild(wrapper_cnum);
        new_tr.appendChild(temp_cnum);

        let wrapper = document.createElement("td");//创建新列wrapper

        //定义"查看详情"按钮
        let form_view = document.createElement("form");//创建表单form_view
        form_view.method = "get";//表单method为get,即只读信息检索
        form_view.action = "CourseInfo.php";//执行后跳转"课程详情"页面
        let view_button = document.createElement("button");//创建表单按钮view_button
        view_button.innerHTML = "查看详情";//按钮名称为"查看详情"
        view_button.type = "submit";//按钮用于提交表单，即上传用户操作
        view_button.classList.add("btn");
        view_button.classList.add("btn-outline-info");//设置按钮显示风格
        view_button.name = "courseID";
        view_button.value = cid;
        form_view.appendChild(view_button);//将按钮view_button放入form_view中
        wrapper.appendChild(form_view);//将表单form_view放入wrapper中
        new_tr.appendChild(wrapper);//将wrapper放入新建记录new_tr中


        //定义"加入关注"按钮
        let form_choose = document.createElement("form");
        form_choose.method = "get";
        form_choose.action = "courseRegistration.php";
        let choose_button = document.createElement("button");
        choose_button.innerHTML = "加入关注";
        choose_button.type = "submit";
        choose_button.classList.add("btn");
        choose_button.classList.add("btn-outline-success");
        choose_button.classList.add("mt-1");
        choose_button.name = "courseID";
        choose_button.value = cid;
        form_choose.appendChild(choose_button);
        wrapper.appendChild(form_choose);
        new_tr.appendChild(wrapper);

        target_table.appendChild(new_tr);//将新建记录放入表格
    }
</script>

<!-- 逻辑与add_course相同 -->
<script>
    function add_course_1(cid, cname, cteacher, week_day, period,ccategory,cnum) {
        let target_table = document.getElementById("course-add");
        let new_tr = document.createElement("tr");
        new_tr.id = cid;

        let temp_cid = document.createElement("td");
        temp_cid.classList.add("align-middle");
        let wrapper_cid = document.createElement("div");
        wrapper_cid.innerHTML = cid;
        temp_cid.appendChild(wrapper_cid);
        new_tr.appendChild(temp_cid);

        let temp_cname = document.createElement("td");
        temp_cname.classList.add("align-middle");
        let wrapper_cname = document.createElement("div");
        wrapper_cname.innerHTML = cname;
        temp_cname.appendChild(wrapper_cname);
        new_tr.appendChild(temp_cname);

        let temp_cteacher = document.createElement("td");
        temp_cteacher.classList.add("align-middle");
        let wrapper_cteacher = document.createElement("div");
        wrapper_cteacher.innerHTML = cteacher;
        temp_cteacher.appendChild(wrapper_cteacher);
        new_tr.appendChild(temp_cteacher);

        let temp_ctime = document.createElement("td");
        temp_ctime.classList.add("align-middle");
        let wrapper_ctime = document.createElement("div");
        wrapper_ctime.classList.add("align-middle");
        wrapper_ctime.innerHTML = week_day + ", " + period;
        temp_ctime.appendChild(wrapper_ctime);
        new_tr.appendChild(temp_ctime);

        let temp_ccategory = document.createElement("td");
        temp_ccategory.classList.add("align-middle");
        let wrapper_ccategory = document.createElement("div");
        wrapper_ccategory.innerHTML = ccategory;
        temp_ccategory.appendChild(wrapper_ccategory);
        new_tr.appendChild(temp_ccategory);

        let temp_cnum = document.createElement("td");
        temp_cnum.classList.add("align-middle");
        let wrapper_cnum = document.createElement("div");
        wrapper_cnum.classList.add("align-middle");
        wrapper_cnum.innerHTML = cnum;
        temp_cnum.appendChild(wrapper_cnum);
        new_tr.appendChild(temp_cnum);

        let wrapper = document.createElement("td");
        let form_view = document.createElement("form");
        form_view.method = "get";
        form_view.action = "CourseInfo.php";
        let view_button = document.createElement("button");
        view_button.innerHTML = "查看详情";
        view_button.type = "submit";
        view_button.classList.add("btn");
        view_button.classList.add("btn-outline-info");
        view_button.name = "courseID";
        view_button.value = cid;
        form_view.appendChild(view_button);
        wrapper.appendChild(form_view);
        new_tr.appendChild(wrapper);


        let form_choose = document.createElement("form");
        form_choose.method = "get";
        form_choose.action = "courseWithdraw_1.php";
        let choose_button = document.createElement("button");
        choose_button.innerHTML = "取消关注";
        choose_button.type = "submit";
        choose_button.classList.add("btn");
        choose_button.classList.add("btn-outline-danger");
        choose_button.classList.add("mt-1");
        choose_button.name = "courseID_1";
        choose_button.value = cid;
        form_choose.appendChild(choose_button);
        wrapper.appendChild(form_choose);
        new_tr.appendChild(wrapper);

        target_table.appendChild(new_tr);
    }
</script>

</body>
</html>

<?php
//与数据库匹配，显示课程时间
if (isset($_COOKIE["cur_user"])) {
    $week_name = array(
        "1" => "Monday",
        "2" => "Tuesday",
        "3" => "Wednesday",
        "4" => "Thursday",
        "5" => "Friday",
        "6" => "Saturday",
        "7" => "Sunday",
    );

    $period_name = array(
        "1" => "8:00 - 9:35",
        "2" => "9:55 - 11:30",
        "3" => "13:20 - 14:55",
        "4" => "15:15 - 16:50",
        "5" => "18:30 - 20:55",
    );

    $username = $_COOKIE["cur_user"];
    $sid = $_COOKIE["cur_sid"];
    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
    $userNaame = "root";
    $password = "yry001223";
    $conn = new PDO($dsn, $userNaame, $password);

    //课程搜索界面，仅显示未选、时间不冲突课程
    if (isset($_GET["keyword"])) {
        $keyword_filtered = htmlspecialchars(trim(stripslashes($_GET["keyword"])));
        $keyword_filtered = preg_replace("/[^A-Za-z0-9\s\-]/", "", $keyword_filtered);
        $sql_command = <<<EOF
select * from course where (
    cname like '%$keyword_filtered%'
    and
    cid not in (
        select cid from choose where sid=?
    )
    and
    cid in (
        select cid from courseAvailableDept where (
        dept in (select dept from user where MemberName=?)
        )
    )
    and
    ctime not in (
        select ctime from course where cid in (
            select cid from choose where sid=?
        )
    )
)
EOF;

    }
    else {
        $sql_command = <<<EOF
select * from course where (
  cid not in (
    select cid from choose where sid=?
  )
  and
  cid in (
    select cid from courseAvailableDept where (
      dept in (select dept from user where MemberName=?)
    )
  )
  and
  ctime not in (
    select ctime from course where cid in (
      select cid from choose where sid=?
    )
  )
);
EOF;
    }
    $sql_run = $conn->prepare($sql_command);
    $sql_run->execute([$sid, $username,$sid]);

    if (isset($_GET["keyword"])) {
        $keyword_filtered = htmlspecialchars(trim(stripslashes($_GET["keyword"])));
        $keyword_filtered = preg_replace("/[^A-Za-z0-9\s\-]/", "", $keyword_filtered);
        $no_result = true;
    }
    foreach ($sql_run as $row) {
        $temp_cid = $row["cid"];
        $temp_cname = $row["cname"];
        $temp_teacher = $row["cteacher"];
        $temp_date = $row["ctime"];
        $temp_cnum = $row["cnum"];
        $temp_ccategory = $row["ccategory"];

        $td1 = $week_name[substr($temp_date, 0, 1)];
        $td2 = $period_name[substr($temp_date, 2)];
        echo <<<EOF
<script>
add_course("$temp_cid", "$temp_cname","$temp_teacher", "$td1", "$td2","$temp_ccategory","$temp_cnum");
</script>
EOF;
        $no_result = false;
    }

    if ($no_result) {
        echo <<<EOF
<script>
document.getElementById("no-result-warning").classList.remove("hide");
</script>
EOF;
    }
    $conn = null;
}
?>

<?php
if (isset($_COOKIE["cur_user"])) {
    $week_name = array(
        "1" => "Monday",
        "2" => "Tuesday",
        "3" => "Wednesday",
        "4" => "Thursday",
        "5" => "Friday",
        "6" => "Saturday",
        "7" => "Sunday",
    );

    $period_name = array(
        "1" => "8:00 - 9:35",
        "2" => "9:55 - 11:30",
        "3" => "13:20 - 14:55",
        "4" => "15:15 - 16:50",
        "5" => "18:30 - 20:55",
    );

    $sid = $_COOKIE["cur_sid"];
    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
    $userNaame = "root";
    $password = "yry001223";
    $conn = new PDO($dsn,$userNaame, $password);
    if (isset($_GET["keyword"])) {
        $keyword_filtered = htmlspecialchars(trim(stripslashes($_GET["keyword"])));
        $keyword_filtered = preg_replace("/[^A-Za-z0-9\s\-]/", "", $keyword_filtered);
        $sql_command = <<<EOF
select * from course where (
    cname like '%$keyword_filtered%'
    and
    cid in (
        select cid from choose where sid=?
    )
)
EOF;
    } else {
        $sql_command = <<<EOF
select * from course where (
    cid in (
        select cid from choose where sid=?
    )
)
EOF;
    }
    $sql_run = $conn->prepare($sql_command);
    $sql_run->execute([$sid,]);
    $conn = null;

    $no_result = true;
    foreach ($sql_run as $row) {
        $temp_cid = $row["cid"];
        $temp_cname = $row["cname"];
        $temp_teacher = $row["cteacher"];
        $temp_date = $row["ctime"];
        $temp_cnum = $row["cnum"];
        $temp_ccategory = $row["ccategory"];

        $td1 = $week_name[substr($temp_date, 0, 1)];
        $td2 = $period_name[substr($temp_date, 2)];
        
        //与数据库连接，若有搜索结果，则显示课程信息
        echo <<<EOF
<script>
add_course_1("$temp_cid", "$temp_cname","$temp_teacher", "$td1", "$td2","$temp_ccategory","$temp_cnum");
console.log("$temp_cname");
</script>
EOF;
        $no_result = false;
    }
    if ($no_result) {
        //与数据库连接，若无搜索结果，则显示无结果
        echo <<<EOF
<script>
document.getElementById("no-result-warning").classList.remove("hide");
</script>
EOF;
    }
}
?>

