<?php
function connect (){
  $con = mysqli_connect('localhost', 'root', '');
  mysqli_select_db($con,'havefunlunch_system');
  mysqli_set_charset($con,'utf8');
  return $con;
}
function get_join_list($con){
  $sql = "SELECT id_user,first_name,last_name
          FROM t_join
          JOIN m_user ON t_join.id_user=m_user id_user";
  $responce = mysqli_query($con,$sql);
  $list = array();
  while($row = mysqli_fetch_assoc($responce)){
    $list[] = $row;
  }
  return $list;
}
