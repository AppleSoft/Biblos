<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
            "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<title>Who Says CSS Forms Cant Look Good? version 3.0</title>

	<link rel="stylesheet" type="text/css" href="css/screen.css">

</head>
<body>
	<h1>Form Example</h1>
	<p>Before looking at the code behind this example please read the <a href="simpleform.html">simple form</a> example.</p>
	<h2>Account Registration</h2>
	<form action="">
		<p>Please complete the form below.</p>
		<fieldset class="login">
			<legend>Login Details</legend>
			<div>
				<label for="username">User Name</label> <input type="text" id="username" name="username">
			</div>
			<div>
				<label for="password">Password</label> <input type="password" id="password" name="password">
			</div>
			<div>
				<label for="password2">Retype Password</label> <input type="password" id="password2" name="password2">
			</div>
		</fieldset>
		<fieldset class="contact">
			<legend>User Details</legend>
			<div>
				<label for="firstname">First Name</label> <input type="text" id="firstname" name="firstname">
			</div>
			<div>
				<label for="lastname">Last Name</label> <input type="text" id="lastname" name="lastname">
			</div>
			<div class="radio">
				<fieldset>
					<legend><span>Gender</span></legend>
					<div>
						<input type="radio" id="male" name="gender" value="male"> <label for="male">Male</label>
					</div>
					<div>
						<input type="radio" id="female" name="gender" value="female"> <label for="female">Female</label>
					</div>
				</fieldset>
			</div>
			<div class="date">
				<fieldset>
					<legend><span>Date of Birth</span></legend>
					<div>
						<label for="day">Day</label>
						<select id="day" name="dob_day">
							<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
						</select>
					</div>
					<div>
						<label for="month">Month</label>
						<select id="month" name="dob_month">
							<option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
						</select>
					</div>
					<div>
						<label for="year">Year</label>
						<select id="year" name="bod_year">
							<option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option>
						</select>
					</div>
				</fieldset>
			</div>
			<div>
				<label for="email">Email</label> <input type="text" id="email" name="email" class="email">
			</div>
		</fieldset>
		<div><button type="submit" id="submit-go">Submit</button></div>
	</form>
</body>
</html>