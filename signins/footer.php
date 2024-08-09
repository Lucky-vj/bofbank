<!--Modal for Transaction Details-->

<div class="modal" id="myModalTD">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
          <!--Heading-->
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" style="padding:0;">
        <iframe src="" width="100%" height="500"></iframe>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--///// For open Iframe-->
<div class="modal" id="myModal12">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
          <!--Heading-->
        </h4>
        <button type="button" class="btn-close iframe_close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body" style="padding:0;">
        <iframe id="iframe_loader" src="" width="100%" height="500"></iframe>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary iframe_close" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  /////////// END Modal Iframe /////////////////-->
<div class="modal" id="myModal9">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
          <!--Heading-->
        </h4>
        <button type="button" class="btn-close myModal_close" value="myModal9" data-bs-dismiss="modal88"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="spinner-border text-primary" role="status"> <span class="visually-hidden">Loading...</span> </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary myModal_close" value="myModal9" data-bs-dismiss="modal88">Close</button>
      </div>
    </div>
  </div>
</div>
<script>				



$('.hrefmodal').click(function(){ 

		

		 var urls=$(this).attr('data-href');

		 //alert(urls);

		 var tid=$(this).attr('data-tid');

		 $('#myModalTD').modal('show');

		 $('#myModalTD').modal('show').find('.modal-body').load(urls);

		 if(tid=="Reset Password"){

		 var Modtitle=" " + tid;

		 }else{

		 var Modtitle="Transaction Details - " + tid;

		 }

	     $('#myModalTD .modal-title').html(Modtitle);
         //$('#myModalTD .modal-dialog').css({"max-width":"600px", "margin-top": "5px"});
	});

	

function iframe_open_modal(e){
$('.modal-body iframe').attr('src','<?=$data['Host'];?>/images/loader.gif');

        var subqry=$.trim($(e).text());
		var mid = $(e).attr('data-mid');
		var titles = $(e).attr('data-tid');


		if(mid !== undefined){subqry=$.trim(mid);}
		$('.mprofile').removeClass('mactive');
		$(e).addClass('mactive');
		var urls_load="1";
		var urls=$(e).attr('data-ihref')+"&bid="+subqry;
		//alert(urls);

		//$('.modal-body iframe').attr('src',$(this).attr('href'));

		setTimeout( function() {
		$('.modal-body iframe').attr('src',urls);
		 }, 500);
		$('#myModal12 .modal-title').html(titles);
        $('#myModal12').modal('show');
		//$('#myModal12').modal('show').find('.modal-body').load(urls);
        $('#myModal12 .modal-dialog').css({"max-width":"90%"});
}



//==========End Open Popup from css==================== 

function popup_openv(url){

//alert(url);
$('#myModal9').modal('show').find('.modal-body').load(url);
$('#myModal9 .modal-dialog').css({"max-width":"80%"});

}

$('.myModal_close').on('click', function(e){
  e.preventDefault();
  var theValues = '#'+$(this).val();
  //alert(theValues);
  $(theValues).modal('hide');
});


$('.iframe_close').on('click', function(e){
 $('.modal-body iframe').attr('src','');
});


</script>
