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
<!--判断是否已经登陆-->

<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>公告栏</title>

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
                    <a class="nav-link" href="Favor_stu.php">我的关注</a>
                </li>
                <li class="nav-item">
                    <a href="stu_ad.php" class="nav-link active">通知公告</a>
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
<!--导航栏-->
<nav class="navbar navbar-expand-md navbar-blue bg-blue">
    <form class="col-md">
        <section>
            <div class="container">
                <table class="table">

                    <tbody id="course-list">
                    </tbody>
                </table>

                <h3 class="text-center hide" id="no-result-warning">Nothing Found</h3>
            </div>
        </section>
    </form>
    </div>
</nav>

<section>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>序号</th>

                <th></th>
                <th></th>
                <th>公告名称</th>
                <th></th>
                <th>时间</th>
                <th>部门</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="ad-add">

            </tbody>

        </table>
        <h3 class="text-center hide" id="no-result-warning">Nothing Found</h3>
    </div>
</section>








<script src="bootstrap_bundle_min.js"></script>
<script src="popper_min.js"></script>
<script src="bootstrap_js.js"></script>
<script>
//    添加公告，和添加课程差不多，注意上面排版用th，这里用td，可以自动对齐
    function add_ad(adID, adTitle, adDate, adDepart) {
        let target_table = document.getElementById("ad-add");
        let new_tr = document.createElement("tr");
        new_tr.id = adID;

        let temp_adID = document.createElement("td");
        temp_adID.classList.add("align-middle");
        let wrapper_adID = document.createElement("div");
        wrapper_adID.innerHTML = adID;
        temp_adID.appendChild(wrapper_adID);
        new_tr.appendChild(temp_adID);


        let ad2 = document.createElement("td");
        new_tr.appendChild(ad2);
        let ad3 = document.createElement("td");
        new_tr.appendChild(ad3);

        let temp_adTitle = document.createElement("td");
        temp_adTitle.classList.add("align-middle");
        let wrapper_adTitle = document.createElement("div");
        wrapper_adTitle.innerHTML = adTitle;
        temp_adTitle.appendChild(wrapper_adTitle);
        new_tr.appendChild(temp_adTitle);

        let ad4 = document.createElement("td");
        new_tr.appendChild(ad4);

        let temp_adDate = document.createElement("td");
        temp_adDate.classList.add("align-middle");
        let wrapper_adDate = document.createElement("div");
        wrapper_adDate.innerHTML = adDate;
        temp_adDate.appendChild(wrapper_adDate);
        new_tr.appendChild(temp_adDate);

        let temp_adDepart = document.createElement("td");
        temp_adDepart.classList.add("align-middle");
        let wrapper_adDepart = document.createElement("div");
        wrapper_adDepart.innerHTML = adDepart;
        temp_adDepart.appendChild(wrapper_adDepart);
        new_tr.appendChild(temp_adDepart);

        let wrapper = document.createElement("td");
        let form_view = document.createElement("form");
        form_view.method = "get";
        form_view.action = "AdInfo.php";
        let view_button = document.createElement("button");
        view_button.innerHTML = "查看详情";
        view_button.type = "submit";
        view_button.classList.add("btn");
        view_button.classList.add("btn-outline-info");
        view_button.name = "ad_id";
        view_button.value = adID;
        form_view.appendChild(view_button);
        wrapper.appendChild(form_view);
        new_tr.appendChild(wrapper);

        target_table.appendChild(new_tr);
    }
</script>

</body>
</html>

<?php
//连接数据库
    $sid = $_COOKIE["cur_sid"];
    $dsn = sprintf('mysql:host=localhost;dbname=main;charset=utf8;port=3306');
    $userNaame = "root";
    $password = "yry001223";
    $conn = new PDO($dsn,$userNaame, $password);
    $sql_run = $conn->prepare("select * from ad");
    $sql_run->execute();
    foreach ($sql_run as $row) {
        $temp_adID = $row["adID"];
        $temp_adTitle = $row["adTitle"];
        $temp_date = $row["adDate"];
        $temp_Depart = $row["adDepart"];
//逐个读出数据库中的值
        echo <<<EOF
    <script>
    // 显示公告界面
        add_ad("$temp_adID","$temp_adTitle","$temp_date","$temp_Depart");
        console.log("$temp_adID");
    </script>
    EOF;
    }
?>


