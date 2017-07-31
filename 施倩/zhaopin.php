<?php
include 'inc/db.php';
$cc = isset($_GET['p']) ? $_GET['p'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>毛遂自荐</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="stylesheet" href="css/cssph.css" media="(max-width:599px)">
    <script type="text/javascript" src="js/jquery1.42.min.js"></script>
    <script src="js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="js/aa.js"></script>
    <script>
        $(function () {
            $('input[type=submit]').click(function () {
                var vv = $('b').prev().val();
                if (vv == '') {
                    alert('带"*"的都为必填项');
                    return false;
                } else {
                    alert('简历已投成功,等待通知！');
                }
            });
        });
    </script>
</head>
<body>
<div class="header">

    <?php
    include 'top.php';
    include 'nav.php';
    ?>
</div>
<div class="zoujing">
    <div class="zj">
        <?php include 'worknav.php'; ?>
        <div class="zjR">
            <div class="zj1">毛遂自荐<span><a href="index.html">首页 </a>&gt;<a href="linian.html"> 人力资源 </a>&gt;<a
                        href="zhaopin.html">毛遂自荐</a></span></div>
            <div class="maosui">
                <p class="mp1"></p>
                <form action="admin/resume.php" method="post">
                    <ul>
                        <li class="fli1">
                            <span>姓名：</span>
                            <input type="text" name="pname" value="">
                            <b>*</b>
                        </li>
                        <li class="fli2">
                            <span>性别：</span>
                            <select name="sex" value="">
                                <option selected>男</option>
                                <option>女</option>
                            </select>
                        </li>
                        <li class="fli3">
                            <span>籍贯：</span>
                            <input type="text" name="native" value="">
                            <b>*</b>&nbsp;&nbsp;&nbsp;(例：浙江省宁波市)
                        </li>
                        <li class="fli4">
                            <span>学历：</span>
                            <select name="education" value="">
                                <option>博士</option>
                                <option>硕士</option>
                                <option selected>本科</option>
                                <option>专科</option>
                                <option>中专（高中）</option>
                            </select><b>*</b>
                        </li>
                        <li class="fli5">
                            <span>身高：</span>
                            <input type="text" name="height" value="">
                        </li>
                        <li class="fli6">
                            <span>婚否：</span>
                            <select name="merry" value="">
                                <option selected>未婚</option>
                                <option>已婚</option>
                            </select>
                        </li>
                        <li class="fli7">
                            <span>特长 ：</span>
                            <input type="text" name="speciality" value="">
                        </li>
                        <li>
                            <span>就业状态 ：</span>
                            <label><input type="radio" name="job">失业</label>
                            <label><input type="radio" name="job" checked value="">毕业生</label>
                            <label><input type="radio" name="job">在职</label>
                            <label><input type="radio" name="job">待业</label>
                            <label><input type="radio" name="job">其他</label>
                        </li>
                        <li class="fli8">
                            <span>出生年月：</span>
                            <input type="text" name="birthday" value="">
                            <b>*</b> &nbsp;&nbsp;&nbsp;如:1981-09-10
                        </li>
                        <li class="fli9">
                            <span>政治面貌：</span>
                            <input type="text" name="face" value="">
                            <b>*</b>
                        </li>
                        <li class="fli10">
                            <span>外语水平：</span>
                            <input type="text" name="english" value="">
                            <b>*</b>
                        </li>
                        <li class="fli11">
                            <span>谋求职位：</span>
                            <select name="post">
                                <?php
                                $aa = queryall('db_post', 'post');
                                foreach ($aa as $v) {
                                    $pp = $v['post'] == $cc ? 'selected' : '';
                                    printf('<option  value="%s" %s>%s</option>', $v['post'], $pp, $v['post']);
                                }
                                ?>
                            </select>
                            <b>*</b>
                        </li>
                        <li class="fli12">
                            <span>月薪要求：</span>
                            <input type="text" name="mony" value=""><b>*</b>
                        </li>
                        <li class="fli13">
                            <span>工作方式：</span>
                            <label><input type="radio" name="way" value="兼职" checked>兼职 </label>
                            <label><input type="radio" name="way" value="专职">专职 </label>
                            <b>*</b>
                        </li>
                        <li class="fli14">
                            <span>联系电话：</span>
                            <input type="text" name="tel" value="">
                            <b>*</b>
                        </li>
                        <li class="fli15">
                            <span>技术职称：</span>
                            <input type="text" name="technical" value="">
                        </li>
                        <li class="fli15">
                            <span>毕业院校：</span>
                            <input type="text" name="school" value="">
                        </li>
                        <li class="fli16">
                            <span>地址：</span>
                            <input type="text" name="address" value="">
                        </li>
                        <li class="fli17">
                            <span>Email：</span>
                            <input type="text" name="email" value="">
                            <b>*</b>
                        </li>
                        <li class="fli18" style="width:700px;height:70px;margin-bottom:10px">
                            <span style="height:70px;line-height:70px">工作经历：</span>
                            <textarea type="text" name="work" rows="4" cols="30" style="width:300px;height:70px"
                                      value=""></textarea>
                            <b>*</b>
                        </li>
                        <li class="fli18" style="width:700px;height:70px">
                            <span style="height:70px;line-height:70px">备注：</span>
                            <textarea type="text" name="remark" rows="4" cols="30" style="height:70px;width:300px "
                                      value="">
						    </textarea>
                        </li>
                    </ul>
                    <p class="mp1"></p>
                    <div class="sub">
                        <input type="submit" value="提交">
                        <input type="reset" value="重置">
                        <span>(提示"*"务必填写)</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!------------dibu-->
<?php
include 'bottom.php';
?>
</body>
</html>
