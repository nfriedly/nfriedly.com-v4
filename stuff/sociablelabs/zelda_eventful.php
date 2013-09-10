<html>
    <head>
    </head>
    <body>
        <div id="rondavu_container"></rondavu_container>
            <script type="text/javascript" charset="utf-8">
   
<?php

include 'sl_rondavu_signing.php';

// location of the sign_private_key provided by Sociable Labs
$sign_private_key_path = '/home/nfriedly/rondavu/sign_private_key'; //path/to/sign_private_key

// example one: PHP array
$unsignedRondavuData = array(
	   'config' => array(
			   'version' => '1.1'
	   ),
	   'user' => array(
			   'id' => array(
					   array(
							   'id' => 'ZuDRzaTAOrkP5mxgMWLvzQ==',
							   'type' => 'chegg'
					   )
			   )
	   ),
	   'page' => array(
			   'disable' => false,
			   'shopping_cart' => array(
					   'is_shopping_cart' => true,
					   'pre_purchase' => false,
					   'order_id' => 'EBK86QX',
					   'total' => '177.02',
					   'currency' => 'USD'
			   ),
			   'tags' => array( '20Credit4Promo' ),
			   'is_homepage' => false,
			   'language' => 'en-US'
	   ),
	   'primary_mo' => array(
			   'id' => array(
					   array(
							   'id' => 1,
							   'type' => 'order'
					   )
			   ),
			   'name' => array(
					   array(
							   'name' => 'Order confirmation',
							   'language' => 'en-US',
							   'primary' => true
					   )
			   ),
			   'promotion' => array(
					   'do_promote' => false,
			   ),
			   'url' => array(
					   'detail' => "http://www.chegg.com/checkout/ordersent/"
			   )
	   ), // end of primary_mo
	   'mos' => array(
			   array(
					   'id' => array(
							   array(
									   'id' => '032159231Xd',
									   'type' => 'book'
							   )
					   ),
					   'name' => array(
							   array(
									   'name' => 'Organic Chemistry',
									   'language' => 'en-US',
									   'primary' => true
							   )
					   ),
					   'tags' => array(),
					   'price' => array(
							   'actual_paid' => "177.02",
							   'currency' => 'USD'
					   ),
					   'promotion' => array(
							   'do_promote' => true,
							   'promo_style_tags' => array( '20Credit4Promo' ),
							   'url' => array(
									   'detail' => 'http://rondavu-test-implementations.s3.amazonaws.com/hilary/cheggTest.html',
									   'purchase' => 'http://rondavu-test-implementations.s3.amazonaws.com/hilary/cheggTest.html',
									   'picture' => array(
											   'primary' => 'http://c.chegg.com/covers2/9950000/9951468_1250622906.jpg',
											   'primary_secure' => 'https://a248.e.akamai.net/static.chegg.com/covers2/9950000/9951468_1250622906.jpg'
									   )
							   )
					   )
			   ) // end of this mo
	   )// end of mos array
);

$signedRondavuData = rondavu_sign($unsignedRondavuData, $sign_private_key_path);

echo "var RondavuData = $signedRondavuData;";



		
// example two: JSON encoded string
$unsignedRondavuData = '{"config":{"version":"1.1"},"page":{"disable":false,"is_homepage":false,"marketing_area":null,"tags":null,"language":"en-us","shopping_cart":null},"primary_mo":{"product_date":null,"promotion":null,"id":[{"id":"2","type":"artist"}],"location":null,"name":[{"name":"Justin Bieber","language":"en-us","primary":true}],"primary_tag":"Justin Bieber","tags":["Music","US","artist","JustinBieber"],"facebook":null,"url":{"detail":"http://www2.sociablelabs.com/demo/tm/artist.html","purchase":"","picture":{"primary":"http://media.ticketmaster.com/tm/en-us/dbimages/54516a","primary_secure":null,"small":null,"small_secure":null,"large":null,"large_secure":null},"video":null}}}';

$signedRondavuData = rondavu_sign($unsignedRondavuData, $sign_private_key_path);
		
echo "var RondavuData = $signedRondavuData;";
		


?>

	
</script>

<!-- Rondavu JS snippet here -->

    </body>
</html>