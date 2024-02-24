<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP Calculator</title>
   <!-- <link rel="stylesheet" href="reset.css"> -->
   <link rel="stylesheet" href="main.css">
</head>

<body>

   <div class="container">

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

         <input type="number" name="num1" placeholder="Number 1">
         <br>
         <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="x">x</option>
            <option value="/">/</option>
         </select>
         <br>
         <input type="number" name="num2" placeholder="Number 2">
         <br><br>
         <button>Calculate</button>

      </form>
   </div>

   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Grabbing data from html inputs
      $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT);
      $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT);
      $operator = htmlspecialchars($_POST['operator']);


      // Error handlers
      $errors = false;

      if (empty($num1) || empty($num2) || empty($operator)) {
         echo "<p class='error'>Please make sure all inputs have been filled out.</p>";

         $errors = true;
      } elseif (!is_numeric($num1) || !is_numeric($num2)) {
         echo "<p class='error'>Numbers only please.</p>";

         $errors = true;
      }

      //Calculate number if no errors

      if ($errors == false) {
         $value = 0;

         switch ($operator) {
            case "+":
               $value = $num1 + $num2;
               break;
            case "-":
               $value = $num1 - $num2;
               break;
            case "x":
               $value = $num1 * $num2;
               break;
            case "/":
               $value = $num1 / $num2;
               break;
            default:
            echo "<p class='error'>Something went wrong, try again.</p>";
         }

         echo "<h2 class='calculated-results'>" . $num1 . " " . $operator . " " . $num2 . " = " . $value ."</h2>";

      }
   }

   ?>

</body>

</html>