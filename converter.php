<html>
  <head>
    <title>Bitcoin Currency Converter</title>
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <link rel="stylesheet" href="css/styles.css"  />
    <script type="text/javascript" src="scripts/bootstrap.min.js" ></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height">
  </head>
  <body style="padding-left: 60px; padding-right: 100PX;  font-size: 14px; padding-bottom: 60px; font-family: sans-serif; background:#008080; ">

          <div id="wrapper">
      
 
     

<div style="background-color: yellow; color: #336633;">
    <div id="wrapper">
      <?php
    // Make sure the user submitted all of the data required
    if(isset($_POST['amount']) && is_numeric($_POST['amount']) && isset($_POST['currency'])) { 

    // Use curl to perform the currency conversion using Blockchain.info's currency conversion API
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://blockchain.info/tobtc?currency=" . $_POST['currency'] . "&value=" . $_POST['amount']);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $conversion = curl_exec($ch);

      // Use curl to get current prices and 15 minute averages for all currencies from Blockchain.info's exchange rates API
      curl_setopt($ch, CURLOPT_URL, "https://blockchain.info/ticker");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $prices = json_decode(curl_exec($ch), true);
      curl_close($ch);
    ?>
    <div style="text-align: center; background-color: #ffffff;">
      <h1>Conversion Results</h1>
      <p><?php echo $_POST['amount']; ?> <?php echo $_POST['currency']; ?> is <?php echo $conversion; ?> BTC.</p>
      <h2>Historical Prices</h2>
      <p><strong>Last price:</strong> <?php echo $prices[$_POST['currency']]['last']; ?><?php echo $prices[$_POST['currency']]['symbol']; ?></p>
      <p><strong>Buy price:</strong> <?php echo $prices[$_POST['currency']]['buy']; ?><?php echo $prices[$_POST['currency']]['symbol']; ?></p>
      <p><strong>Sell price:</strong> <?php echo $prices[$_POST['currency']]['sell']; ?><?php echo $prices[$_POST['currency']]['symbol']; ?></p>
      <p><strong>15 minute average price:</strong> <?php echo $prices[$_POST['currency']]['15m']; ?><?php echo $prices[$_POST['currency']]['symbol']; ?></p>
    </div>
    <br><br><br>
    <p style="color: blue; text-align: center;font-size: 22px; background: #ccff66; padding-left: 80px; padding-right: 80ox; ">Historical Data (USD only)<br>
      <h3>Hover the cursor on the graph for more info</h3>
    </p>

    <?php
      // Display the pricing chart if we're doing a US Dollar conversion
      if($_POST['currency'] == "USD") { 

      // Use curl to get pricing chart data for the past 60 days
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://blockchain.info/charts/market-price?showDataPoints=true&timespan=60days&show_header=true&daysAverageString=7&scale=0&format=json");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $chartdata = json_decode(curl_exec($ch), true);
    ?>
    <div id="chart" style="width: 1000px; height: 500px; background-color: #cccc99;"></div>
    <script type="text/javascript">
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Day', 'Price'],
          <?php
          // Loop through the x-y coordinates Blockchain.info's API provides and add them to a JavaScript array
           foreach($chartdata["values"] as $xy) {
            echo "['" . date("Y/m/d", $xy["x"]) . "'," . $xy["y"] . "],";
          }
          ?>
        ]);

        new google.visualization.LineChart(document.getElementById("chart")).draw(data, {curveType: "function",
          width: 1000, height: 500,
          vAxis: {maxValue: 800}}
        );
     }
     drawChart();
   </script>
   <?php } ?>
   <?php } else { ?>
   <p>Please fill out the form completely. <a href="index.php">Go back.</a></p>
   <?php } ?>
   </div>
   </div>
 </body>


</html>