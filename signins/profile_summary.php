<?php
include "../common.php";
include "controller/blade.profile_summary.php";
?>
<style>
	.trans.page-content {
		padding: calc(0px + 24px) calc(24px / 2) 0px calc(24px / 2) !important;
	}

	.trans.main-content {
		margin-left: 0px !important;
	}

	body[data-layout=horizontal] .trans.page-content {
		margin-top: 0px !important;
		padding: calc(0px + 0px) calc(0px / 2) 0px calc(0px / 2) !important;
	}

	.nav-pills .nav-link {
		color: #000000 !important;
		/*background-color: #8ab3a5 !important;*/
		border: 1px solid #eee !important;
		box-shadow: inset 0px 0px 0px 3px #f7f7f7;

	}

	.nav-pills .nav-link:hover {
		color: #006600 !important;
		box-shadow: inset 0px 0px 0px 3px #f7f7f7 !important;
	}

	.nav-pills .nav-link.active,
	.nav-pills .show>.nav-link {
		color: #fff !important;
		background-color: #8fd3fe !important;
		border: 1px solid #eee !important;
	}

	.fa-star-of-life {
		color: #FF0000 !important;
		font-size: 10px !important;
	}

	.col-form-label44 {
		padding-top: 0px !important;
		padding-bottom: 0px !important;
	}

	.text-start:hover {
		background: none !important;
	}
</style>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="trans main-content admin approve">
	<div class="trans page-content">
		<div class="container-fluid">

			<div class="row mb-4">
				<div class="col-md-12">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<div class="d-flex align-items-start border rounded p-2">


										<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

											<span class=" button nav-link my-1 <? if ($personal_details == 0) { ?> active <? } ?>" id="v-PersonalDetails-tab" data-bs-toggle="pill" data-bs-target="#v-PersonalDetails" type="button" role="tab" aria-controls="v-PersonalDetails" aria-selected="true"><i class="<?= $personal_details_icon; ?>"></i> Personal Details</span>

											<span class=" button nav-link my-1" id="v-MemberAddress-tab" data-bs-toggle="pill" data-bs-target="#v-MemberAddress" type="button" role="tab" aria-controls="v-MemberAddress" aria-selected="true"><i class="<?= $address_details_icon; ?>"></i> Home Address</span>

											<span class="nav-link my-1" id="v-CompanyDetails-tab" data-bs-toggle="pill" data-bs-target="#v-CompanyDetails" type="button" role="tab" aria-controls="v-CompanyDetails" aria-selected="false"><i class="<?= $company_details_icon; ?>"></i> Owner`s Details</span>

											<span class="nav-link my-1" id="v-AdditionalDetails-tab" data-bs-toggle="pill" data-bs-target="#v-AdditionalDetails" type="button" role="tab" aria-controls="v-AdditionalDetails" aria-selected="false"><i class="<?= $additional_details_icon; ?>"></i> Additional Details</span>

											<span class="nav-link my-1" id="v-KYCStatus-tab" data-bs-toggle="pill" data-bs-target="#v-KYCStatus" type="button" role="tab" aria-controls="v-KYCStatus" aria-selected="false"><i class="<?= $IBAnKYC; ?>"></i> KYC Status</span>

											<span class="nav-link my-1" id="v-AccountStatus-tab" data-bs-toggle="pill" data-bs-target="#v-AccountStatus" type="button" role="tab" aria-controls="v-AccountStatus" aria-selected="false"><i class="<?= $IBAnAccountDetails; ?>"></i> Account Status</span>

											<span class="nav-link my-1 <? if ($personal_details == 1) { ?> active <? } ?>" id="v-AccountSummary-tab" data-bs-toggle="pill" data-bs-target="#v-AccountSummary" type="button" role="tab" aria-controls="v-AccountSummary" aria-selected="false"><i class="<?= $IBAnAccountDetails; ?>"></i> Account Summary</span>



										</div>



										<div class="tab-content" id="v-pills-tabContent">
											<div class="tab-pane fade show <? if ($personal_details == 0) { ?> active <? } ?>" id="v-PersonalDetails" role="tabpanel" aria-labelledby="v-PersonalDetails-tab" tabindex="0">

												<div class="row py-1 rounded">
													<div class="mb-2 fs-5 hide-title">Tell us more about personal detail</div>
													<div class="col-sm-12 px-2 clearfix" style="max-width:450px !important;"> <span>Fill details to help us in understanding your business better and meet the requirements of regulators, financial partners and our Services Agreement.</span>
														<label for="blacklist_value" class="col-sm-12 col-form-label">Contact Name: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="row">
															<div class="col-sm-3 py-1">
																<select name="title" id="title" class="form-select form-select-sm" title="Select Title" data-bs-toggle="tooltip" data-bs-placement="right" required>
																	<option value="" selected="selected">Select</option>
																	<option value="Mr" <?php if ($rs['title'] == "Mr") { ?> selected="selected" <? } ?>>Mr.</option>
																	<option value="Ms" <?php if ($rs['title'] == "Ms") { ?> selected="selected" <? } ?>>Ms.</option>
																	<option value="Mrs" <?php if ($rs['title'] == "Mrs") { ?> selected="selected" <? } ?>>Mrs.</option>
																</select>
															</div>
															<div class="col-sm-4 py-1">
																<input type="text" id="first_name" name="first_name" class="form-control form-control-sm" placeholder="Enter first name" value="<?php echo $rs['first_name'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter first name">
															</div>
															<div class="col-sm-5 py-1">
																<input type="text" id="last_name" name="last_name" class="form-control form-control-sm" placeholder="Enter last name" value="<?= $rs['last_name'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter last name">
															</div>
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">Email: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="row">
															<div class="col-sm-12 py-1">
																<input type="text" id="email" name="email" class="form-control form-control-sm" placeholder="Enter email" value="<?= $rs['email'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter email" disabled="disabled">
															</div>
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">Contact Number: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="row">
															<div class="col-sm-6 py-1">

																<select name="country_code" id="country_code" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Country Code" required>
																	<option value="" selected="selected">Select</option>
																	<?php
																	foreach ($country_list as $clist) { ?>
																		<option value="<?= $clist['Country_Code']; ?>"><?= $clist['country']; ?> ( + <?= $clist['Country_Code']; ?>)</option>
																	<? } ?>
																</select>

																<? if (isset($rs['country_code'])) { ?>
																	<script>
																		$('#country_code option[value="<?= $rs['country_code'] ?>"]').prop('selected', 'selected');
																	</script>
																<? } ?>
															</div>
															<div class="col-sm-6 py-1">
																<input type="text" id="mobile" name="mobile" class="form-control form-control-sm" placeholder="Enter phone / mobile" value="<?= $rs['mobile'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter phone / mobile number">
															</div>
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">Gender & Date of Birth: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="row">
															<div class="col-sm-6 py-1">
																<select name="gender" id="gender" class="form-select form-select-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Gender" required>
																	<option value="" selected="selected">Select</option>
																	<option value="M" <?php if ($rs['gender'] == "M") { ?> selected="selected" <? } ?>>Male</option>
																	<option value="F" <?php if ($rs['gender'] == "F") { ?> selected="selected" <? } ?>>Female</option>
																	<option value="O" <?php if ($rs['gender'] == "O") { ?> selected="selected" <? } ?>>Other</option>
																</select>
															</div>
															<div class="col-sm-6 py-1">
																<input type="date" name="birth_date" id="birth_date" class="form-control date form-control-sm" placeholder="Date Of Birth" value="<?php echo $rs['birth_date'] ?>" max="<?= date('Y-m-d', strtotime('-18 years')); ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Date Of Birth" required>
															</div>
														</div>
														<div class="row px-1"> <a class="btn btn-danger template btn-sm my-2 w-100 update-personal-details"><span class="loader-icon-p">Continue</span></a> </div>
													</div>
												</div>

											</div>

											<div class="tab-pane fade show " id="v-MemberAddress" role="tabpanel" aria-labelledby="v-MemberAddress-tab" tabindex="0">

												<div class="row py-1 rounded">
													<div class="mb-2 fs-5 hide-title">Tell us more about your address</div>
													<div class="col-sm-12 px-2 clearfix" style="max-width:450px !important;"> <span></span>
														<label for="blacklist_value" class="col-sm-12 col-form-label">Address Line - 1: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<input type="text" id="address_line1" name="address_line1" class="form-control form-control-sm" placeholder="Enter Address Line - 1" value="<?= $rs['address_line1'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Address Line - 1">
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">Address Line - 2: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<input type="text" id="address_line2" name="address_line2" class="form-control form-control-sm" placeholder="Enter Address Line - 2" value="<?= $rs['address_line2'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Address Line - 2">
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">City: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<input type="text" id="city" name="city" class="form-control form-control-sm" placeholder="Enter city" value="<?= $rs['city'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter city">
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">State: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<input type="text" id="state" name="state" class="form-control form-control-sm" placeholder="Enter state" value="<?= $rs['state'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter state">
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">Country: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
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
														<label for="blacklist_value" class="col-sm-12 col-form-label">Postal Code / Pin Code / Zip Code: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<input type="text" id="pincode" name="pincode" class="form-control form-control-sm" placeholder="Enter Postal Code" value="<?= $rs['pincode'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Postal Code">
														</div>


														<label for="additional_information" class="col-sm-12 col-form-label">Additional Information: </label>
														<div class="col-sm-12">
															<input type="text" id="additional_information" name="additional_information" class="form-control form-control-sm" placeholder="Enter Additional Information" value="<?= $rs['additional_information'] ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Additional Information">
														</div>


														<a class="btn btn-danger template btn-sm my-2 w-100 update_user_address"><span class="loader-icon-a">Continue</span></a>
													</div>
												</div>
											</div>

											<div class="tab-pane fade show" id="v-CompanyDetails" role="tabpanel" aria-labelledby="v-CompanyDetails-tab" tabindex="0">

												<div class="row py-1 rounded">
													<div class="mb-2 fs-5 hide-title">Personal instead of Company.</div>
													<div class="col-sm-12 px-2 clearfix" style="max-width:450px !important;"> <span></span>

														<div class="text-center border rounded mx-1 p-2 row radio-tab">
															<div class="form-check col-sm-4 text-start">
																<input class="form-check-input" type="radio" name="owner_type" value="Individual" id="Individual" <?php if (($rs['owner_type'] == "Individual") or ($rs['owner_type'] == "")) {
																																										$display1 = "display:none"; ?> checked="checked" <? } ?>>
																<label>Individual A/C</label>


															</div>
															<div class="form-check col-sm-4 text-start">
																<input class="form-check-input" type="radio" name="owner_type" value="Corporate" id="Corporate" <?php if ($rs['owner_type'] == "Corporate") {
																																									$display2 = "display:none"; ?> checked="checked" <? } ?>>
																<label>Corporate A/C</label>


															</div>

														</div>

														<div class="Individual box row" style="<?= $display2; ?>">
															<label for="individual_type" class="col-sm-12 col-form-label">Select Type: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
																<select name="individual_type" id="individual_type" class="form-select form-select-sm" title="Select Type" data-bs-toggle="tooltip" data-bs-placement="right" required>
																	<option value="" selected="selected">Select</option>
																	<option value="Salaried" <?php if ($rs['individual_type'] == "Salaried") { ?> selected="selected" <? } ?>>Salaried</option>
																	<option value="Self Employee" <?php if ($rs['individual_type'] == "Self Employee") { ?> selected="selected" <? } ?>>Self Employee</option>
																	<option value="House Wife" <?php if ($rs['individual_type'] == "UBO") { ?> selected="selected" <? } ?>>House Wife</option>

																</select>
															</div>

														</div>
														<div class="Corporate box" style="<?= $display1; ?>">

															<label for="role_in_company" class="col-sm-12 col-form-label">What is your role in company: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
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

															<label for="business_activity" class="col-sm-12 col-form-label">Business Activity: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
																<select name="business_activity" id="business_activity" class="form-select form-select-sm" title="Select Business Activity" data-bs-toggle="tooltip" data-bs-placement="right" required>
																	<option value="" selected="selected">Select</option>
																	<option value="Agriculture">Agriculture</option>
																	<option value="Bank">Bank</option>
																	<option value="Construction">Construction</option>
																	<option value="Communications">Communications</option>
																	<option value="Energy Sector">Energy Sector</option>
																	<option value="Entrainment and Tourism">Entrainment and Tourism</option>
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

															<label for="company_name" class="col-sm-12 col-form-label">Company Name: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
																<input type="text" id="company_name" name="company_name" class="form-control form-control-sm" placeholder="Enter company name" value="<?= $rs['company_name'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter company name">
															</div>

															<label for="company_registration_no" class="col-sm-12 col-form-label">Company Registration Number: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
																<input type="text" id="company_registration_no" name="company_registration_no" class="form-control form-control-sm" placeholder="Enter Company Registration Number" value="<?= $rs['company_registration_no'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Company Registration Number">
															</div>

															<label for="blacklist_value" class="col-sm-12 col-form-label">Date of Incorporation: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
																<input type="date" id="date_of_incorporation" name="date_of_incorporation" class="form-control date form-control-sm" placeholder="Enter Date of Incorporation" value="<?= $rs['date_of_incorporation'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" max="<?= date('Y-m-d', strtotime('-1 days')); ?>" title="Enter Date of Incorporation">
															</div>

															<label for="blacklist_value" class="col-sm-12 col-form-label">Country of Incorporation: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
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

															<label for="blacklist_value" class="col-sm-12 col-form-label">City of Incorporation: <i class="<?= $data['fwicon']['star']; ?>"></i></label>

															<div class="col-sm-12">
																<input type="text" id="city_of_incorporation" name="city_of_incorporation" class="form-control form-control-sm" placeholder="Enter City of Incorporation" value="<?= $rs['city_of_incorporation'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter City of Incorporation">
															</div>

															<label for="company_address" class="col-sm-12 col-form-label">Company Address: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
															<div class="col-sm-12">
																<input type="text" id="company_address" name="company_address" class="form-control form-control-sm" placeholder="Enter Company Address" value="<?= $rs['company_address'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter Company Address">
															</div>

														</div>

														<a class="btn btn-danger template btn-sm my-2 w-100 update_company_details"><span class="loader-icon-c">Continue</span></a>
													</div>
												</div>

											</div>

											<div class="tab-pane fade show" id="v-AdditionalDetails" role="tabpanel" aria-labelledby="v-AdditionalDetails-tab" tabindex="0">

												<div class="row py-1 rounded">
													<div class="mb-2 fs-5 hide-title">Tell us more about your additional details</div>
													<div class="col-sm-12 px-2 clearfix" style="max-width:450px !important;"> <span></span>
														<label for="blacklist_value" class="col-sm-12 col-form-label">What`s your nationality?: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
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

														<label for="blacklist_value" class="col-sm-12 col-form-label">ID Type: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<select name="doc_id_type" id="doc_id_type" class="form-select form-select-sm" title="ID Type" data-bs-toggle="tooltip" data-bs-placement="right" required>
																<option value="" selected="selected">Select</option>
																<option value="ssn" <?php if ($rs['doc_id_type'] == "ssn") { ?> selected="selected" <? } ?>>SSN</option>
																<option value="passport" <?php if ($rs['doc_id_type'] == "passport") { ?> selected="selected" <? } ?>>Passport</option>
															</select>
														</div>


														<label for="blacklist_value" class="col-sm-12 col-form-label">ID Number: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<input type="text" id="doc_id_number" name="doc_id_number" class="form-control form-control-sm" placeholder="Enter id number" value="<?= $rs['doc_id_number'] ?>" required="" data-bs-toggle="tooltip" data-bs-placement="right" title="Enter id number">
														</div>
														<label for="blacklist_value" class="col-sm-12 col-form-label">ID Expiry Date: <i class="<?= $data['fwicon']['star']; ?>"></i></label>
														<div class="col-sm-12">
															<input type="date" name="doc_id_exp_date" class="form-control date form-control-sm" id="doc_id_exp_date" placeholder="ID Expiry Date" value="<?php echo $rs['doc_id_exp_date'] ?>" min="<?= date('Y-m-d'); ?>" data-bs-toggle="tooltip" data-bs-placement="right" title="ID Expiry Date" required>
														</div>


														<a class="btn btn-danger template btn-sm my-2 w-100 update_additional_details"><span class="loader-icon-ad">Continue</span></a>
													</div>
												</div>

											</div>

											<div class="tab-pane fade show" id="v-KYCStatus" role="tabpanel" aria-labelledby="v-KYCStatus-tab" tabindex="0">

												<div class="mb-2 fs-5 hide-title">KYC Status - <span id="kyc-status-loader"><?= $kyc_data['Kyc_status']; ?></span> <? if (($kyc_data['Kyc_status'] <> 'completed') && ($kyc_data['Kyc_status'] <> '')) { ?>
														<a title="Check Status" class="mx-2"><i class="<?= $data['fwicon']['rotate']; ?> fetch-kyc-status text-success pointer" data-tkb="<?= $accountid; ?>"></i></a>
														<?php /*?><a class="hrefmodal btn btn-sm btn-danger template m-2" data-tid="KYC Status" data-href="<?=$data['Host'];?>/api/sumsub/check-kyc-status<?=$data['ex']?>" title="KYC Status" > Check Status </a><?php */ ?> <? } ?>
												</div>
												<div class="text-center">
													<?php
													if (isset($kyc_data['Kyc_status']) && $kyc_data['Kyc_status']) {

														if ($kyc_data['Kyc_status'] == "completed") {
															echo '<i class="fa-solid fa-thumbs-up text-success fa-8x mx-4"  title="KYC Status Completed"></i>';
														} elseif ($kyc_data['Kyc_status'] != "") {
															//echo '<i class="fa-solid fa-circle-half-stroke text-warning fa-8x mx-4"  title="KYC Status Pending"></i>';
													?>
															<?php if (isset($kyc_data['kyc_id']) && $kyc_data['kyc_id']) { ?>

																<? if ($kyc_data['Kyc_status'] <> 'completed') { ?>
																	<div class="text-start">
																		<a class="btn btn-sm btn-outline-success m-2" title="Click for Complete KYC Online" target="_blank"><? if ($kyc_data['Kyc_status'] == "New") {
																																												echo "Pending for Approval";
																																											} ?></a>
																		<p>* Your kyc approval pending from Account Approval team</p>
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

												<div class="mb-2 fs-5 hide-title">Account Status <? if (isset($ibanacc[0]['accountStatus']) && $ibanacc[0]['accountStatus']) { ?> - <?= $ibanacc[0]['accountStatus']; ?> <? } ?><? if (isset($ibanacc[0]['accountid']) && $ibanacc[0]['accountid']) { ?> [<?= $ibanacc[0]['accountid']; ?>] <? } ?></div>
												<div class="text-center">
													<div class="table-responsive">

														<table class="table table-striped">

															<?php if (isset($kyc_data['Kyc_status']) && $kyc_data['Kyc_status'] == 'completed') { ?>
																<?php if (isset($ibanacc[0]['accountid']) && $ibanacc[0]['accountid']) {
																	echo '<i class="fa-solid fa-thumbs-up text-success fa-8x mx-4"  title="Account Activated"></i>';
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

											<div class="tab-pane fade show <? if ($personal_details == 1) { ?> active <? } ?>" id="v-AccountSummary" role="tabpanel" aria-labelledby="v-AccountSummary-tab" tabindex="0">

												<div class="row py-1 rounded">
													<div class="mb-2 fs-5 hide-title">Review and Update</div>

													<div class="col-sm-12 px-2 clearfix" style="max-width:450px !important;">
														<span>You're almost ready to start exploring. Take a moment to review and confirm your information.</span>




														<div class="my-2 fs-6 fw-bold hide-title">Personal Details</div>
														<div class="border rounded  p-2 my-2" style="max-width:450px;">
															<div class="vkg dropdown-toggle55"><i class="<?= $personal_details_icon; ?>"></i> Filled required personal details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit personal details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-PersonalDetails-tab"></i></div>
														</div>

														<div class="my-2 fs-6 fw-bold hide-title"> Home Address</div>
														<div class="border rounded  p-2 my-2" style="max-width:450px;">
															<div class="vkg dropdown-toggle55"><i class="<?= $address_details_icon; ?>"></i> Filled required address details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit address details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-MemberAddress-tab"></i></div>
														</div>

														<div class="my-2 fs-6 fw-bold hide-title"> Owner`s Details</div>
														<div class="border rounded  p-2 my-2" style="max-width:450px;">
															<div class="vkg dropdown-toggle55"><i class="<?= $company_details_icon; ?>"></i> Filled required company details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit company details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-CompanyDetails-tab"></i></div>
														</div>

														<div class="my-2 fs-6 fw-bold hide-title"> Additional Details</div>
														<div class="border rounded  p-2 my-2" style="max-width:450px;">
															<div class="vkg dropdown-toggle55"><i class="<?= $additional_details_icon; ?>"></i> Filled required additional details <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to edit additional details" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-AdditionalDetails-tab"></i></div>
														</div>

														<div class="my-2 fs-6 fw-bold hide-title"> KYC Status</div>
														<div class="border rounded  p-2 my-2" style="max-width:450px;">
															<div class="vkg dropdown-toggle55"><i class="<?= $IBAnKYC; ?>"></i> Filled required KYC status <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to view KYC status" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-KYCStatus-tab"></i></div>
														</div>

														<div class="my-2 fs-6 fw-bold hide-title"> Account Status</div>
														<div class="border rounded  p-2 my-2" style="max-width:450px;">
															<div class="vkg dropdown-toggle55"><i class="<?= $IBAnAccountDetails; ?>"></i> Filled required Account status <i class="<?= $data['fwicon']['pen'] ?> float-end pointer text-link open_tab" title="Click to view Account status" data-bs-toggle="tooltip" data-bs-placement="right" data-tid="#v-AccountStatus-tab"></i></div>
														</div>

													</div>

												</div>

											</div>

										</div>
									</div>
								</div>
							</div>
							<? include('footer' . $data['iex']); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
	<!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
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

		<? if (($_SESSION['reg-step'] == 5) && ($kyc_data['Kyc_status'] != "completed")) { ?>
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
			data: 'title=' + title + '&first_name=' + first_name + '&last_name=' + last_name + '&email=' + email + '&country_code=' + country_code + '&mobile=' + mobile + '&gender=' + gender + '&birth_date=' + birth_date + '&admin_client_id=' + <?= $Client_ID; ?>,
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
							$('#v-AccountSummary-tab').trigger('click');
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
			data: 'address_line1=' + address_line1 + '&address_line2=' + address_line2 + '&city=' + city + '&state=' + state + '&country=' + country + '&pincode=' + pincode + '&additional_information=' + additional_information + '&admin_client_id=' + <?= $Client_ID; ?>,
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
							$('#v-AccountSummary-tab').trigger('click');
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
			data: 'company_name=' + company_name + '&company_registration_no=' + company_registration_no + '&date_of_incorporation=' + date_of_incorporation + '&country_of_incorporation=' + country_of_incorporation + '&city_of_incorporation=' + city_of_incorporation + '&company_address=' + company_address + '&role_in_company=' + role_in_company + '&business_activity=' + business_activity + '&owner_type=' + owner_type + '&individual_type=' + individual_type + '&admin_client_id=' + <?= $Client_ID; ?>,
			type: "POST",
			success: function(data) {
				//alert(data);
				if (data == 1) {
					$(".loader-icon-c").html('<i class="<?= $data['fwicon']['check-circle']; ?> text-white"></i> Owner Details Updated..');

					setTimeout(function() {
						<? if ($company_details == 0) { ?>
							location.reload(true);
						<? } else { ?>
							//icon change
							$('#v-AccountSummary-tab').trigger('click');
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
			data: 'doc_id_type=' + doc_id_type + '&doc_id_number=' + doc_id_number + '&doc_id_exp_date=' + doc_id_exp_date + '&nationality=' + nationality + '&admin_client_id=' + <?= $Client_ID; ?>,
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
							$('#v-AccountSummary-tab').trigger('click');
						<? } ?>
					}, 1000);
				}
			},
			error: function() {}
		});

	});


	// For Fetch The Kingdom Bank Ac Balance

	$(".fetch-kyc-status").click(function() {
		location.reload(true);

	});




	// for open owner type radio button
	$('input[type="radio"]').click(function() {
		var inputValue = $(this).attr("value");
		//alert(inputValue);
		var targetBox = $("." + inputValue);
		$(".box").not(targetBox).hide();
		$(targetBox).show();
	});
</script>
</body>

</html>