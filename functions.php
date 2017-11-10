<?php
include('config/config.php');

function insert($table,$data){


    $sql = "INSERT INTO `$table` ";
    $fieldsArray=[];
    $valueArray=[];
    foreach ($data as $key=>$value){
        $fieldsArray[]='`'.$key.'`';
        $valueArray[]="'".$value."'";
    }
    $field=implode(',',$fieldsArray);
    $value=implode(',',$valueArray);
    $sql.=" ($field) VALUES ($value)";

    return query($sql);

}
    $sql = "SELECT * FROM `tableName` WHERE `ID ` = 5 OR `name` = 'name' ORDER BY `ID` ASC  LIMIT 5 OFFSET 5";

    function select($table, $data= "*", $whereArray = NULL, $whereCond = "AND", $orderBy = NULL, $orderCond = "ASC", $limit = 0, $offset = 0){
        $sql = "SELECT ";
        if(is_array($data)){
            $dataArray = [];
            foreach ($data as $value){
                $dataArray[] = "`".$value."`";

            }
            $data = implode(",",$dataArray);
            $sql.=$data;
        }
        else {
            $sql.="*";
        }
          if(is_array($whereArray)){
            $condArray=[];
            foreach($whereArray as $key=>$value){
               $condArray[]="`".$key."` = '".$value."'" ;

            }
            $where = implode("$whereCond",$condArray);
              $sql.=" FROM `$table`  WHERE $where ";
          }
          else{

              $sql.=" FROM `$table`";
          }

          if($orderBy){
              $sql.=" ORDER BY `$orderBy` $orderCond" ;
          }
          if($limit){
              $sql.=" LIMIT $limit ";
          }
          if($offset){
              $sql.=" OFFSET  $offset ";
          }
          return query($sql);
    }




function query($sql){
    global $conn;
    return mysqli_query($conn,$sql);


}
