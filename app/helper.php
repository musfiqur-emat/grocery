<?php

function success($value,$msg=false)
{
	if(isset($value)){
		session()->flash('success',(isset($msg)) ? $msg : 'Your desired Operation has been Successful.' );
	}else{
		session()->flash('error','Whoops! Something went wrong!');
	}
}

function comment($type,$id,$date_,$memo_)
{
	if($memo_!=""){
		\App\Models\Comments::insert([
			"type"=>$type,
			"id"=>$id,
			"date_"=>$date_,
			"memo_"=>$memo_
		]);
	}
}

function typeName($type = false){
    $names=array (
		'0' => "Journal Entry",
		'1' => "Bank Payment",
		'2' => "Bank Deposit",
		'4' => "Funds Transfer",
		'10' => "Sales Invoice",
		'11' => "Customer Credit Note",
		'12' => "Customer Payment",
		'13' => "Delivery Note",
		'16' => "Location Transfer",
		'17' => "Inventory Adjustment",
		'18' => "Purchase Order",
		'20' => "Supplier Invoice",
		'21' => "Supplier Credit Note",
		'22' => "Supplier Payment",
		'25' => "Purchase Order Delivery",
		'26' => "Work Order",
		'28' => "Work Order Issue",
		'29' => "Work Order Production",
		'30' => "Sales Order",
		'32' => "Sales Quotation",
		'35' => "Cost Update",
		'40' => "Dimension",
		'91' => "STATEMENT",
		'92' => "CHEQUE",
		'201' => "Get Pass In/Out",
	); 
    if($type){
		if(isset($names[$type])){
			return $names[$type];
		}else{
			return '';
		}
	}
	
	return $names;
}

function orderTypeVariation($i = false)
{
	$paymentTerms = array(
		'1' => "Direct",
		'2' => "Sub Contract",
		'3' => "Internal",
		
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}



function fileInfo($file)
{
	if(isset($file)){
		return $image = array(
	    	'name' => $file->getClientOriginalName(), 
	    	'type' => $file->getClientMimeType(), 
	    	'size' => $file->getClientSize(), 
	    	'extension' => $file->getClientOriginalExtension(), 
	    );
	}else{
		return $image = array(
	    	'name' => '0', 
	    	'type' => '0', 
	    	'size' => '0', 
	    	'extension' => '0', 
	    );
	}
    
}

function fileUpload($file,$destination,$name)
{
    $upload=$file->move(public_path('/'.$destination), $name);
    return $upload;
}

function getfileSize($size)
{
	if($size<1024){
		$size=$size.' KB';
	}elseif($size>=1024){
		$size=number_format((float)($size/1024), 2, '.', '').' MB';
	}else{
		$size='Unknown Size';
	}
	return $size;
}

define('ST_JOURNAL', 0);

define('ST_BANKPAYMENT', 1);
define('ST_BANKDEPOSIT', 2);
define('ST_BANKTRANSFER', 4);

define('ST_SALESINVOICE', 10);
define('ST_CUSTCREDIT', 11);
define('ST_CUSTPAYMENT', 12);
define('ST_CUSTDELIVERY', 13);

define('ST_LOCTRANSFER', 16);
define('ST_INVADJUST', 17);

define('ST_PURCHORDER', 18);
define('ST_SUPPINVOICE', 20);
define('ST_SUPPCREDIT', 21);
define('ST_SUPPAYMENT', 22);
define('ST_SUPPRECEIVE', 25);

define('ST_WORKORDER', 26);
define('ST_MANUISSUE', 28);
define('ST_MANURECEIVE', 29);

//
//	Depreciation period types
//
define('FA_MONTHLY', 0);
define('FA_YEARLY', 1);

define('ST_SALESORDER', 30);
define('ST_SALESQUOTE', 32);
define('ST_COSTUPDATE', 35);
define('ST_DIMENSION', 40);

// Don't include these defines in the $systypes_array.
// They are used for documents only.
define ('ST_STATEMENT', 91);
define ('ST_CHEQUE', 92);

define ('GET_PASS', 201);


//----------------------------------------------------------------------------------
// Types of stock items
function stockTypes($i = false)
{
	$stock_types = array(
		'M' => "Manufactured",
		'B' => "Purchased",
		'D' => "Service"
	);
	if($i){
		return $stock_types[$i];
	}
	return $stock_types;
}

//payment terms
function paymentTerms($i = false)
{
	$paymentTerms = array(
		'1' => "Prepayment",
		'2' => "Cash",
		'3' => "After No. of Days",
		'4' => "Day In Following Month"
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}

function proFormaInvoiceType($i = false)
{
	$paymentTerms = array(
		'1' => "Direct",
		'0' => "Orderwise",
		
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}


function loanTypes($i = false)
{
	$loanTypes = array(
		'1' => "SME",
		'2' => "CC"
	);
	if($i){
		if(isset($loanTypes[$i])){
			return $loanTypes[$i];
		}else{
			return '';
		}
	}
	return $loanTypes;
}


//image previewer
function image($location){ 
	if(file_exists(public_path()."/".$location)){
		return '<img src="'.asset("public/$location").'" class="img-thumbnail" width="50" >';
	}else{
		return '<img src="'.asset('public/img/akaunting-logo-green.png').'" class="img-thumbnail" width="50" >';
	}
}

function systemTypeArry($i = false){
	$systypes_array = array (
		ST_JOURNAL => "Journal Entry",
		ST_BANKPAYMENT => "Bank Payment",
		ST_BANKDEPOSIT => "Bank Deposit",
		ST_BANKTRANSFER => "Funds Transfer",
		ST_SALESINVOICE => "Sales Invoice",
		ST_CUSTCREDIT => "Customer Credit Note",
		ST_CUSTPAYMENT => "Customer Payment",
		ST_CUSTDELIVERY => "Delivery Note",
		ST_LOCTRANSFER => "Location Transfer",
		ST_INVADJUST => "Inventory Adjustment",
		ST_PURCHORDER => "Purchase Order",
		ST_SUPPINVOICE => "Supplier Invoice",
		ST_SUPPCREDIT => "Supplier Credit Note",
		ST_SUPPAYMENT => "Supplier Payment",
		ST_SUPPRECEIVE => "Purchase Order Delivery",
		ST_WORKORDER => "Work Order",
		ST_MANUISSUE => "Work Order Issue",
		ST_MANURECEIVE => "Work Order Production",
		ST_SALESORDER => "Sales Order",
		ST_SALESQUOTE => "Sales Quotation",
		ST_COSTUPDATE => "Cost Update",
		ST_DIMENSION => "Dimension",
	); 

	if($i){
		if(isset($systypes_array[$i]))
			return $systypes_array[$i];
		else
			return false;
	}

	return $systypes_array;
}

function faSystemArry($i = false){
	$fa_systypes_array = array (
		ST_INVADJUST => "Fixed Assets Disposal",
		ST_COSTUPDATE => "Fixed Assets Revaluation",
	);
	if($i)
		if(isset($fa_systypes_array[$i]))
			return $fa_systypes_array[$i];
		else
			return false;

	return $fa_systypes_array;
}

function accountType($i = false){
	$type = array (
		'0' => "Savings Account",
		'1' => "Chequing Account",
		'2' => "Credit Account",
		'3' => "Cash Account",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

//work type
function workType($i = false)
{
	$paymentTerms = array(
		'1' => "Assemble",
		'2' => "Unassemble",
		'3' => "Advanced Manufectures",
		
	);
	if($i){
		if(isset($paymentTerms[$i])){
			return $paymentTerms[$i];
		}else{
			return '';
		}
	}
	return $paymentTerms;
}
//work type

function creditType($i = false){
	$type = array (
		'0' => "Items Returned to Inventiry Location",
		'1' => "Items Written Off",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function template($i = false){
	$type = array (
		'6' => "Amount 450",
		
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function classType($i = false){
	$type = array (
		'0' => "Assests",
		'1' => "Liabilities",
		'2' => "Equity",
		'3' => "Income",
		'4' => "Costs of Goods Sold",
		'5' => "Expense",
		'6' => "Others",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
	
}

function accountCurrency($i = false){
	$type = array (
		"CAD" => "Canadian Dollars",
		"COP" => "Colombian Peso",
		"EGP" => "Egyption Pound",
		"EUR" => "Euro",
		"GHS" => "Ghana Cedi",
		"INR" => "Indian Rupee",
		"ILS" => "Israeli new shekel",
		"SEK" => "Krona",
		"KWD" => "Kuwaiti Dinar",
		"NGN" => "Naira",
		"PKR" => "Pakistani Rupees",
		"php" => "peso",
		"PES" => "Phillipine Peso",
		"PLK" => "Polski Zloty",
		"GBP" => "Pounds",
		"QAR" => "Qatar Riyals",
		"IDR" => "Rupiah",
		"ZAR" => "South African Rand",
		"LKR" => "Sri Lankan Rupees",
		"TZS" => "Tanzania Shillings",
		"Ugx" => "Uganda Shillings",
		"USD" => "USD",
		"BDT" => "Bangladeshi Taka",
	);
	if($i)
		if(isset($type[$i]))
			return $type[$i];
		else
			return false;

	return $type;
}





function showDate($date){
	return date("F jS, Y", strtotime($date));
}

function onlyDate($date){
	return date("Y-m-d", strtotime($date));
}

function language($i = false){
	$language = array (
		'0' => "System Default",
		'1' => "English",
		'2' => "Bangla",
	);
	if($i)
		if(isset($language[$i]))
			return $language[$i];
		else
			return false;

	return $language;
}

function aisleTypes($i = false){
	$bolean = array(		
		'0' => "Shops",
		'1' => "Warehouse",
		'2' => "Passage",
		'3' => "Wedding",
		'4' => "Vehicle",
	);
	if($i)
		if(isset($bolean[$i]))
			return $bolean[$i];
		else
			return false;

	return $bolean;
}

