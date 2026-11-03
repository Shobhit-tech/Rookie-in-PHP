<?php
    $customerBudget = $_GET["budget"];
    $brandName = $_GET["brandName"];
   $phone = [
        "Brand" => "Samsung",
        "Processor" => "Snapdragon 8 Elite",
        "RAM" => 12,
        "Storage" => 256,
        "Original Price" => 80000,
        "Discount" => 10,
        "Availability" => "yes"
   ];

//    foreach($phone as $key => $value){
//         echo $key.": ".$value."<br>";
//    }

   function calculatePrice($originalPrice, $discountPercentage){
        $discountPrice = $originalPrice*($discountPercentage/100);
        $finalAmount = $originalPrice-$discountPrice;
        return $finalAmount;
   }

   $amount=calculatePrice($phone["Original Price"],$phone["Discount"]);
//    echo $amount;

    if($brandName!=$phone["Brand"]){
        echo "Brand not available";
        echo "<br>";
        echo "Your bill is not generated";
        return;
    }

   elseif($phone["Availability"] && $brandName==$phone["Brand"]){
        echo "Your Bill is Generated!"."<br>";
        echo "Total amount: ".$amount;
        echo "<br><br>";
        if($customerBudget>=$amount){
            echo "Purchase Successful!";
            $amountSaved = $customerBudget-$amount;
            echo "<br>";
            echo "You save: ".$amountSaved;
        }
        else{
            echo "Payment cannot be completed.";
            echo "<br>";
            $neededAmount = $amount-$customerBudget;
            echo "You need Rs. ".$neededAmount." more";
        }
    }

//    echo strtoupper($phone["Brand"])."<br>";
//    echo strlen($phone["Brand"]);


?>