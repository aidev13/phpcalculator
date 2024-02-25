<?php

$prices = [
"chair" => 35.95,
"table" => 185.65,
"bench" => 85.98,
"plates" => 12.95,
"dresser" => 65.50
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Check Out</title>
</head>

<body>
   <header class="header">
      <h2>Check out</h2>
   </header>

   <section>
      <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
         <select name="items">
            <option value="empty">Choose an item</option>
            <option value="Chair">Chair</option>
            <option value="Table">Table</option>
            <option value="Bench">Bench</option>
            <option value="Plate">Plates</option>
            <option value="Dresser">Dresser</option>
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
                  $value = 39.95;
                  break;
               case 'Table':
                  $item_name = 'Table';
                  $value = 129.95;
                  break;
               case 'Bench':
                  $item_name = 'Bench';
                  $value = 56.95;
                  break;
               case 'Plate':
                  $item_name = 'Plate';
                  $value = 19.95;
                  break;
               case 'Dresser':
                  $item_name = 'Dresser';
                  $value = 97.00;
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