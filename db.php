<h1>資料庫常用自訂函式</h1>
<h3>all()-存取指定條件的多筆資料</h3>
<?php
include_once "./db/base.php";

// $rows=all('students',['dept'=>6,'graduate_at'=>8]," ORDER BY `id` desc");
// dd($rows);

$rows = find('students', 200);
dd($rows);
$rows = find('students',['name'=>'白金圓']);
dd($rows);


function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/*  pram table - 資料表名稱
    pram args[0] - where 條件{array}或sql字串
    pram args[1] - order by limit 之類的sql字串
*/

function all($table, ...$args)
{
    global $pdo;
    $sql = "SELECT * FROM $table ";

    if (isset($args[0])) {
        if (is_array($args[0])) {
            // 是陣列 ['acc' => 'qwer1', 'pw' => 'qwer1'];
            // 是陣列 ['product' => 'pc', 'price' => '10000'];

            foreach ($args[0] as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . " WHERE " . join(" && ", $tmp);
        } else {
            // 是字串
            $sql = $sql . $args[0];
        }
    }

    if (isset($args[1])) {
        $sql = $sql . $args[1];
    }

    echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 傳回指定id的資料


function find($table, $id)
{
    global $pdo;
    $sql = "SELECT * FROM `$table` ";

    if (is_array($id)) {
        foreach($id as $key => $value){
            $tmp[] = "`$key`='$value'";
        }

        $sql = $sql . " WHERE " . join(" && ", $tmp);

    } else {
        $sql = $sql . "WHERE `id`='$id'";
    }

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

?>