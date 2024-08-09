<?php

$data['PageName']='Useful Link';

$data['PageFile']='useful-link';

is_admin_session();
//remove html tags
function stf($str){
	$str=strip_tags(trim($str));
	return $str;
}


include "header.php";

?>







