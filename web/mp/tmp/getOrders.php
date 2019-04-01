<?php
    include("class.bonanza.php");
    $myBonanza = new BonanzaAPI();
    $response = $myBonanza->getOrders("2016-01-04");

    foreach($response["getOrdersResponse"]["orderArray"] as $r){
        $theOrder = $r["order"];
        extract($theOrder);
        echo "Order: ".$orderID."\n";
        $perShippingCost = ($shippingDetails["amount"]+$taxAmount) / count($itemArray);
        foreach($itemArray as $item){
            //$data["OrderDate"] = substr($createdTime,0,10);
            $data["Order #"] = $orderID;
            $data["Ship To Name"] = $shippingAddress["name"];
            $data["Ship To Address 1"] = $shippingAddress["street1"];
            $data["Ship To Address 2"] = $shippingAddress["street2"];
            $data["Ship To City"] = $shippingAddress["cityName"];
            $data["Ship To State"] = $shippingAddress["stateOrProvince"];
            $data["Ship To Zip"] = $shippingAddress["postalCode"];
            $data["Ship Method"] = $shippingDetails["shippingService"];
            $data["Product ID"] = $item["item"]["sku"];
            $data["Sold For"] = "N/A";
            $data["Our Cost"] = $item["item"]["price"] + $perShippingCost;
            $data["Qty"] = $item["item"]["quantity"];
            $data["Description"] = $item["item"]["title"];
            //$data["Shipping Cost"] = $shippingDetails["amount"]+$taxAmount;
            $data["Shipping Cost"] = 0;
            $data["Order Source"] = "Bonanza";
            //$data["OrderTotal"] = $amountPaid;


            $arrData[]=$data;
        }


    }
    var_dump($arrData);

    $handle = fopen("SHOEMETRO-ORDER-".date("Ymd-his").".csv","w");
    fputcsv($handle,array_keys($arrData[0]));
    foreach($arrData as $d){
        fputcsv($handle,$d);
    }
    fclose($handle);
?>