<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Success </title>

</head>

<body style="background:#d1e7dd">

      <?php if(isset($_REQUEST['msg'])){ ?>
	  <div align="center" style=" color:#FFFFFF; margin-top:100px;"><h1><?php echo $_REQUEST['msg'];?></h1></div>
      <?php  }else{ ?>
	  <div align="center" style=" color:#FFFFFF; margin-top:100px;"><h1>Transaction Successfully processed</h1></div>

	  <?php  } ?>
</body>
<!--<script>
	$(document).ready(function(){
 alert(66);
  // set time out 5 sec
     setTimeout(function(){
	 alert(55);
        $('.iframe_close').trigger('click');
    }, 4000);
});
   </script>-->
</html>
