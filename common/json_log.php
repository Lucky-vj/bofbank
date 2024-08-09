<? 
include "../common.php";
if(!isset($_SESSION['s_admin_username'])){ echo('ACCESS DENIED.'); exit; }

$tableid=$_REQUEST['tableid'];
$tablename=$_REQUEST['tablename'];
$type=isset($_REQUEST['type'])&&$_REQUEST['type']?$_REQUEST['type']:'';
$tablefieldidname=isset($_REQUEST['tablefieldidname'])&&$_REQUEST['tablefieldidname']?$_REQUEST['tablefieldidname']:'id';

if($type==1){
$json_result = select_tablep("`{$tablefieldidname}` ='{$tableid}'",$tablename); // For fetch payout db
}else{
$json_result = select_tablef("`{$tablefieldidname}` ='{$tableid}'",$tablename); // For fetch Main db
}
echo "<h2> Json Log History : </h2>";
echo json_log_popup($json_result['json_log_history']);

?>
<style>
/* start: table excel  */
.tbl_exl {width: 94vw;overflow:scroll;max-height: 500px;margin: 0 auto;float: left;}
.tbl_exl table {position:relative;border:1px solid #ddd;border-collapse:collapse;max-width: inherit;}
.tbl_exl td, .tbl_exl th, .dtd {white-space:nowrap;border:1px solid #ddd;padding: 8px 18px !important;text-align:center;}
/*.tbl_exl th {background-color:#eee !important;position:sticky;top:-1px;z-index:2; &:first-of-type {left:0;z-index:3;} }*/
/*.tbl_exl tbody tr td:first-of-type{background-color: #eee !important;position:sticky;left:-1px;text-align:left;}*/
.dtd {display:table-cell;}
.tbl_exl tr:hover td {background:#dadada;}
.tbl_exl tr:hover td:first-of-type, .tbl_exl tr td:first-of-type, .tbl_exl td {padding: 5px 18px !important;}

.tbl_exl tr:hover td:first-of-type, .tbl_exl tr:hover td:hover, .tbl_exl tr:hover td, .tbl_exl tr:hover td a, .tbl_exl tr:hover td div {background: var(--color-4) !important;color:#fff !important;}
.tbl_exl tr:hover td a:hover {color:#f7ff4a !important;}
.tbl_exl diff {background:#7b0909;color:#fff !important;}
.tbl_exl.td_relative tbody tr td:first-of-type{position:relative;left:0px;text-align:left;z-index:9;}

.diff_log {
display: inline-block;
border-radius:150%;
background:red;
text-align: center;
padding: 0px 0 0 0px;
overflow: hidden;
color: #fff;
vertical-align: middle;
line-height: 16px;
min-width: 8px;
max-width: 15px;
margin: 3px 0px 0px 2px
font-weight: bold;
position: absolute;
left: 0;
width:50px;
}
/* end: table excel  */

/* start: table excel for transaction  */
.tbl_exl2 {width: 94vw;overflow:scroll;max-height: 2000px;margin:0 auto;float: left;}
.tbl_exl2 table {position:relative;border:1px solid #ddd;border-collapse:collapse;max-width: inherit;}
.tbl_exl2 .trc_1 td {white-space:nowrap;}
.tbl_exl2 td, .tbl_exl2 th, .dtd {border:1px solid #ddd;padding: 8px 10px !important;text-align:center;}
/*.tbl_exl2 th {color:#000;background-color:#eee !important;position:sticky;top:-1px;z-index:93; &:first-of-type {left:0;z-index:95;} 

}*/
.tbl_exl2 tbody tr td:first-of-type{/*background-color: #eee !important;*/position:sticky;left:-1px;text-align:left;z-index:9;}
.dtd {display:table-cell;}
.tbl_exl2 tr:hover td {background:#dadada;}
.tbl_exl2 tr:hover td:first-of-type, .tbl_exl2 tr td:first-of-type, .tbl_exl2 td {padding: 0px 1px !important;}

.tbl_exl2 tr:hover td:first-of-type, .tbl_exl2 tr:hover td:hover, .tbl_exl2 tr:hover td, .tbl_exl2 tr:hover td div, .tbl_exl2 tr:hover .hover_tr  {background: #fff !important;}
.tbl_exl2 tr:hover td a:hover {}
.tbl_exl2 diff {background:#7b0909;color:#fff !important;}
.tbl_exl2.td_relative tbody tr td:first-of-type{position:relative;left:0px;text-align:left;z-index:9;}

.btna .btn {margin:-7px 0 0 0;padding:0 10px;}
.activeTab{ background: var(--color-4) !important; /*font-size:18px;position:relative;border-bottom:2px solid var(--color-4) !important;background:#19d000!important;*/}

</style>