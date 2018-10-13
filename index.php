<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	    <style>
	    	body{
	    		text-align: center;
	    		margin-top: 20px;
	    	}
	    </style>
		<title>Bitcoin Currency Converter</title>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h2>Welcome to Bitcoin curreny converter</h2>
				<hr />
				<form action="converter.php" method="post">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-xs-12">
								<label for="control-label"><b>Amount</b></label>
								<input type="number" name="amount" class="form-control" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-xs-12">
								<label for="control-label"><b>Currency</b></label>
								<select name="currency" class="form-control" id="">
									<option value="USD">USD</option>
		                              <option value="EUR">EUR</option>
		                              <option value="CNY">CNY</option>
		                              <option value="JPY">JPY</option>
		                              <option value="SGD">SGD</option>
		                              <option value="HKD">HKD</option>
		                              <option value="CAD">CAD</option>
		                              <option value="AUD">AUD</option>
		                              <option value="NZD">NZD</option>
		                              <option value="GBP">GBP</option>
		                              <option value="DKK">DKK</option>
		                              <option value="SEK">SEK</option>
		                              <option value="BRL">BRL</option>
		                              <option value="CHF">CHF</option>
		                              <option value="RUB">RUB</option>
		                              <option value="SLL">SLL</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-xs-12">
							<button type="submit" class="btn btn-block btn-primary">
								Convert
							</button>	
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
