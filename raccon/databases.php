<?php
function DB_getConnection(){
    static $conn = NULL;
    if($conn ==NULL){
        $conn = new PDO("mysql:dbname=; host:mysql.zzz.com.ua; charset=utf8",
                        "",
                        "");
        }
    return $conn;
    }

function DB_selectAll($table){
    $dbh = DB_getConnection();
    $stmt = $dbh->query("SELECT * FROM `{$table}`");
    return $stmt ->fetchAll();
}
function DB_selectById($table, $id){
    $dbh = DB_getConnection();
    $stmt = $dbh->prepare("SELECT * FROM `{$table}` WHERE `id`=?");
    $id = (int)$id;
    $stmt->execute([$id]);
    return $stmt->fetch();
}
function DB_insertToTable($table, array $data){
    $dbh = DB_getConnection();
    $data_key=array_keys($data);
    $query="INSERT INTO `{$table}` (`".implode("`,`", $data_key)."`) VALUES(:".implode(",:",$data_key).");";
    $stmt = $dbh->prepare($query);
    $stmt->execute($data);
}
function DB_query($query, array $data=[], $mode=PDO::FETCH_ASSOC){
    $dbh = DB_getConnection();
    $stmt=$dbh->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchAll($mode);
}
function DB_selectLimited($table, $where="1", array $data=[], $limit, $offset=0){
    $dbh = DB_getConnection();
    $stmt = $dbh->prepare("SELECT * FROM `{$table}` WHERE {$where} LIMIT ".(int)$limit." OFFSET ".(int)$offset.";");
    $stmt->execute($data);
    return $stmt->fetchAll();
}

function DB_delete($table, $id){
    $dbh = DB_getConnection();
    $stmt= $dbh->prepare("DELETE FROM `{$table}` WHERE `id`=?");
    $stmt->execute([(int)$id]);
}
function DB_update($table, $id, array $data){
    $dbh = DB_getConnection();
    $columns=array_keys($data);
    $columns=array_map(function ($elem){return "`{$elem}`=:{$elem}";},$columns);
    $stmt = $dbh->prepare("UPDATE `{$table}` SET ".implode(", ",$columns)."WHERE `id`=:id");
    $data["id"]=(int)$id;
    $stmt->execute($data);
}