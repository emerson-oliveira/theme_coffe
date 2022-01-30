<?php

/* Amazon */

//Data Account

$API_options = get_option('cmc_options');

$accessKeyId = $API_options['theme_api_accessKeyId']['value'];

$secretKey = $API_options['theme_api_secretKey']['value'];

$trackingId = $API_options['theme_api_trackingId']['value'];

$region = "es";

$savetext = "Comprando este producto hoy, te ahorras…";

$CTAtext = "Comprar en Amazon AHORA - ";

$pricetext = "Precio Actual:";

$searchonAmazontext = "Consulta la mejor oferta en Amazon";

$logourl = "https://images-na.ssl-images-amazon.com/images/G/30/associates/mariti/banner/uk_associates_14-07-2015_amazon-logo_de-assoc_3_234x60.jpg";

//Prepare request

function aws_signed_url($params)

{

    $method = "GET";

    $host = "ecs.amazonaws." . $GLOBALS['region'];

    $host = "webservices.amazon." . $GLOBALS['region'];

    $uri = "/onca/xml";
    /* Amazon */

//Data Account

$API_options = get_option('cmc_options');

$accessKeyId = $API_options['theme_api_accessKeyId']['value'];

$secretKey = $API_options['theme_api_secretKey']['value'];

$trackingId = $API_options['theme_api_trackingId']['value'];

$region = "es";

$savetext = "Comprando este producto hoy, te ahorras…";

$CTAtext = "Comprar en Amazon AHORA - ";

$pricetext = "Precio Actual:";

$searchonAmazontext = "Consulta la mejor oferta en Amazon";

$logourl = "https://images-na.ssl-images-amazon.com/images/G/30/associates/mariti/banner/uk_associates_14-07-2015_amazon-logo_de-assoc_3_234x60.jpg";

//Prepare request

function aws_signed_url($params)

{

    $method = "GET";

    $host = "ecs.amazonaws." . $GLOBALS['region'];

    $host = "webservices.amazon." . $GLOBALS['region'];

    $uri = "/onca/xml";

    $params["Service"] = "AWSECommerceService";

    $params["AssociateTag"] = $GLOBALS['trackingId'];

    $params["AWSAccessKeyId"] = $GLOBALS['accessKeyId'];

    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");

    $params["Version"] = "2013-08-01";

    ksort($params);

    $canonicalized_query = array();

    foreach ($params as $param => $value) {

        $param = str_replace("%7E", "~", rawurlencode($param));

        $value = str_replace("%7E", "~", rawurlencode($value));

        $canonicalized_query[] = $param . "=" . $value;

    }

    $canonicalized_query = implode("&", $canonicalized_query);

    $string_to_sign = $method . "\n" . $host . "\n" . $uri . "\n" . $canonicalized_query;

    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $GLOBALS['secretKey'], true));

    $signature = str_replace("%7E", "~", rawurlencode($signature));

    $signedUrl = "http://" . $host . $uri . "?" . $canonicalized_query . "&Signature=" . $signature;

    return $signedUrl;

}

//Request products from API

function get_amazon_lowest_price_product($kw)

{

    $params = array(

        "Operation" => "ItemSearch",

        "SearchIndex" => "All",

        "Keywords" => "$kw",

        "ResponseGroup" => "Images,ItemAttributes,Offers",

        "Condition" => "New",

    );

    $url = aws_signed_url($params);

    $response = wp_remote_get(esc_url_raw($url));

    $body = wp_remote_retrieve_body($response);

    $xml = simplexml_load_string($body);

    $item = $xml->Items->Item;

    $title = ( string )$item[0]->ItemAttributes->Title;

    $url = ( string )$item[0]->DetailPageURL;

    $image = ( string )$item[0]->LargeImage->URL;

    $list_price = ( string )$item[0]->ItemAttributes->ListPrice->Amount / 100;

    $price = ( string )$item[0]->Offers->Offer->OfferListing->Price->Amount / 100;

    $you_save = ( string )$item[0]->Offers->Offer->OfferListing->AmountSaved->Amount / 100;

    $price_mp = ( string )$item[0]->Offers->Offer->OfferListing->SalePrice->Amount / 100;

    $valid = ( string )$xml->Items->Request->IsValid;

    $available = ( string )$item[0]->Offers->TotalOffers;

    $error = ( string )$xml->Items->Request->Errors->Error[0]->Message;

    $info = array(

        "code" => $code,

        "price" => $price,

        "list_price" => $list_price,

        "you_save" => $you_save,

        "image" => $image,

        "url" => $url,

        "title" => $title,

        "item" => $item_a,

        "price_mp" => $price_mp,

        "valid" => $valid,

        "error" => $error,

        "available" => $available

    );

    return $info;

}


//Comprar mi cafetera Request

/*function cmc_amazon_get_data($kw)

{

    $params = array(

        "Operation" => "ItemSearch",

        "SearchIndex" => "All",

        "Keywords" => "$kw",

        "ResponseGroup" => "Images,ItemAttributes,Offers",

        "Condition" => "New",

    );

    $url = aws_signed_url($params);

    $response = wp_remote_get(esc_url_raw($url));

    $body = wp_remote_retrieve_body($response);

    $xml = simplexml_load_string($body);

    $item = $xml->Items->Item;

    $data = array(

        'url' => (string)$item[0]->DetailPageURL,

        'price' => (string)$item[0]->Offers->Offer->OfferListing->Price->Amount / 100,

        'discount' => (string)$item[0]->Offers->Offer->OfferListing->AmountSaved->Amount / 100,

        'price_3' => (string)$item[0]->Offers->Offer->OfferListing->SalePrice->Amount / 100,

        'available' => (string)$item[0]->Offers->TotalOffers

    );

    return $data;

}*/

/* Amazon */
    $params["Service"] = "AWSECommerceService";

    $params["AssociateTag"] = $GLOBALS['trackingId'];

    $params["AWSAccessKeyId"] = $GLOBALS['accessKeyId'];

    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");

    $params["Version"] = "2013-08-01";

    ksort($params);

    $canonicalized_query = array();

    foreach ($params as $param => $value) {

        $param = str_replace("%7E", "~", rawurlencode($param));

        $value = str_replace("%7E", "~", rawurlencode($value));

        $canonicalized_query[] = $param . "=" . $value;

    }

    $canonicalized_query = implode("&", $canonicalized_query);

    $string_to_sign = $method . "\n" . $host . "\n" . $uri . "\n" . $canonicalized_query;

    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $GLOBALS['secretKey'], true));

    $signature = str_replace("%7E", "~", rawurlencode($signature));

    $signedUrl = "http://" . $host . $uri . "?" . $canonicalized_query . "&Signature=" . $signature;

    return $signedUrl;

}

//Request products from API

function get_amazon_lowest_price_product($kw)

{

    $params = array(

        "Operation" => "ItemSearch",

        "SearchIndex" => "All",

        "Keywords" => "$kw",

        "ResponseGroup" => "Images,ItemAttributes,Offers",

        "Condition" => "New",

    );

    $url = aws_signed_url($params);

    $response = wp_remote_get(esc_url_raw($url));

    $body = wp_remote_retrieve_body($response);

    $xml = simplexml_load_string($body);

    $item = $xml->Items->Item;

    $title = ( string )$item[0]->ItemAttributes->Title;

    $url = ( string )$item[0]->DetailPageURL;

    $image = ( string )$item[0]->LargeImage->URL;

    $list_price = ( string )$item[0]->ItemAttributes->ListPrice->Amount / 100;

    $price = ( string )$item[0]->Offers->Offer->OfferListing->Price->Amount / 100;

    $you_save = ( string )$item[0]->Offers->Offer->OfferListing->AmountSaved->Amount / 100;

    $price_mp = ( string )$item[0]->Offers->Offer->OfferListing->SalePrice->Amount / 100;

    $valid = ( string )$xml->Items->Request->IsValid;

    $available = ( string )$item[0]->Offers->TotalOffers;

    $error = ( string )$xml->Items->Request->Errors->Error[0]->Message;

    $info = array(

        "code" => $code,

        "price" => $price,

        "list_price" => $list_price,

        "you_save" => $you_save,

        "image" => $image,

        "url" => $url,

        "title" => $title,

        "item" => $item_a,

        "price_mp" => $price_mp,

        "valid" => $valid,

        "error" => $error,

        "available" => $available

    );

    return $info;

}


//Comprar mi cafetera Request

/*function cmc_amazon_get_data($kw)

{

    $params = array(

        "Operation" => "ItemSearch",

        "SearchIndex" => "All",

        "Keywords" => "$kw",

        "ResponseGroup" => "Images,ItemAttributes,Offers",

        "Condition" => "New",

    );

    $url = aws_signed_url($params);

    $response = wp_remote_get(esc_url_raw($url));

    $body = wp_remote_retrieve_body($response);

    $xml = simplexml_load_string($body);

    $item = $xml->Items->Item;

    $data = array(

        'url' => (string)$item[0]->DetailPageURL,

        'price' => (string)$item[0]->Offers->Offer->OfferListing->Price->Amount / 100,

        'discount' => (string)$item[0]->Offers->Offer->OfferListing->AmountSaved->Amount / 100,

        'price_3' => (string)$item[0]->Offers->Offer->OfferListing->SalePrice->Amount / 100,

        'available' => (string)$item[0]->Offers->TotalOffers

    );

    return $data;

}*/

/* Amazon */