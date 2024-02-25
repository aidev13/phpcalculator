<?php

$prices = [
   "chair" => 45.95,
   "table" => 185.65,
   "bench" => 85.98,
   "plates" => 12.95,
   "dresser" => 65.51
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Check out</title>
   <link rel="stylesheet" href="sales-form.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
   <div class="stripe"></div>
   <header class="header">
      <h2>Check out</h2>
   </header>

   <section class="card">
      <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
         <select name="items">
            <option value="empty">Choose an item</option>
            <option value="Chair">Chair - $<?php echo $prices["chair"]; ?></option>
            <option value="Table">Table - $<?php echo $prices["table"]; ?></option>
            <option value="Bench">Bench - $<?php echo $prices["bench"]; ?></option>
            <option value="Plate">Plates - $<?php echo $prices["plates"]; ?></option>
            <option value="Dresser">Dresser - $<?php echo $prices["dresser"]; ?></option>
         </select>
         <?php

         $value = 0;
         $item_name = '';

         if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $promo_code = htmlspecialchars($_POST['promo_code']);
            $item = htmlspecialchars($_POST['items']);



            switch ($item) {
               case 'empty':
                  $item_name = "Choose an item";
                  $value = "0";
                  break;
               case 'Chair':
                  $item_name = 'Chair';
                  $value = $prices["chair"];
                  break;
               case 'Table':
                  $item_name = 'Table';
                  $value = $prices["table"];
                  break;
               case 'Bench':
                  $item_name = 'Bench';
                  $value = $prices["bench"];
                  break;
               case 'Plate':
                  $item_name = 'Plate';
                  $value = $prices["plates"];
                  break;
               case 'Dresser':
                  $item_name = 'Dresser';
                  $value = $prices["dresser"];
                  break;
               default:;
                  echo "<p class='error'>Something went wrong, try again.</p>";
                  break;
            }
         }

         echo '<p>' . $item_name . ' - Price: $';
         echo $value;
         echo '</p>';
         ?>

         <label for="promo">Enter Promo code for 20% off</label>
         <br>
         <input type="text" name="promo_code" id="promo" placeholder="Enter Promo Code">

         <button>Check out</button>

         <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($promo_code)) {
               echo "";
            } else if ($promo_code == 'Spring24!') {
               $sale_price = $value - $value * .2;
               echo "<p> Your total is $";
               echo $sale_price;
               echo "</p>";
            } else {
               echo "Promo code not valid";
            }
         }
         ?>

      </form>
   </section>

   <footer class="footer">
      <p>Sales code is: Spring24!</p>
   </footer>
</body>

</html>