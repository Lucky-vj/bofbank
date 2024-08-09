<?php
include "common.php";
include "controller/blade.account-summary.php";
//print_r($_SESSION);

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
	.nav-pills {
		max-width: 1094px;
		margin: 25px auto 70px !important;
		margin-bottom: 70px;
		flex-wrap: nowrap;
		white-space: nowrap;
		overflow-x: auto;
	}

	.nav-pills .nav-link {
		color: #000;
		font-family: Epilogue;
		font-size: 16px;
		font-style: normal;
		font-weight: 500;
		line-height: 21px;
		/* 116.667% */
	}

	.nav-pills .nav-link:hover {
		border-radius: 8.721px;
		border: 0.872px solid #FFF !important;
		background: #27AAE1;
		color: #fff;
		border: 0 !important;
	}

	.nav-pills .nav-link.active,
	.nav-pills .show>.nav-link {
		border-radius: 8.721px;
		/* border: 0.872px solid #FFF; */
		background: #27AAE1;
	}

	.fa-star-of-life {
		color: #FF0000 !important;
		font-size: 6px !important;
		position: relative;
		bottom: 7px;
	}

	.col-form-label44 {
		padding-top: 0px !important;
		padding-bottom: 0px !important;
	}

	/* .text-start:hover {
    background: none !important;
} */
	.common-inner-css .row {
		column-gap: 46px;
		justify-content: space-between;
	}

	.common-btn {
		top: 60px;
	}

	.common-inner-css.Individual.box.row {
		justify-content: center;
	}
</style>
<div class="main-content profile-page ">
	<div class="page-content">
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<!-- <h4 class="heading-ad"><i class="<?= $data['fwicon']['history']; ?> fa-fw"></i>
              <?= $data['PageName']; ?>
              <br>
            </h4> -->
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="<?= $data['Host-Home']; ?>" title="Home">Home</a></li>
								<li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15" fill="none">
										<path d="M6.98867 0.000110626C10.8431 -0.003088 14.1109 3.159 14.0364 6.99547C13.9485 11.5205 10.2858 14.0499 7.01422 14.02C3.11724 13.9844 0.0138697 10.9234 8.91287e-05 7.02115C-0.00456101 6.10056 0.172792 5.18814 0.521953 4.33633C0.871114 3.48451 1.3852 2.71012 2.03465 2.05765C2.6841 1.40518 3.4561 0.887516 4.30629 0.534411C5.15647 0.181307 6.06807 -0.000273705 6.98867 0.000110626ZM7.06062 2.97861C4.80609 2.95394 2.98179 4.69998 2.9376 6.92473C2.89311 9.16474 4.71717 11.036 6.97767 11.0694C9.1659 11.1016 11.0272 9.26033 11.0389 7.05169C11.0509 4.79407 9.30161 3.00312 7.06062 2.97861Z" fill="#27AAE1" />
										<path d="M19.207 13.2682H16.3341L19.3341 7.10506L16.3341 0.94188H19.207L22.207 7.10506L19.207 13.2682Z" fill="#27AAE1" />
									</svg></li>
								<li class="breadcrumb-item active">
									<?= $data['PageName']; ?>
								</li>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="nav nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<!-- <? if ($personal_details == 0) { ?> active <? } ?> -->
						<span class=" button nav-link my-1 <? if ($personal_details == 1) { ?> active <? } ?>" id="v-PersonalDetails-tab" data-bs-toggle="pill" data-bs-target="#v-PersonalDetails" type="button" role="tab" aria-controls="v-PersonalDetails" aria-selected="true"> Personal Details</span>

						<span class=" button nav-link my-1" id="v-MemberAddress-tab" data-bs-toggle="pill" data-bs-target="#v-MemberAddress" type="button" role="tab" aria-controls="v-MemberAddress" aria-selected="true"> Home Address</span>

						<span class="nav-link my-1" id="v-CompanyDetails-tab" data-bs-toggle="pill" data-bs-target="#v-CompanyDetails" type="button" role="tab" aria-controls="v-CompanyDetails" aria-selected="false"> Owner`s Details</span>

						<span class="nav-link my-1" id="v-AdditionalDetails-tab" data-bs-toggle="pill" data-bs-target="#v-AdditionalDetails" type="button" role="tab" aria-controls="v-AdditionalDetails" aria-selected="false">Additional Details</span>

						<span class="nav-link my-1" id="v-KYCStatus-tab" data-bs-toggle="pill" data-bs-target="#v-KYCStatus" type="button" role="tab" aria-controls="v-KYCStatus" aria-selected="false"> KYC Status</span>

						<span class="nav-link my-1" id="v-AccountStatus-tab" data-bs-toggle="pill" data-bs-target="#v-AccountStatus" type="button" role="tab" aria-controls="v-AccountStatus" aria-selected="false">Account Status</span>
						<!-- <? if ($personal_details == 1) { ?> active <? } ?> -->
						<span class="nav-link my-1 <? if ($personal_details == 7) { ?> active <? } ?>" id="v-AccountSummary-tab" data-bs-toggle="pill" data-bs-target="#v-AccountSummary" type="button" role="tab" aria-controls="v-AccountSummary" aria-selected="false"> Account Summary</span>



					</div>
				</div>
				<div class="col-lg-12 contain-width">
					<div class="inner-page card">
						<!-- <div class="edit-profile"><img src="../images/pen.svg" alt="edit"></div> -->

						<div class="card-body">
							<div class=" align-items-start p-2">


								<div class="tab-content profile-inner-con" id="v-pills-tabContent">
									<div class="tab-pane fade profile-page1 show <? if ($personal_details == 1) { ?> active <? } ?>" id="v-PersonalDetails" role="tabpanel" aria-labelledby="v-PersonalDetails-tab" tabindex="0">

										<div class="row py-1 rounded">
											<div class="mb-2 fs-5 hide-title">Tell us more about personal detail</div>
											<div class="col-sm-12 px-2 clearfix">
												<p>Fill details to help us in understanding your business better and meet the requirements of regulators, financial partners and our Services Agreement.</p>
												<label for="blacklist_value" class="col-sm-12 col-form-label">Contact Name: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
												<div class="row">
													<div class="col-sm-2 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<i class="fa-solid fa-angle-down"></i>
															<select name="title" id="title" class="form-select form-select-sm" title="Select Title" data-bs-toggle="tooltip" data-bs-placement="right" required>
																<option value="" selected="selected">Select</option>
																<option value="Mr" <?php if ($rs['title'] == "Mr") { ?> selected="selected" <? } ?>>Mr.</option>
																<option value="Ms" <?php if ($rs['title'] == "Ms") { ?> selected="selected" <? } ?>>Ms.</option>
																<option value="Mrs" <?php if ($rs['title'] == "Mrs") { ?> selected="selected" <? } ?>>Mrs.</option>
															</select>
														</div>
													</div>
													<div class="col-sm-5 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<input type="text" id="first_name" name="first_name" class="form-control form-control-sm" placeholder="Enter first name" value="<?php echo $rs['first_name'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter first name">
														</div>
													</div>
													<div class="col-sm-5 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<input type="text" id="last_name" name="last_name" class="form-control form-control-sm" placeholder="Enter last name" value="<?= $rs['last_name'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter last name">
														</div>
													</div>
												</div>
												<label for="blacklist_value" class="col-sm-12 col-form-label">Email: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
												<div class="row">
													<div class="col-sm-12 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<input type="text" id="email" name="email" class="form-control form-control-sm" placeholder="Enter email" value="<?= $rs['email'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter email" disabled="disabled">
														</div>
													</div>
												</div>
												<label for="blacklist_value" class="col-sm-12 col-form-label">Contact Number: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
												<div class="row">
													<div class="col-sm-6 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<i class="fa-solid fa-angle-down"></i>
															<select name="country_code" id="country_code" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Country Code" required>
																<option value="" selected="selected">Select</option>
																<?php
																foreach ($country_list as $clist) { ?>
																	<option value="<?= $clist['Country_Code']; ?>"><?= $clist['country']; ?> ( + <?= $clist['Country_Code']; ?>)</option>
																<? } ?>
															</select>
														</div>


														<? if (isset($rs['country_code'])) { ?>
															<script>
																$('#country_code option[value="<?= $rs['country_code'] ?>"]').prop('selected', 'selected');
															</script>
														<? } ?>
													</div>
													<div class="col-sm-6 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<input type="text" id="mobile" name="mobile" class="form-control form-control-sm" placeholder="Enter phone / mobile" value="<?= $rs['mobile'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter phone / mobile number">
														</div>
													</div>
												</div>
												<label for="blacklist_value" class="col-sm-12 col-form-label">Gender & Date of Birth: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
												<div class="row">
													<div class="col-sm-6 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<i class="fa-solid fa-angle-down"></i>
															<select name="gender" id="gender" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Gender" required>
																<option value="" selected="selected">Select</option>
																<option value="M" <?php if ($rs['gender'] == "M") { ?> selected="selected" <? } ?>>Male</option>
																<option value="F" <?php if ($rs['gender'] == "F") { ?> selected="selected" <? } ?>>Female</option>
																<option value="O" <?php if ($rs['gender'] == "O") { ?> selected="selected" <? } ?>>Other</option>
															</select>
														</div>

													</div>
													<div class="col-sm-6 py-1 inner-col my-2">
														<div class="form-floating inner_page_input">
															<!-- <i class="fa-solid fa-calendar-days cals fs-2x text-info"></i> -->
															<input type="date" name="birth_date" id="birth_date" class="form-control form-control-sm date" placeholder="Date Of Birth" value="<?php echo $rs['birth_date'] ?>" max="<?= date('Y-m-d', strtotime('-18 years')); ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Date Of Birth" required>
														</div>
													</div>
												</div>
												<div class="row px-1">
													<div class="form-group common-btn">
														<!--<i class="fa-solid fa-circle-plus"></i>-->
														<a href="#" type="submit" class="btn btn-sm submit-cmn-btn update-personal-details" name="btn_submit" value="Submit">Continue</a>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="tab-pane fade common-inner-css show " id="v-MemberAddress" role="tabpanel" aria-labelledby="v-MemberAddress-tab" tabindex="0">
										<div class="col-sm-12 px-2 clearfix">
											<div class="mb-2 fs-5 hide-title">Tell us more about your address</div>
											<p>Fill details to help us in understanding your business better and meet the requirements of regulators, financial partners and our Services Agreement.</p>
										</div>
										<div class="row py-1 rounded">

											<!-- <div class="col-sm-12 px-2 clearfix"> -->
											<div class="col-md-4 inner-col my-2">
												<div class="form-floating inner_page_input">
													<label for="blacklist_value" class="col-form-label">Address Line - 1: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
													<input type="text" id="address_line1" name="address_line1" class="form-control form-control-sm" placeholder="Enter Address Line - 1" value="<?= $rs['address_line1'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Address Line - 1">
												</div>
											</div>
											<div class="col-md-4 inner-col my-2">
												<div class="form-floating inner_page_input">
													<label for="blacklist_value" class="col-form-label">Address Line - 2: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
													<input type="text" id="address_line2" name="address_line2" class="form-control form-control-sm" placeholder="Enter Address Line - 2" value="<?= $rs['address_line2'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Address Line - 2">
												</div>
											</div>
											<div class="col-md-4 inner-col my-2">
												<div class="form-floating inner_page_input">
													<label for="blacklist_value" class="col-form-label">City: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
													<input type="text" id="city" name="city" class="form-control form-control-sm" placeholder="Enter city" value="<?= $rs['city'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter city">
												</div>
											</div>
											<div class="col-md-4 inner-col my-2">
												<div class="form-floating inner_page_input">
													<label for="blacklist_value" class="col-form-label">State: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
													<input type="text" id="state" name="state" class="form-control form-control-sm" placeholder="Enter state" value="<?= $rs['state'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter state">
												</div>
											</div>
											<div class="col-md-4 inner-col my-2">
												<div class="form-floating inner_page_input">
													<label for="blacklist_value" class="col-form-label">Country: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
													<select name="country" id="country" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Country" required>
														<option value="" selected="selected">Select</option>
														<?php
														foreach ($country_list as $clist) { ?>
															<option value="<?= $clist['country']; ?>"><?= $clist['country']; ?></option>
														<? } ?>
													</select>
													<? if (isset($rs['country'])) { ?>
														<script>
															$('#country option[value="<?= $rs['country'] ?>"]').prop('selected', 'selected');
														</script>
													<? } ?>
												</div>

											</div>
											<div class="col-md-4 inner-col my-2">
												<div class="form-floating inner_page_input">
													<label for="blacklist_value" class="col-form-label">Postal Code:<i class="<?= $data['fwicon']['star']; ?>"></i></label>
													<input type="text" id="pincode" name="pincode" class="form-control form-control-sm" placeholder="Enter Postal Code" value="<?= $rs['pincode'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Postal Code">
												</div>
											</div>


											<div class="col-md-4 inner-col my-2">
												<div class="form-floating inner_page_input">
													<label for="additional_information" class="col-form-label">Additional Information: </label>
													<input type="text" id="additional_information" name="additional_information" class="form-control form-control-sm" placeholder="Enter Additional Information" value="<?= $rs['additional_information'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Additional Information">
												</div>
											</div>

											<div class="form-group common-btn">
												<!--<i class="fa-solid fa-circle-plus"></i>-->
												<a href="#" type="submit" class="btn btn-sm submit-cmn-btn update_user_address " name="btn_submit" value="Submit">Continue</a>
											</div>
											<!-- </div> -->
										</div>
									</div>

									<div class="tab-pane fade show" id="v-CompanyDetails" role="tabpanel" aria-labelledby="v-CompanyDetails-tab" tabindex="0">

										<div class="row py-1">
											<div class="col-sm-12 px-2 clearfix">
												<div class="mb-2 fs-5 hide-title">Tell us More About yourself</div>
											</div>
											<div class="col-sm-12 px-2 clearfix">

												<div class="text-center border mx-1 p-2 tab-inner-head row">
													<div class="form-check col-sm-4 text-start">
														<input class="form-check-input" type="radio" name="owner_type" value="Individual" id="Individual" <?php if (($rs['owner_type'] == "Individual") or ($rs['owner_type'] == "")) {
																																								$display1 = "display:none"; ?> checked="checked" <? } ?>>

														<label for="Individual">Individual A/C</label>


													</div>
													<div class="form-check col-sm-4 text-start">

														<input class="form-check-input" type="radio" name="owner_type" value="Corporate" id="Corporate" <?php if ($rs['owner_type'] == "Corporate") {
																																							$display2 = "display:none"; ?> checked="checked" <? } ?>>

														<label for="Corporate">Corporate A/C</label>


													</div>

												</div>

												<div class="common-inner-css Individual box row" style="<?= $display2; ?>">
													<div class="col-md-6 inner-col my-2">
														<div class="form-floating inner_page_input text-center">
															<label for="individual_type" class="col-form-label">Select Type: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<select name="individual_type" id="individual_type" class="form-select form-select-sm" title="Select Type" data-bs-toggle="tooltip" data-bs-placement="right" required>
																<option value="" selected="selected">Select</option>
																<option value="Salaried" <?php if ($rs['individual_type'] == "Salaried") { ?> selected="selected" <? } ?>>Salaried</option>
																<option value="Self Employee" <?php if ($rs['individual_type'] == "Self Employee") { ?> selected="selected" <? } ?>>Self Employee</option>
																<option value="House Wife" <?php if ($rs['individual_type'] == "UBO") { ?> selected="selected" <? } ?>>House Wife</option>

															</select>
														</div>

													</div>

												</div>
												<div class="common-inner-css Corporate box" style="<?= $display1; ?>">
													<div class="row">
														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="role_in_company" class="col-form-label">What is your role in company: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<select name="role_in_company" id="role_in_company" class="form-select form-select-sm" title="Select Role in Companu" data-bs-toggle="tooltip" data-bs-placement="right" required>
																	<option value="" selected="selected">Select</option>
																	<option value="Director" <?php if ($rs['role_in_company'] == "Director") { ?> selected="selected" <? } ?>>Director</option>
																	<option value="Share Holder" <?php if ($rs['role_in_company'] == "Share Holder") { ?> selected="selected" <? } ?>>Share Holder</option>
																	<option value="UBO" <?php if ($rs['role_in_company'] == "UBO") { ?> selected="selected" <? } ?>>UBO</option>
																	<option value="Manager" <?php if ($rs['role_in_company'] == "Manager") { ?> selected="selected" <? } ?>>Manager</option>
																	<option value="Emplyee" <?php if ($rs['role_in_company'] == "Emplyee") { ?> selected="selected" <? } ?>>Emplyee</option>
																	<option value="None" <?php if ($rs['role_in_company'] == "None") { ?> selected="selected" <? } ?>>None</option>
																</select>
															</div>

														</div>

														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="business_activity" class="col-form-label">Business Activity: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<select name="business_activity" id="business_activity" class="form-select form-select-sm" title="Select Business Activity" data-bs-toggle="tooltip" data-bs-placement="right" required>
																	<option value="" selected="selected">Select</option>
																	<option value="Agriculture">Agriculture</option>
																	<option value="Bank">Bank</option>
																	<option value="Construction">Construction</option>
																	<option value="Communications">Communications</option>
																	<option value="Energy Sector">Energy Sector</option>
																	<option value="Entertainment & tourism">Entertainment & tourism</option>
																	<option value="Finance">Finance</option>
																	<option value="IT Software">IT Software</option>
																	<option value="Manufacturing">Manufacturing</option>
																	<option value="Professional Consultant">Professional Consultant</option>
																	<option value="Public Sector">Public Sector</option>
																	<option value="Retail">Retail</option>
																	<option value="Transport">Transport</option>
																	<option value="Wholesale">Wholesale</option>
																	<option value="Other">Other</option>
																</select>
																<? if (isset($rs['business_activity'])) {  ?>
																	<script>
																		$('#business_activity option[value="<?= $rs['business_activity'] ?>"]').prop('selected', 'selected');
																	</script>
																<? } ?>
															</div>

														</div>

														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="company_name" class="col-form-label">Company Name: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<input type="text" id="company_name" name="company_name" class="form-control form-control-sm" placeholder="Enter company name" value="<?= $rs['company_name'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter company name">
															</div>
														</div>

														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="company_registration_no" class="col-form-label">Company Registration No: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<input type="text" id="company_registration_no" name="company_registration_no" class="form-control form-control-sm" placeholder="Enter Company Registration Number" value="<?= $rs['company_registration_no'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Company Registration Number">
															</div>
														</div>

														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="blacklist_value" class="col-form-label">Date of Incorporation: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<input type="date" id="date_of_incorporation" name="date_of_incorporation" class="form-control form-control-sm date" placeholder="Enter Date of Incorporation" value="<?= $rs['date_of_incorporation'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" max="<?= date('Y-m-d', strtotime('-1 days')); ?>" title="Enter Date of Incorporation">
															</div>
														</div>

														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="blacklist_value" class="col-form-label">Country of Incorporation: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<select name="country_of_incorporation" id="country_of_incorporation" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Country" required>
																	<option value="" selected="selected">Select</option>
																	<?php
																	foreach ($country_list as $clist) { ?>
																		<option value="<?= $clist['country']; ?>"><?= $clist['country']; ?></option>
																	<? } ?>
																</select>
																<? if (isset($rs['country_of_incorporation'])) {  ?>
																	<script>
																		$('#country_of_incorporation option[value="<?= $rs['country_of_incorporation'] ?>"]').prop('selected', 'selected');
																	</script>
																<? } ?>
															</div>

														</div>

														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="city_of_incorporation" class="col-form-label">City of Incorporation: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<input type="text" id="city_of_incorporation" name="city_of_incorporation" class="form-control form-control-sm" placeholder="Enter City" value="<?= $rs['city_of_incorporation'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter City">
															</div>
														</div>

														<div class="col-md-4 inner-col my-2">
															<div class="form-floating inner_page_input">
																<label for="company_address" class="col-form-label">Company Address: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
																<input type="text" id="company_address" name="company_address" class="form-control form-control-sm" placeholder="Enter Company Address" value="<?= $rs['company_address'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Company Address">
															</div>
														</div>
													</div>
												</div>

												<div class="form-group common-btn">
													<!--<i class="fa-solid fa-circle-plus"></i>-->
													<a href="#" type="submit" class="btn btn-sm submit-cmn-btn update_company_details" name="btn_submit update_company_details" value="Submit">Continue</a>
												</div>
											</div>
										</div>

									</div>

									<div class="tab-pane fade show" id="v-AdditionalDetails" role="tabpanel" aria-labelledby="v-AdditionalDetails-tab" tabindex="0">

										<div class="row py-1 rounded">
											<div class="col-sm-12 px-2 clearfix">
												<div class="mb-2 fs-5 hide-title">Tell us more about your additional details</div>
											</div>
											<div class="common-inner-css  col-sm-12 px-2 clearfix">
												<div class="row">
													<div class="col-md-4 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label for="blacklist_value" class="col-form-label">What`s your nationality?: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<select name="nationality" id="nationality" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select nationality" required>
																<option value="" selected="selected">Select</option>
																<?php
																foreach ($country_list as $clist) { ?>
																	<option value="<?= $clist['ISO_2_DIGIT']; ?>"><?= $clist['country']; ?></option>
																<? } ?>
															</select>
															<? if (isset($rs['nationality'])) {  ?>
																<script>
																	$('#nationality option[value="<?= $rs['nationality'] ?>"]').prop('selected', 'selected');
																</script>
															<? } ?>
														</div>

													</div>

													<div class="col-md-4 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label for="blacklist_value" class="col-form-label">ID Type: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<select name="doc_id_type" id="doc_id_type" class="form-select form-select-sm" title="ID Type" data-bs-toggle="tooltip" data-bs-placement="right" required>
																<option value="" selected="selected">Select</option>
																<option value="ssn" <?php if ($rs['doc_id_type'] == "ssn") { ?> selected="selected" <? } ?>>SSN</option>
																<option value="passport" <?php if ($rs['doc_id_type'] == "passport") { ?> selected="selected" <? } ?>>Passport</option>
															</select>
														</div>
													</div>


													<div class="col-md-4 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label for="blacklist_value" class="col-form-label">ID Number: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<input type="text" id="doc_id_number" name="doc_id_number" class="form-control form-control-sm" placeholder="Enter id number" value="<?= $rs['doc_id_number'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter id number">
														</div>
													</div>
													<div class="col-md-4 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label for="blacklist_value" class="col-form-label">ID Expiry Date: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<input type="date" name="doc_id_exp_date" class="form-control form-control-sm date" id="doc_id_exp_date" placeholder="ID Expiry Date" value="<?php echo $rs['doc_id_exp_date'] ?>" min="<?= date('Y-m-d'); ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="ID Expiry Date" required>
														</div>
													</div>
												</div>

												<div class="form-group common-btn">
													<!--<i class="fa-solid fa-circle-plus"></i>-->
													<a href="#" type="submit" class="btn btn-sm submit-cmn-btn update_additional_details" name="btn_submit" value="Submit">Continue</a>
												</div>
											</div>
										</div>

									</div>

									<div class="tab-pane fade show" id="v-KYCStatus" role="tabpanel" aria-labelledby="v-KYCStatus-tab" tabindex="0">

										<div class="mb-2 fs-5 hide-title">KYC Status <? if ($kyc_data['Admin_Kyc_status'] == 1) { ?> <span id="kyc-status-loader"><?= $kyc_data['Kyc_status']; ?></span><? } else { ?> Pending <? } ?><? if (($kyc_data['Kyc_status'] <> 'completed') && ($kyc_data['Kyc_status'] <> '')) { ?>

												<a title="Check Status" class="mx-2"><i class="<?= $data['fwicon']['rotate']; ?> fetch-kyc-status text-success pointer" data-tkb="<?= $accountid; ?>"></i></a>
												<?php /*?><a class="hrefmodal btn btn-sm btn-success m-2" data-tid="KYC Status" data-href="<?=$data['Host'];?>/api/sumsub/check-kyc-status<?=$data['ex']?>" title="KYC Status" > Check Status </a><?php */ ?> <? } ?>
										</div>
										<div class="text-start completed-status">

											<?php
											if (isset($kyc_data['Kyc_status']) && $kyc_data['Kyc_status']) {

												if ($kyc_data['Kyc_status'] == "completed") {

													if ($kyc_data['Admin_Kyc_status'] == 0) {
														echo '<p> Your account is under verification </p>';

														if ($_SESSION['s_status'] <> 'New') {
															echo "Switch to Other Account";
											?>
															<ul class="metismenu list-unstyled side-menu mx-0">
																<li class="text-start ">
																	<button class="dropdown-toggle44 btn btn-light btn-sm text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																		<?= get_iban_account_number($Client_ID, $_SESSION['default_IBAN_issuer']) ?>&nbsp;&nbsp;<i class="fa-solid fa-caret-down fa-fw float-end mt-1"></i> <?php if (isset($currency) && $currency) {
																																																								echo $currency_symbol;
																																																							} ?> <span id="account-balance"><strong><?php echo $totalbalance; ?></strong></span>
																	</button>
																	<ul class="dropdown-menu bg-success-subtle">
																		<?= get_iban_list($Client_ID) ?>
																	</ul>

															</ul>
													<?
														}
													} else {
														echo '<img src="../images/status-completed.gif" alt="status-completed">';
													}
												} elseif ($kyc_data['Kyc_status'] != "") {
													//echo '<i class="fa-solid fa-circle-half-stroke text-warning fa-8x mx-4"  title="KYC Status Pending"></i>';
													?>
													<?php if (isset($kyc_data['kyc_id']) && $kyc_data['kyc_id']) { ?>

														<? if ($kyc_data['Kyc_status'] <> 'completed') { ?>
															<div class="text-start">
																<a href="<?= $kyc_data['kyc_link']; ?>" class="btn btn-sm btn-outline-success m-2" title="Click for Complete KYC Online" target="_blank">Complete KYC Online <i class="fa-solid fa-right-long fa-beat"></i></a>
																<p>* Your kyc link expired after 24 hours or has already been used</p>
																<?php
																if ($_SESSION['s_status'] <> 'New') {
																	echo "Switch to Other Account";
																?>
																	<ul class="metismenu list-unstyled side-menu mx-0">
																		<li class="text-start">
																			<button class="dropdown-toggle44 btn btn-light btn-sm text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																				<?= get_iban_account_number($Client_ID, $_SESSION['default_IBAN_issuer']) ?>&nbsp;&nbsp;<i class="fa-solid fa-caret-down fa-fw float-end mt-1"></i> <?php if (isset($currency) && $currency) {
																																																										echo $currency_symbol;
																																																									} ?> <span id="account-balance"><strong><?php echo $totalbalance; ?></strong></span>
																			</button>
																			<ul class="dropdown-menu bg-success-subtle">
																				<?= get_iban_list($Client_ID) ?>
																			</ul>


																	</ul>
																<?
																}
																?>
															</div>


														<? } ?>


													<? } ?>
											<?

												} else {
												}
											}
											?>
										</div>

									</div>

									<div class="tab-pane fade show" id="v-AccountStatus" role="tabpanel" aria-labelledby="v-AccountStatus-tab" tabindex="0">

										<div class="mb-2 fs-5 hide-title">Account Status <? if (isset($ibanacc[0]['accountStatus']) && $ibanacc[0]['accountStatus']) {
																							} ?></div>
										<p>SUCCESS<? if (isset($ibanacc[0]['accountid']) && $ibanacc[0]['accountid']) { ?> [<?= $ibanacc[0]['accountid']; ?>] <? } ?></p>
										<div class="text-center">
											<div class="table-responsive">

												<table class="table table-striped">

													<?php if (isset($kyc_data['Kyc_status']) && $kyc_data['Kyc_status'] == 'completed') { ?>
														<?php if (isset($ibanacc[0]['accountid']) && $ibanacc[0]['accountid']) {
															echo '<img src="./images/status-completed.gif" alt="status-completed" title="account activated">';
														} else { ?>
															<p class='btn btn-sm btn-outline-warning p-2'> Account Activation Pending </p>
														<? } ?>
													<? } else { ?>
														<p class='btn btn-sm btn-outline-warning p-2'> KYC Pending </p>
													<? } ?>
												</table>
											</div>
										</div>
									</div>

									<div class="tab-pane fade show <? if ($personal_details == 7) { ?> active <? } ?>" id="v-AccountSummary" role="tabpanel" aria-labelledby="v-AccountSummary-tab" tabindex="0">

										<div class="row py-1 rounded review">
											<div class="mb-2 fs-5 hide-title">Review and Update</div>

											<div class="px-2 common-inner-css clearfix">
												<p>You're almost ready to start exploring. Take a moment to review and confirm your information.</p>

												<div class="row">
													<div class="col-md-5 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label class="my-2 fs-6 fw-bold hide-title col-form-label">Personal Details</label>
															<div class="border rounded completed-input p-2 my-2">
																<div class="vkg dropdown-toggle55"><i class="<?= $personal_details_icon; ?>"></i> Filled required personal details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit personal details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-PersonalDetails-tab"></i></div>
															</div>
														</div>
													</div>
													<div class="col-md-5 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label class="my-2 fs-6 fw-bold hide-title col-form-label"> Home Address</label>
															<div class="border rounded completed-input  p-2 my-2">
																<div class="vkg dropdown-toggle55"><i class="<?= $address_details_icon; ?>"></i> Filled required address details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit address details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-MemberAddress-tab"></i></div>
															</div>
														</div>
													</div>
													<div class="col-md-5 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label class="my-2 fs-6 fw-bold hide-title col-form-label"> Owner`s Details</label>
															<div class="border rounded completed-input  p-2 my-2">
																<div class="vkg dropdown-toggle55"><i class="<?= $company_details_icon; ?>"></i> Filled required company details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit company details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-CompanyDetails-tab"></i></div>
															</div>
														</div>
													</div>
													<div class="col-md-5 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label class="my-2 fs-6 fw-bold hide-title col-form-label"> Additional Details</label>
															<div class="border rounded completed-input  p-2 my-2">
																<div class="vkg dropdown-toggle55"><i class="<?= $additional_details_icon; ?>"></i> Filled required additional details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit additional details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-AdditionalDetails-tab"></i></div>
															</div>
														</div>
													</div>
													<div class="col-md-5 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label class="my-2 fs-6 fw-bold hide-title col-form-label"> KYC Status</label>
															<div class="border rounded completed-input  p-2 my-2">
																<div class="vkg dropdown-toggle55"><i class="<?= $IBAnKYC; ?>"></i> Filled required KYC status <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to view KYC status" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-KYCStatus-tab"></i></div>
															</div>
														</div>
													</div>
													<div class="col-md-5 inner-col my-2">
														<div class="form-floating inner_page_input">
															<label class="my-2 fs-6 fw-bold hide-title col-form-label">Account Status</label>
															<!-- style="max-width:450px;" -->
															<div class="border rounded completed-input   p-2 my-2">
																<div class="vkg dropdown-toggle55"><i class="<?= $IBAnAccountDetails; ?>"></i> Filled required Account status <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to view Account status" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-AccountStatus-tab"></i></div>
															</div>
														</div>
													</div>
												</div>


											</div>

										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
					<? include($data['Path'] . '/footer' . $data['iex']); ?>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
<!-- /Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<?php if (isset($kyc_data['Kyc_status']) && ($kyc_data['Kyc_status'] == "init" || $kyc_data['Kyc_status'] == "pending")) { ?>
	<script language="javascript">
		setTimeout(function() {
			window.location.reload(1);
		}, 30000);
	</script>
<?php } ?>


<script>
	$(document).ready(function() {

		<? if (($_SESSION['reg-step'] == 2) && ($address_details == 0)) { ?>
			$('#v-MemberAddress-tab').trigger('click');
		<? } ?>

		<? if (($_SESSION['reg-step'] == 3) && ($company_details == 0)) { ?>
			$('#v-CompanyDetails-tab').trigger('click');
		<? } ?>

		<? if (($_SESSION['reg-step'] == 4) && ($additional_details == 0)) { ?>
			$('#v-AdditionalDetails-tab').trigger('click');
		<? } ?>

		<? if (($_SESSION['reg-step'] == 5) && (($kyc_data['Kyc_status'] != "completed") || ($kyc_data['Admin_Kyc_status'] != 1))) { ?>
			$('#v-KYCStatus-tab').trigger('click');
		<? } ?>

		<? if ($_SESSION['reg-step'] == 6) { ?>
			$('#v-AccountStatus-tab').trigger('click');
		<? } ?>

		<? if ($_SESSION['reg-step'] == 7) { ?>
			$('#IBAn-Account-Balance-tab').trigger('click');
		<? } ?>

	});

	// Trigger Tab
	$('.open_tab').on('click', function() {
		var data_tid = $(this).attr('data-tid');
		//alert(data_tid);
		$(data_tid).trigger('click');
	});


	// For update personal details
	$('.update-personal-details').on('click', function() {

		var title = $('#title').val();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		/*var email=$('#email').val();*/
		var country_code = $('#country_code').val();
		var mobile = $('#mobile').val();
		var gender = $('#gender').val();
		var birth_date = $('#birth_date').val();


		if (title == '') {
			alert('Please enter title');
			$('#title').focus();
			return false;
		} else if (first_name == '') {
			alert('Please enter first name');
			$('#first_name').focus();
			return false;
		} else if (last_name == '') {
			alert('Please enter last name');
			$('#last_name').focus();
			return false;
		} else if (country_code == '') {
			alert('Please enter country code');
			$('#country_code').focus();
			return false;
		} else if (mobile == '') {
			alert('Please enter phone / mobile no');
			$('#mobile').focus();
			return false;
		} else if (gender == '') {
			alert('Please enter gender');
			$('#gender').focus();
			return false;
		} else if (birth_date == '') {
			alert('Please enter birth date');
			$('#birth_date').focus();
			return false;
		}

		$(".loader-icon-p").html("<i class='<?= $data['fwicon']['spinner']; ?> fa-spin-pulse'></i>");

		$.ajax({
			url: "<?= $data['Host']; ?>/common/update-personal-details.php",
			data: 'title=' + title + '&first_name=' + first_name + '&last_name=' + last_name + '&email=' + email + '&country_code=' + country_code + '&mobile=' + mobile + '&gender=' + gender + '&birth_date=' + birth_date,
			type: "POST",
			success: function(data) {
				//alert(data);
				if (data == 1) {
					$(".loader-icon-p").html('<i class="<?= $data['fwicon']['check-circle']; ?> text-white"></i> Personal Details Updated..');

					setTimeout(function() {

						<? if ($personal_details == 0) { ?>
							location.reload(true);
						<? } else { ?>
							//icon change
							$('#v-MemberAddress-tab').trigger('click');
						<? } ?>
					}, 1000);
				}
			},
			error: function() {}
		});

	});

	// For update user Address
	$('.update_user_address').on('click', function() {


		var address_line1 = $('#address_line1').val();
		var address_line2 = $('#address_line2').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var country = $('#country').val();
		var pincode = $('#pincode').val();
		var additional_information = $('#additional_information').val();


		if (address_line1 == '') {
			alert('Please enter address line1');
			$('#address_line1').focus();
			return false;
		} else if (address_line2 == '') {
			alert('Please enter address line2');
			$('#address_line2').focus();
			return false;
		} else if (city == '') {
			alert('Please enter city');
			$('#city').focus();
			return false;
		} else if (state == '') {
			alert('Please enter state');
			$('#state').focus();
			return false;
		} else if (country == '') {
			alert('Please enter country');
			$('#country').focus();
			return false;
		} else if (pincode == '') {
			alert('Please enter pincode / zip code');
			$('#mobile').focus();
			return false;
		}

		$(".loader-icon-a").html("<i class='<?= $data['fwicon']['spinner']; ?> fa-spin-pulse'></i>");



		$.ajax({
			url: "<?= $data['Host']; ?>/common/update_user_address.php",
			data: 'address_line1=' + address_line1 + '&address_line2=' + address_line2 + '&city=' + city + '&state=' + state + '&country=' + country + '&pincode=' + pincode + '&additional_information=' + additional_information,
			type: "POST",
			success: function(data) {
				//alert(data);
				if (data == 1) {
					$(".loader-icon-a").html('<i class="<?= $data['fwicon']['check-circle']; ?> text-white"></i> Address Updated..');

					setTimeout(function() {
						<? if ($address_details == 0) { ?>
							location.reload(true);
						<? } else { ?>
							//icon change
							$('#v-CompanyDetails-tab').trigger('click');
						<? } ?>
					}, 1000);
				}
			},
			error: function() {}
		});

	});

	// For update Company Details
	$('.update_company_details').on('click', function() {

		var company_name = $('#company_name').val();
		var company_registration_no = $('#company_registration_no').val();
		var date_of_incorporation = $('#date_of_incorporation').val();
		var country_of_incorporation = $('#country_of_incorporation').val();
		var city_of_incorporation = $('#city_of_incorporation').val();
		var company_address = $('#company_address').val();
		var role_in_company = $('#role_in_company').val();
		var business_activity = $('#business_activity').val();
		var owner_type = $('input[name="owner_type"]:checked').val();;
		var individual_type = $('#individual_type').val();



		if (owner_type == "Individual") {

			if (individual_type == '') {
				alert('Please select Type');
				$('#individual_type').focus();
				return false;
			}
		} else if (owner_type == "Corporate") {


			if (role_in_company == '') {
				alert('Please select role in company');
				$('#role_in_company').focus();
				return false;
			} else if (business_activity == '') {
				alert('Please select business activity');
				$('#business_activity').focus();
				return false;
			} else if (company_registration_no == '') {
				alert('Please enter company registration no');
				$('#company_registration_no').focus();
				return false;
			} else if (company_registration_no == '') {
				alert('Please enter company registration no');
				$('#company_registration_no').focus();
				return false;
			} else if (date_of_incorporation == '') {
				alert('Please enter date of incorporation');
				$('#date_of_incorporation').focus();
				return false;
			} else if (country_of_incorporation == '') {
				alert('Please enter country of incorporation');
				$('#country_of_incorporation').focus();
				return false;
			} else if (city_of_incorporation == '') {
				alert('Please enter city of incorporation');
				$('#city_of_incorporation').focus();
				return false;
			} else if (company_address == '') {
				alert('Please enter company address');
				$('#company_address').focus();
				return false;
			}

		} else {
			alert("Please select Owner Type");
			return;
		}



		//return;



		$(".loader-icon-c").html("<i class='<?= $data['fwicon']['spinner']; ?> fa-spin-pulse'></i>");


		$.ajax({
			url: "<?= $data['Host']; ?>/common/update_company_details.php",
			data: 'company_name=' + company_name + '&company_registration_no=' + company_registration_no + '&date_of_incorporation=' + date_of_incorporation + '&country_of_incorporation=' + country_of_incorporation + '&city_of_incorporation=' + city_of_incorporation + '&company_address=' + company_address + '&role_in_company=' + role_in_company + '&business_activity=' + business_activity + '&owner_type=' + owner_type + '&individual_type=' + individual_type,
			type: "POST",
			success: function(data) {
				//alert(data);
				if (data == 1) {
					$(".loader-icon-c").html('<i class="<?= $data['fwicon']['check-circle']; ?> text-white"></i> Company Details Updated..');

					setTimeout(function() {
						<? if ($company_details == 0) { ?>
							location.reload(true);
						<? } else { ?>
							//icon change
							$('#v-AdditionalDetails-tab').trigger('click');
						<? } ?>
					}, 1000);
				}
			},
			error: function() {}
		});

	});

	// For update additional Details
	$('.update_additional_details').on('click', function() {

		var nationality = $('#nationality').val();
		var doc_id_type = $('#doc_id_type').val();
		var doc_id_number = $('#doc_id_number').val();
		var doc_id_exp_date = $('#doc_id_exp_date').val();


		if (nationality == '') {
			alert('Please select nationality');
			$('#nationality').focus();
			return false;
		} else if (doc_id_number == '') {
			alert('Please enter doc id number');
			$('#doc_id_number').focus();
			return false;
		} else if (doc_id_number == '') {
			alert('Please enter doc id number');
			$('#doc_id_number').focus();
			return false;
		} else if (doc_id_exp_date == '') {
			alert('Please enter doc id exp date');
			$('#doc_id_exp_date').focus();
			return false;
		}

		$(".loader-icon-ad").html("<i class='<?= $data['fwicon']['spinner']; ?> fa-spin-pulse'></i>");



		$.ajax({
			url: "<?= $data['Host']; ?>/common/update_additional_details.php",
			data: 'doc_id_type=' + doc_id_type + '&doc_id_number=' + doc_id_number + '&doc_id_exp_date=' + doc_id_exp_date + '&nationality=' + nationality,
			type: "POST",
			success: function(data) {
				//alert(data);
				if (data == 1) {
					$(".loader-icon-ad").html('<i class="<?= $data['fwicon']['check-circle']; ?> text-white"></i> Additional Details Updated..');

					setTimeout(function() {
						<? if ($additional_details == 0) { ?>
							location.reload(true);
						<? } else { ?>
							//icon change
							$('#v-KYCStatus-tab').trigger('click');
						<? } ?>
					}, 1000);
				}
			},
			error: function() {}
		});

	});


	// For Fetch The Kingdom Bank Ac Balance

	$(".fetch-kyc-status").click(function() {
		//alert(1111);
		var urls = "<?= $data['Host']; ?>/api/sumsub/check-kyc-status.php";
		//alert(urls);
		var vtype = "1";
		//alert(accountId);
		//return;
		$("#kyc-status-loader").html("<i class='<?= $data['fwicon']['spinner'] ?> fa-spin-pulse text-success ms-2'></i>");
		$.ajax({
			type: "POST",
			url: urls,
			data: {
				vtype: vtype
			}
		}).done(function(data) {
			//alert(data);
			//const balance = parseFloat(data).toFixed(2);
			$("#kyc-status-loader").html(data);
		});
	});


	<?php /*?>$(".fetch-balance").click(function(){
	  //alert(1111);
	  var urls="<?=$data['Host'];?>/api/thekingdombank/get-single-account-by-id";
	  //alert(urls);
      var accountId = $(this).attr('data-tkb');
	 // alert(accountId);
		//return;
        $.ajax({
            type: "POST",
            url: urls,
            data: { accountId : accountId } 
        }).done(function(data){
		   //alert(data);
		     if(data==1){
	         location.reload(true);
 	         }else{
	         return false;
	    }
        });
    });<?php */ ?>

	// for open owner type radio button
	$('input[type="radio"]').click(function() {
		var inputValue = $(this).attr("value");
		//alert(inputValue);
		var targetBox = $("." + inputValue);
		$(".box").not(targetBox).hide();
		$(targetBox).show();
	});
</script>
</div>
</body>

</html>