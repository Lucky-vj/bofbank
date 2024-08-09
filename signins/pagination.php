<?php

	$query=db_rows("SELECT count($tblfieldid) as cnt FROM `$tblname` WHERE 1 $sql_query",0);
	$rows = $query[0]['cnt'];
	$page_rows = 100;
	$last = ceil($rows/$page_rows);
	if($last < 1){
		$last = 1;
	}
	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 

	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	//echo "select * from `$tblname` where 1 $sql_query $tblorder  $limit";
	$nquery=db_rows("SELECT * FROM `$tblname` WHERE 1 $sql_query $tblorder $limit",0);

	$paginationCtrls = '';

	if($last != 1){

	if ($pagenum > 1) {

        $previous = $pagenum - 1;

		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF']."?".$requrl.'&pn='.$previous.'" class="btn btn-primary btn-sm"><i class="fas fa-backward"></i> Previous</a> &nbsp; &nbsp; ';

		for($i = $pagenum-4; $i < $pagenum; $i++){

			if($i > 0){

		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF']."?".$requrl.'&pn='.$i.'" class="btn btn-primary btn-sm">'.$i.'</a> &nbsp; ';

			}
	    }
    }
 
	$paginationCtrls .= '<a class="btn btn-info btn-sm">'.$pagenum.'</a> &nbsp; ';

	for($i = $pagenum+1; $i <= $last; $i++){

		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF']."?".$requrl.'&pn='.$i.'" class="btn btn-primary btn-sm">'.$i.'</a> &nbsp; ';

		if($i >= $pagenum+4){
			break;
		}
	}

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF']."?".$requrl.'&pn='.$next.'" class="btn btn-primary btn-sm">Next <i class="fas fa-angle-double-right"></i></a> ';

    }

	}
 

?>