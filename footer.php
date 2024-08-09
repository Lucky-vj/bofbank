<?php /*?><div class="text-center">Powered by <?=$_SESSION['host_companyname'];?> @ <?=date("Y");?></div><?php */

?>



<div class="modal" id="myModal12">

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

        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div>


<!-- Modal -->

<div class="modal fade" id="twofaModal" tabindex="-1" aria-labelledby="twofaModalLabel" >





  <div class="modal-dialog modal-sm">

    <div class="modal-content">

      <!--<div class="modal-header">

        <h1 class="modal-title fs-5" id="twofaModalLabel">Two-factor authentication</h1>

        

      </div>-->

	 

      <div class="modal-body bg-info-subtle rounded">

	  <div class="text-center my-2"><img src="<?=$data['Host'];?>/images/2fa-min.png"  height="50px;"/></div>

	  <div class="text-center" style="font-size:18px;">Two-factor authentication</div>

        <input type="number" maxlength="6" class="form-control" name="code" id="code" title="Enter Authentication Code" style="text-align: center;" placeholder="******"  required />

		<button type="button" id="match_twofa" class="btn btn-primary btn-sm my-2 w-100">Verify</button>

		<div class="my-0 py-2 fw-lighter"><i class="<?=$data['fwicon']['mobile-screen'];?>"></i> Open two factor authentication app on your device to view your authentication code and verify your identity.</div>

      </div>

      <!--<div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Clear</button>

        

      </div>-->

	 

    </div>

  </div>

</div>

<!-- Modal for Transaction Responce -->
<div class="modal" id="transResponce">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Transaction Responce</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      
    </div>
  </div>
</div>


<!-- Modal for Request IBAN -->
<div class="modal fade" id="requestIBAN" tabindex="-1" aria-labelledby="requestIBANLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="requestIBANLabel">Request IBAN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <div class="mb-3">
            <div class="form-floating">
                        <input class="form-control" name="account_holder_name" id="account_holder_name" type="text" title="Account holder name" placeholder="Account holder name" required>
                        <!-- <label for="amount">Account holder name</label> -->
                      </div>
          </div>
          <div class="mb-3">
            <div class="form-floating">
                       
						<select class="form-select" name="ibancurrency" id="ibancurrency" title="Currency" required >
                        <option value="" selected="selected">Select</option>
                        <?php 
						$currency_list_footer=get_select_list("tbl_iban_issuer","`IBAN_currency`"," AND Status=1 order by IBAN_currency");
						  foreach($currency_list_footer as $crlistf){ ?>
                        <option value="<?=$crlistf['IBAN_currency'];?>"><?=$crlistf['IBAN_currency'];?></option>
                        <? } ?>
                      </select>
                        <label for="amount">Requested Currency</label>
                      </div>
          </div>
        
      </div>
      <div class="modal-footer">
	  <span id="sib" class="btn btn-primary" style="display:none;"></span>
        <button type="button" class="btn btn-primary sendibanrequest">Send request</button>
      </div>
    </div>
  </div>
</div>

<script>

$('.sendibanrequest').click(function() {

	var account_holder_name = $('#account_holder_name').val();
	var ibancurrency = $('#ibancurrency').val();

	if (account_holder_name == '') {
		alert('Please enter account holder name');
		$('#account_holder_name').focus();
		return false;
	} else if (ibancurrency == '') {
		alert('Please enter requested currency');
		$('#ibancurrency').focus();
		return false;
	}

	$(".sendibanrequest").html("<i class='<?= $data['fwicon']['spinner']; ?> fa-spin-pulse'></i> Processing");

	$.ajax({
		url: "<?= $data['Host']; ?>/common/request_iban.php",
		data: 'account_holder_name=' + account_holder_name + '&ibancurrency=' + ibancurrency,
		type: "POST",
		success: function(data) {

			if (data == 1) {
				//$("#sib").removeClass("sendibanrequest");
				$(".sendibanrequest").hide();
				$("#sib").show();
				$("#sib").html('<i class="<?= $data['fwicon']['check-circle']; ?> text-white"></i> IBAN Request Sent..');
				// sleep for 2 seconds
				setTimeout(function() {
					$("#sib").hide();
					$("#requestIBAN").modal('hide');
				}, 2000);
			}
		},
		error: function() {}
	});


});

$('.changeiban').click(function() {
	var ibandata = $(this).attr('data-iban');
	//alert(ibandata);

	if (ibandata != '') {
		$.ajax({
			url: "<?= $data['Host']; ?>/set-iban-session.php",
			data: 'ibandata=' + ibandata,
			type: "POST",
			success: function(data) {
				//alert(data);
				if (data == 1) {
					location.reload(true);
				} else {
					//alert(data);
					return false;
				}
			},
		});

	}

});

$('.hrefmodal').click(function() {



	var urls = $(this).attr('data-href');

	//alert(urls);

	var tid = $(this).attr('data-tid');

	$('#myModal12').modal('show');

	$('#myModal12').modal('show').find('.modal-body').load(urls);


	//if(tid=="BeneficiaryList"){ var Modtitle="" + tid; }else{
	var Modtitle = "" + tid;
	//}

	$('#myModal12 .modal-title').html(Modtitle);

	//$('#myModal12 .modal-dialog').css({"max-width":"600px", "margin-top": "5px"});



});



// For Match 2fa code than submit form

$('#match_twofa').on('click', function() {

	var code = $('#code').val();

	if (code == '') {

		alert('Please enter Authentication Code ex. 123456');

		return false;

	} else if ($.trim(code).length != 6) {

		alert('Please enter 6 digit number');

		return false;

	} else if (!$.isNumeric(code)) {

		alert('Please enter Numeric Value');

		return false;

	}



	$.ajax({

		url: "<?= $data['Host']; ?>/devices-ajax.php",

		data: 'secret=<?= $_SESSION['members']['google_auth_code']; ?>&code=' + code,

		type: "POST",

		success: function(data) {

			if (data == 1) {

				submit_form_verified();

			} else {

				alert(data);

				return false;



			}



		},

		error: function() {}

	});





});
// For Fetch The Kingdom Bank Ac Balance

// $(".fetch-tkb-balance").click(function() {
// 	//alert(1111);
// 	var urls = "<?= $data['Host']; ?>/api/thekingdombank/get-balance";
// 	//alert(urls);
// 	var accountId = $(this).attr('data-tkb');
// 	//alert(accountId);
// 	//return;
// 	$("#account-balance").html("<i class='<?= $data['fwicon']['spinner'] ?> fa-spin-pulse text-success ms-2'></i>");
// 	$.ajax({
// 		type: "POST",
// 		url: urls,
// 		data: {
// 			accountId: accountId
// 		}
// 	}).done(function(data) {
// 		//alert(data);

// 		const balance = parseFloat(data).toFixed(2);
// 		$("#account-balance").html(balance);

// 	});
// });

/*for display tooltip message*/

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {

	return new bootstrap.Tooltip(tooltipTriggerEl)

})

</script>