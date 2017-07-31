<div class="zjL">
    <div class="toolbar">
        <div class="menu-button"></div>
    </div>
    <p>企业动态</p>
    <ul>
        <?php
        $aa = queryall('db_news', 'distinct class');
        foreach ($aa as $v) {
            ?>
            <li><a href="news.php?c1=<?= $v['class'] ?>"><?= $v['class'] ?></a></li>
            <?php
        }
        ?>
    </ul>
</div>