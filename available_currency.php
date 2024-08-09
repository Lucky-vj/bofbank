<?
$data['AVAILABLE_CURRENCY']=array("AUD","BTC","CAD","CNY","CZK","EUR","GBP","HKD","IDR","INR","JPY","KHR","MXN","MYR","PHP","PLN","SGD","THB","USD","VND");

$data['AVAILABLE_CURRENCY_MEANING']=array("AUD"=>"Australia Dollar","BTC"=>"Bitcoin","CAD"=>"Canadian Dollar","CNY"=>"Chinese Yuan","CZK"=>"Czech koruna","EUR"=>"Euro","GBP"=>"United Kingdom Pound","HKD"=>"Hong Kong Dollar","IDR"=>"Indonesian Rupiah","INR"=>"Indian Rupee","JPY"=>"Japanese Yen","KHR"=>"Cambodian riel","MXN"=>"Mexican Peso","MYR"=>"Malaysian Ringgit","PHP"=>"Philippine peso","PLN"=>"Polish złoty","SGD"=>"SG Dollar","THB"=>"Thai baht","USD"=>"United States Dollar","VND"=>"Vietnamese dong");

function get_currency($currency,$names=0){
	$currency_name="";  $currency_symbol="";
	if($currency){
		if(strpos($currency," ")!==false){
			$curr_ex=explode(" ",$currency); 
			$currency_name=$curr_ex[1];
		}else{
			$currency_name=$currency;
		}
	}
	if($currency=="USD"|| $currency=="$"){
		$currency_name="USD";  $currency_symbol="$"; 
	}elseif($currency=="EUR"|| $currency=="€"){
		$currency_name="EUR";  $currency_symbol="€"; 
	}elseif($currency=="INR"|| $currency=="₹"){
		$currency_name="INR";  $currency_symbol="₹"; 
	}elseif($currency=="AUD"|| $currency=="A$"){
		$currency_name="AUD";  $currency_symbol="A$"; 
	}elseif($currency=="CAD"|| $currency=="C$"){
		$currency_name="CAD";  $currency_symbol="C$"; 
	}elseif($currency=="CNY"|| $currency=="¥"){
		$currency_name="CNY";  $currency_symbol="¥"; 
	}elseif($currency=="GBP"|| $currency=="£"){
		$currency_name="GBP";  $currency_symbol="£"; 
	}elseif($currency=="HKD"|| $currency=="HK$"){
		$currency_name="HKD";  $currency_symbol="HK$"; 
	}elseif($currency=="IDR"|| $currency=="Rp"){
		$currency_name="IDR";  $currency_symbol="Rp"; 
	}elseif($currency=="JPY"|| $currency=="¥"){
		$currency_name="JPY";  $currency_symbol="¥"; 
	}elseif($currency=="MYR"|| $currency=="RM"){
		$currency_name="MYR";  $currency_symbol="RM"; 
	}elseif($currency=="MXN"|| $currency=="M$"){
		$currency_name="MXN";  $currency_symbol="M$"; 
	}elseif($currency=="SGD"|| $currency=="S$"){
		$currency_name="SGD";  $currency_symbol="S$"; 
	}elseif($currency=="BTC"|| $currency=="₿"|| $currency=="u20bf"){
		$currency_name="BTC";  $currency_symbol="₿"; 
	}
	elseif($currency=="CZK"|| $currency=="Kč"){
		$currency_name="CZK";  $currency_symbol="Kč"; 
	}
	elseif($currency=="PLN"|| $currency=="zł"){
		$currency_name="PLN";  $currency_symbol="zł"; 
	}
	elseif($currency=="RUB"|| $currency=="₽"){
		$currency_name="RUB";  $currency_symbol="₽"; 
	}
	elseif($currency=="AED"|| $currency=="د.إ"){
		$currency_name="AED";  $currency_symbol="د.إ"; 
	}
	elseif($currency=="AFN"|| $currency=="؋"){
		$currency_name="AFN";  $currency_symbol="؋"; 
	}
	elseif($currency=="AMD"|| $currency=="դր."){
		$currency_name="AMD";  $currency_symbol="դր."; 
	}
	elseif($currency=="ANG"|| $currency=="ƒ"){
		$currency_name="ANG";  $currency_symbol="ƒ"; 
	}
	elseif($currency=="AOA"|| $currency=="Kz"){
		$currency_name="AOA";  $currency_symbol="Kz"; 
	}
	elseif($currency=="BDT"|| $currency=="৳"){
		$currency_name="BDT";  $currency_symbol="৳"; 
	}
	elseif($currency=="BGN"|| $currency=="лв"){
		$currency_name="BGN";  $currency_symbol="лв"; 
	}
	elseif($currency=="BHD"|| $currency==".د.ب"){
		$currency_name="BHD";  $currency_symbol=".د.ب"; 
	}
	elseif($currency=="BRL"|| $currency=="R$"){
		$currency_name="BRL";  $currency_symbol="R$"; 
	}
	elseif($currency=="BTN"|| $currency=="Nu."){
		$currency_name="BTN";  $currency_symbol="Nu."; 
	}
	elseif($currency=="IDR"|| $currency=="Rp"){
		$currency_name="IDR";  $currency_symbol="Rp"; 
	}
	elseif($currency=="ILS"|| $currency=="₪"){
		$currency_name="ILS";  $currency_symbol="₪"; 
	}
	elseif($currency=="IQD"|| $currency=="ع.د"){
		$currency_name="IQD";  $currency_symbol="ع.د"; 
	}
	elseif($currency=="IRR"|| $currency=="﷼"){
		$currency_name="IRR";  $currency_symbol="﷼"; 
	}
	elseif($currency=="ISK"|| $currency=="kr"){
		$currency_name="ISK";  $currency_symbol="kr"; 
	}
	elseif($currency=="KPW"|| $currency=="₩"){
		$currency_name="KPW";  $currency_symbol="₩"; 
	}
	elseif($currency=="KWD"|| $currency=="د.ك"){
		$currency_name="KWD";  $currency_symbol="د.ك"; 
	}
	elseif($currency=="LTL"|| $currency=="Lt"){
		$currency_name="LTL";  $currency_symbol="Lt"; 
	}
	elseif($currency=="MMK"|| $currency=="Ks"){
		$currency_name="MMK";  $currency_symbol="Ks"; 
	}
	elseif($currency=="NGN"|| $currency=="₦"){
		$currency_name="NGN";  $currency_symbol="₦"; 
	}
	/*elseif($currency=="NZD"|| $currency=="$"){
		$currency_name="NZD";  $currency_symbol="$"; 
	}*/
	elseif($currency=="OMR"|| $currency=="ر.ع."){
		$currency_name="OMR";  $currency_symbol="ر.ع."; 
	}
	elseif($currency=="QAR"|| $currency=="ر.ق"){
		$currency_name="QAR";  $currency_symbol="ر.ق"; 
	}
	elseif($currency=="THB"|| $currency=="฿"){
		$currency_name="THB";  $currency_symbol="฿"; 
	}
	elseif($currency=="UAH"|| $currency=="₴"){
		$currency_name="UAH";  $currency_symbol="₴"; 
	}
	elseif($currency=="ZAR"|| $currency=="R"){
		$currency_name="ZAR";  $currency_symbol="R"; 
	}
	elseif($currency=="ZMW"|| $currency=="ZK"){
		$currency_name="ZMW";  $currency_symbol="ZK"; 
	}
	elseif($currency=="KHR"|| $currency=="៛"){
		$currency_name="KHR";  $currency_symbol="៛"; 
	}
	elseif($currency=="VND"|| $currency=="₫"){
		$currency_name="VND";  $currency_symbol="₫"; 
	}
	elseif($currency=="PHP"|| $currency=="₱"){
		$currency_name="PHP";  $currency_symbol="₱"; 
	}
	
	/*elseif($currency=="XCD"|| $currency=="$"){
		$currency_name="XCD";  $currency_symbol="$"; 
	}
	elseif($currency=="FJD"|| $currency=="$"){
		$currency_name="FJD";  $currency_symbol="$"; 
	}
	elseif($currency=="BSD"|| $currency=="$"){
		$currency_name="BSD";  $currency_symbol="$"; 
	}*/
	  
	$result_st=$currency_symbol; // 0
	if($names==1){
		$result_st=$currency_name;
	}
	
	return $result_st;
}

?>