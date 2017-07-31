<div class="zjL">
    <div class="toolbar">
        <div class="menu-button"></div>
    </div>
    <p>走进江友</p>
    <ul>
        <?php
        $aa = queryall('db_company', '*', "flag='y'and diff='c'");
        foreach ($aa as $v) {
            ?>
            <li><a href="company.php?class=<?= $v['class'] ?>"><?= $v['class'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>