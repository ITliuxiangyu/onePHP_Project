<div class="zoujing">
    <div class="zj">
        <div class="zjL">
            <div class="toolbar">
                <div class="menu-button"></div>
            </div>
            <p>产品中心</p>
            <ul>
                <?php
                $c = queryall('db_product', 'distinct class1', 'flag="y"');
                foreach ($c as $v) {
                    $v1 = $v['class1'];
                    printf('<li class="zonghui"><a href="chanpin.php?c1=%s">%s</a></li>', $v1, $v1);
                    $cc = queryall('db_product', 'distinct class2', "class1='$v1'and class2!=''and flag='y'");
                    foreach ($cc as $vv) {
                        $v2 = $vv['class2'];
                        printf('<li class="dian"><a href="chanpin.php?c2=%s">%s</a></li>', $v2, $v2);
                    }
                }
                $aa = queryall('db_new', 'distinct class');
                foreach ($aa as $v) {
                    $a0 = $v['class'];
                    printf('<li class="zonghui"><a href="chanpin.php?a1=%s">%s</a></li>', $a0, $a0);
                }
                ?>
            </ul>
        </div>