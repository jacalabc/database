<h3>最新消息</h3>
<hr>
<ul class="list-group">

<?php
$all_news="SELECT * FROM `news` ";
$rows=$pdo->query($all_news)->fetchAll();

foreach($rows as $row){
    echo "<li class='list-group-item list-group-item-action d-flex'>";
    echo "<a href='index.php?do=news_detail&id={$row['id']}'>";
    echo $row['subject'];
    echo "</li>";
}

?>

</ul>