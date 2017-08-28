<?php

require_once('includes/functions.php');

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if(isset($_POST['submit'])) {
   $submit = $_POST['submit']; 
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  
  $to_value = convert_leakrate($from_value, $from_unit, $to_unit);
}

$leakrate_options = array(
  "mbar liters/sec",
  "std cc/hr",
  "std cc/min",
  "std cc/sec",
  "torr liters/sec",
  "pascal liters/sec",
  "molecules/sec"
);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Leak Rate Conversions</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>

     <div id="main-content">

      <h1>Leak Rate Calculator</h1>
  
      <form action="" method="post">
        
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
            <?php
            foreach($leakrate_options as $unit) {
              $opt = optionize($unit);
              echo "<option value=\"{$opt}\"";
              if($from_unit == $opt) { echo " selected"; }
              echo ">{$unit}</option>";
            }
            ?>
          </select>
        </div>
        
        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="text" name="to_value" value="<?php echo ($to_value); ?>" />&nbsp;
          <select name="to_unit">
            <?php
            foreach($leakrate_options as $unit) {
              $opt = optionize($unit);
              echo "<option value=\"{$opt}\"";
              if($to_unit == $opt) { echo " selected"; }
              echo ">{$unit}</option>";
            }
            ?>
          </select>
          
        </div>
         <div>
         <p>In Scientific Notation: </p><?php echo sprintf("Result = %1\$.2E", $to_value); ?></div>
        <input type="submit" name="submit" value="Submit" />
      
      </form>
  
      <br />
      <a href="index.php">Return to menu</a>
      
    </div>
  </body>
</html>
