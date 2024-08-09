

function diff_log(e,theNo){

	var thisNo=Number($(e).attr('data-no'));

	if((Number(theNo)-1)==thisNo){

		$(e).attr('data-no',0);

	}else{

		$(e).attr('data-no',thisNo+1);

	}

	

	//var thisNoGet=$(e).attr('data-no');

	var tbl=$(e).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent().find('.tbl_exlHeightAuto');

	

	$(tbl).eq(0).animate( { scrollLeft: '+='+(($(e).parent().parent().parent().parent().find("diff").eq(thisNo).offset().left)-320) }, 1000);

}

