<h1>資料庫常用自訂函式</h1>
<?php
include_once "./db/base.php";
?>
<?php
//all()-存取指定條件的多筆資料
// $rows=all('students',['dept'=>6,'graduate_at'=>8]," ORDER BY `id` desc");
// dd($rows);

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

//find()-回傳資料表指定id的資料
// 傳回指定id的資料

// $rows = find('students', 200);
// dd($rows);
// $rows = find('students',['name'=>'白金圓']);
// dd($rows);

function find($table, $id)
{
    global $pdo;
    $sql = "SELECT * FROM `$table` ";

    if (is_array($id)) {
        foreach ($id as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        $sql = $sql . " WHERE " . join(" && ", $tmp);
    } else {
        $sql = $sql . "WHERE `id`='$id'";
    }

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}



//update()-給定資料表的條件後，會去更新相應的資料。

// 給訂條件更新資料(多筆或單筆)

// update('students',['name'=>'邱奕傑']);

function update($table, $col, ...$args)
{
    global $pdo;

    $sql = "UPDATE $table SET ";

    if (is_array($col)) {
        foreach ($col as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        $sql = $sql .  join(",", $tmp);
    } else {
        echo "錯誤，請提供以陣列形式的更新資料";
    }

    if (isset($args[0])) {
        if (is_array($args[0])) {
            $tmp = [];
            foreach ($args[0] as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }

            $sql = $sql . " WHERE " . join(" && ", $tmp);
        } else {
            $sql = $sql . "WHERE `id`='{$args[0]}'";
        }
    }

    echo $sql;
    // return $pdo->exec($sql);
}

//insert()-給定資料內容後，會去新增資料到資料表
// 新增資料

// insert('class_student',['school_num'=>'911799',
// 'class_code'=>'101',
// 'seat_num'=>51,
// 'year'=>2000]);

function insert($table, $cols)
{
    global $pdo;

    $keys = array_keys($cols);
    // dd(join("','", $cols));

    $sql = "INSERT INTO $table (`" . join("`,`", $keys) . "`) values('" . join("','", $cols) . "')";

    echo $sql;
    // return $pdo->exec($sql);
}


// del()-給定條件後，會去刪除指定的資料
// 刪除資料

// echo del('students', ['dept' => 4]);

function del($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM `$table` ";

    if (is_array($id)) {
        foreach ($id as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        $sql = $sql . " WHERE " . join(" && ", $tmp);
    } else {
        $sql = $sql . " WHERE `id`='$id'";
    }

    echo $sql;
    // return $pdo->exec($sql);
}

// q()-萬用自訂查詢函式
// 萬用sql函式

// $result=q("select count(id) from `students` ");
// echo $result[0][0];

$students=q("SELECT `students`.`id`,
                    `students`.`school_num` as '學號',
                    `students`.`name` as '姓名',
                    `students`.`birthday` as '生日',
                    `students`.`graduate_at` as '畢業國中'
                    FROM `class_student`,`students` 
                    WHERE `class_student`.`school_num`=`students`.`school_num` && 
                          `class_student`.`class_code`='101'");

// dd($students);

function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll();
}
?>