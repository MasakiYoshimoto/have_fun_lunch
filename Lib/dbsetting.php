<?php
function getGroupLimit($con){
  $sql ="SELECT grouplimit
        FROM table_setting";
  $response = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($response);
  if(count($row) > 0 ){
    return $row['grouplimit'];
  } else {
    return 0;
  }
}
//index.phpのSQL
function getDisplayName($con){
  $sql ="SELECT display_name
        FROM t_display
        JOIN  table_setting
        ON table_setting.current_id_display = t_display.id_display";
  $response = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($response);
  if(count($row) > 0 ){
    return $row['display_name'];
  } else {
    return 0;
  }
}
//shuffle.phpのSQL
