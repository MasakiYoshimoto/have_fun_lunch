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
