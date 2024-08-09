<?php

include "../common.php";



if (!empty($_POST["username"])) {

  $query = db_rows("SELECT * FROM tbl_client_master WHERE username='" . $_POST["username"] . "' AND banned=0");

  $user_count = $db_counts;

  if ($user_count > 0) {

    echo "1";
  } else {

    echo "0";
  }
}



if (!empty($_POST["Useremailid"])) {

  $query = db_rows("SELECT * FROM tbl_client_master WHERE email='" . $_POST["Useremailid"] . "' AND banned=0");

  $user_count = $db_counts;

  if ($user_count > 0) {

    echo "1";
  } else {

    echo "0";
  }
}
