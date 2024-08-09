<?php
include "../common.php";

if(!empty($_POST["username"])) {
  $query = db_rows("SELECT * FROM tbl_admin WHERE admin_username='" . $_POST["username"] . "'");
  $user_count = $db_counts;
  if($user_count>0) {
    echo "1";
  }else{
  echo "0";
  }
}

?>
