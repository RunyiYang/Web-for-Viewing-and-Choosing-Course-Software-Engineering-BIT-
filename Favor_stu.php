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
<!--检测是否登陆-->
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的关注</title>
<!--我的关注-->
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="mainframe_stu.php">全校课程信息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Favor_stu.php">我的关注</a>
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
                <button class="btn btn-primary" type="submit">个人中心</button>
            </form>
        </div>
    </div>
</nav>
<!--navbar导航栏-->
<!--<nav class="navbar navbar-expand-md navbar-blue bg-blue">-->
<!--        <form class="col-md">-->
<!--            <section>-->
<!--                <div class="container">-->
<!--                    <table class="table">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>-->
<!--                                <select class="form-control">-->
<!--                                    <option value="" selected="selected">课程分类</option>-->
<!--                                    <option>全部</option>-->
<!--                                    <option>体育课</option>-->
<!--                                    <option>校公选课</option>-->
<!--                                    <option>校实践课</option>-->
<!--                                    <option>辅修课</option>-->
<!--                                    <option>专业选修课</option>-->
<!--                                </select>-->
<!--                            </th>-->
<!--                            <th>-->
<!--                                <select class="form-control" >-->
<!--                                    <option value="" selected="selected">课程性质</option>-->
<!--                                    <option>全部</option>-->
<!--                                    <option>社会与健康</option>-->
<!--                                    <option>科学与技术</option>-->
<!--                                    <option>艺术与文化</option>-->
<!--                                    <option>经济与管理</option>-->
<!--                                    <option>创新与发展</option>-->
<!--                                </select>-->
<!--                            </th>-->
<!---->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody id="course-list">-->
<!--                        </tbody>-->
<!--                    </table>-->
<!---->
<!--                            <h3 class="text-center hide" id="no-result-warning">Nothing Found</h3>-->
<!--                        </div>-->
<!--                    </section>-->
<!--        </form>-->
<!--    </div>-->
<!--</nav>-->
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
                <!--                <th>课程学分</th>-->
                <th>关注人数</th>-
                <th>&nbsp&nbsp&nbsp操作说明</th>
                <!--设置一个table的head-->
            </tr>
            </thead>
            <tbody id="course-add">
<!--设置一个table的body-->
            </tbody>
        </table>
    </div>
</section>


<script src="bootstrap_bundle_min.js"></script>
<script src="popper_min.js"></script>
<script src="bootstrap_js.js"></script>


<script>
    function add_course(cid, cname, cteacher, week_day, period,ccategory,cnum) {
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

        //和maiframe界面不一样的地方，这里是取消关注
        let form_choose = document.createElement("form");
        form_choose.method = "get";
        form_choose.action = "courseWithdraw.php";
        let choose_button = document.createElement("button");
        choose_button.innerHTML = "取消关注";
        choose_button.type = "submit";
        choose_button.classList.add("btn");
        choose_button.classList.add("btn-outline-danger");
        choose_button.classList.add("mt-1");
        choose_button.name = "courseID";
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
//对应时间
    $period_name = array(
        "1" => "8:00 - 9:35",
        "2" => "9:55 - 11:30",
        "3" => "13:20 - 14:55",
        "4" => "15:15 - 16:50",
        "5" => "18:30 - 20:55",
    );
//对应时间
    $sid = $_COOKIE["cur_sid"];
    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
    $userNaame = "root";
    $password = "yry001223";
    $conn = new PDO($dsn,$userNaame, $password);
//    搜索栏
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
//看看连接没有
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
        echo <<<EOF
<script>
<!--上传课程列表，显示-->
add_course("$temp_cid", "$temp_cname","$temp_teacher", "$td1", "$td2","$temp_ccategory","$temp_cnum");
console.log("$temp_cname");
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
}
?>

