<div class="zjL">
    <div class="toolbar">
        <div class="menu-button"></div>
    </div>
    <p>社会责任</p>
    <ul>
        <?php
        $aa = queryall('db_company', '*', "flag='y'and diff='s'");
        foreach ($aa as $v) {
            ?>
            <li><a href="shehui.php?class=<?= $v['class'] ?>"><?= $v['class'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>