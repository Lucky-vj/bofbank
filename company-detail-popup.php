<?php

$company_fill_status = 0;
if ($_SESSION['members']['company_name'] == "" || $_SESSION['members']['company_address'] == "" || $_SESSION['members']['company_registration_no'] == "" || $_SESSION['members']['date_of_incorporation'] == "" || $_SESSION['members']['country_of_incorporation'] == "") {
  $company_fill_status = 1;
?>
  <div class="modal" id="myModalPop">

    <div class="modal-dialog">

      <div class="modal-content">

        <!-- Modal Header -->

        <div class="modal-header">

          <!--Heading-->
          <h4 class="modal-title">Update Your Company Details</h4>

          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

        </div>

        <!-- Modal body -->

        <div class="modal-body px-2" style="padding:0;">



          <div class="row">

            <div class="col-md-12 my-2">

              <div class="form-floating">

                <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $_SESSION['members']['company_name']; ?>" required>

                <label for="company_name">Company Name</label>

              </div>

            </div>

            <div class="col-md-12 my-2">

              <div class="form-floating">

                <input type="text" name="company_registration_no" class="form-control" id="company_registration_no" placeholder="Company Registration Number" value="<?php echo $_SESSION['members']['company_registration_no']; ?>" required>

                <label for="company_registration_no">Company Registration Number</label>

              </div>

            </div>

            <div class="col-md-12 my-2">

              <div class="form-floating">

                <input type="date" name="date_of_incorporation" class="form-control" id="date_of_incorporation" placeholder="Date of Incorporation" value="<?php echo $_SESSION['members']['date_of_incorporation'] ?>" required>

                <label for="date_of_incorporation">Date of Incorporation</label>

              </div>

            </div>

            <div class="col-md-12 my-2">

              <div class="form-floating">

                <input type="text" name="country_of_incorporation" class="form-control" id="country_of_incorporation" placeholder="Country of Incorporation" value="<?php echo $_SESSION['members']['country_of_incorporation'] ?>" required>

                <label for="country_of_incorporation">Country of Incorporation</label>

              </div>

            </div>

            <!-- <div class="col-md-12 my-2">

              <div class="form-floating">

                <input type="text" name="city_of_incorporation" class="form-control" id="city_of_incorporation" placeholder="Country of Incorporation" value="<?php echo $_SESSION['members']['city_of_incorporation'] ?>" required>

                <label for="city_of_incorporation">City of Incorporation</label>

              </div>

            </div> -->

            <div class="col-md-12 my-2">

              <div class="form-floating">

                <input type="text" name="company_address" class="form-control" id="company_address" placeholder="Company Address" value="<?php echo $_SESSION['members']['company_address'] ?>" required>

                <label for="company_address">Company Address</label>

              </div>

            </div>

          </div>

          <button type="submit" class="btn btn-sm btn-success my-2 btn_modal_update" name="btn_update" value="Update Company Details"><i class="<?= $data['fwicon']['circle-plus']; ?>"></i> Submit</button>



        </div>



      </div>

    </div>

  </div>
  <script>
    $(document).ready(function() {
      $('#myModalPop').modal('show');
    });

    $('.btn_modal_update').click(function() {

      var company_name = $('#company_name').val();
      var company_address = $('#company_address').val();
      var company_registration_no = $('#company_registration_no').val();
      var date_of_incorporation = $('#date_of_incorporation').val();
      var country_of_incorporation = $('#country_of_incorporation').val();
      // var city_of_incorporation = $('#city_of_incorporation').val();

      if (company_name == "") {
        alert("Please enter your company name");
        return;
      } else if (company_registration_no == "") {
        alert("Please enter your company registration no");
        return;
      } else if (date_of_incorporation == "") {
        alert("Please enter date of incorporation");
        return;
      } else if (country_of_incorporation == "") {
        alert("Please enter country of incorporation");
        return;
      } else if (company_address == "") {
        alert("Please enter your company address");
        return;
      } else {

      }

      //alert(ibandata);
      if (company_name != '') {
        $.ajax({
          url: "<?= $data['Host']; ?>/set-company-details.php",
          data: 'company_name=' + company_name + '&company_address=' + company_address + '&company_registration_no=' + company_registration_no + '&date_of_incorporation=' + date_of_incorporation + '&country_of_incorporation=' + country_of_incorporation,
          type: "POST",
          success: function(data) {
            alert(data);
            if (data == 1) {
              location.reload(true);
            } else {
              alert("Company details not update, Please enter correct data");
              return false;
            }
          },
        });

      }

    });
  </script>
<?
}
//echo $company_fill_status;
?>