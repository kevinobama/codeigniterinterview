<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>kevin</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>admin Dashboard</h1>
	<div id="body">
        6.1. Count of all active and verified users.<br>
        6.2. Count of active and verified users who have attached active products.<br>
        6.3. Count of all active products (just from products table).<br>
        6.4. Count of active products which don't belong to any user.<br>
        6.5. Amount of all active attached products (if user1 has 3 prod1 and 2 prod2 which are active, user2 has 7 prod2 and 4 prod3, prod3 is inactive, then the amount of active attached products will be 3 + 2 + 7 = 12).<br>

        6.6. Summarized price of all active attached products (from the previous subpoint if prod1 price is 100$, prod2 price is 120$, prod3 price is 200$, the summarized price will be 3100 + 9120 = 1380).<br>
        6.7. Summarized prices of all active products per user. For example - John Summer - 85$, Lennon Green - 107$.<br>
        6.8. The exchange rates for Euro and RON based on USD using https://exchangeratesapi.io/ . <br>
        <br>
<!--        --><?php //foreach ($products as $key=>$product) { ?>
<!--            <p>--><?//=$product['id']?><!-- --><?//=$product['title']?><!--</p>-->
<!--        --><?php // } ?>

        <table border="1" width="100%">
            <tr>
                <td width="50%">Count of all active users</td>
                <td><?=$countOfAllActiveUsers ?></td>
            </tr>
            <tr>
                <td width="50%">Count of all verified users</td>
                <td><?=$countOfAllverifiedUsers ?></td>
            </tr>
            <tr>
                <td width="50%">6.2. Count of active and verified users who have attached active products.</td>
                <td><?=$userCountAttachedActiveProducts ?></td>
            </tr>
            <tr>
                <td width="50%">6.3. Count of all active products (just from products table).</td>
                <td><?=$countActiveProduct ?></td>
            </tr>

            <tr>
                <td width="50%">6.4. Count of active products which don't belong to any user.</td>
                <td><?=$unusedProduct ?></td>
            </tr>
            <tr>
                <td width="50%">6.5. Amount of all active attached products (if user1 has 3 prod1 and 2 prod2 which are active, user2 has 7 prod2 and 4 prod3, prod3 is inactive, then the amount of active attached products will be 3 + 2 + 7 = 12).</td>
                <td><?=$qtyAttachedProduct ?></td>
            </tr>
            <tr>
                <td width="50%">6.6. Summarized price of all active attached products (from the previous subpoint if prod1 price is 100$, prod2 price is 120$, prod3 price is 200$, the summarized price will be 3100 + 9120 = 1380).</td>
                <td><?=$priceAttachedProduct ?></td>
            </tr>
            <tr>
                <td width="50%">6.7. Summarized prices of all active products per user. For example - John Summer - 85$, Lennon Green – 107$.</td>
                <td>
                    <?php
                    foreach ($priceAttachedProductPeruser as $priceAttachedProduct) {
                        echo($priceAttachedProduct['firstname']." : ".$priceAttachedProduct['price']."$ <br>");
                    }
                     ?>

                </td>
            </tr>
            <tr>
                <td width="50%">6.8. The exchange rates for Euro and RON based on USD using https://exchangeratesapi.io/ .</td>
                <td>
                    <?php
                    foreach ($priceAttachedProductPeruser as $priceAttachedProduct) {
                        echo($priceAttachedProduct['firstname']." : ".$priceAttachedProduct['price']."$ <br>");
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>