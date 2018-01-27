<?php
function connect (){
  $con = mysqli_connect('localhost', 'root', '');
  mysqli_select_db($con,'havefunlunch_system');
  mysqli_set_charset($con,'utf8');
  return $con;
}
function get_join_list($con){
  $sql = "SELECT u.id_user,u.first_name,u.last_name
          FROM t_join AS t
          JOIN m_user AS u ON t.id_user = u.id_user";
  $response = mysqli_query($con,$sql);
  $list = array();
  while($row = mysqli_fetch_assoc($response)){
    $list[] = $row;
  }
  return $list;
}
function exist_join_user($con,$id_user){
  $sql = "SELECT id_user
          FROM t_join
          WHERE id_user = {$id_user}";
  $response = mysqli_query($con,$sql);
  $user_counts = mysqli_num_rows ($response);
  if($user_counts>=1){
    return false;
  }else {
    return true;
  }
}
function delete_join_user($con,$id_user){
  $sql = "DELETE FROM t_join
          WHERE id_user = {$id_user}";
  $response = mysqli_query($con, $sql);
  return ($response !== false);
}
