<?php
if(isset($_FILES['myfile']))
{
	$ftmp=$_FILES['myfile']['tmp_name'];
	$path="upload/".$_FILES['myfile']['name'];
	move_uploaded_file($ftmp,$path);
	echo "<img height='250' width='300' id='img' style='border-radius:50%;' src='$path'/>";
}
else
{
	?>
	</br>
	<?php
	echo "Not upload";
}
?>
<html>
<head>
<title>Registration Form</title>
<style>
img
{
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
	<link rel="stylesheet" href="js/bootstrap.min.css">
	<link rel="stylesheet" href="js/registration.css">
	<script src="js/jquery.min.js"></script>
	<script>
		$(function(){
			$("#form").submit(function(){
				$("#error1").remove();
				var  Fname=$("#fname").val();
				var  Lname=$("#lname").val();
				var  Email=$("#email").val();
				var  Password=$("#password").val();
				var  Confirm_Password=$("#confirm_password").val();
				var  Age=$("#age").val();
				var  Birthday=$("#birthday").val();
				var  Country=$("#country").val();
				var State=$("#state").val();
				var City=$("#city").val();
				var Phone=$("#phone").val();
				var Agree=$("#agree").val();
				if(Fname=="" || Lname=="" || Email=="" || Password=="" || Confirm_Password=="" || Age=="" 
				|| Birthday=="" || Country=="" || State=="" || City=="" || Phone=="")
				{	
					if(Fname=="")
					{
						$("#p1").html("First name is required");
						$("#p1").css({"color":"red"});
					}
					if(Lname=="")
					{
						$("#p2").html("Last name is required");
						$("#p2").css({"color":"red"});
					}
					if(Email=="")
					{
						$("#p3").html("<p id='error1'>Email is required</p>");
						$("#p3").css({"color":"red"});
					}
					if(Password=="")
					{
						$("#p4").html("Password is required");
						$("#p4").css({"color":"red"});
					}
					if(Confirm_Password=="")
					{
						$("#p5").html("Confirm Password is required");
						$("#p5").css({"color":"red"});
					}
					if(Age=="")
					{
						$("#p6").html("Age is required");
						$("#p6").css({"color":"red"});
					}
					if(Birthday=="")
					{
						$("#p7").html("Birthday is required");
						$("#p7").css({"color":"red"});
					}
					if(Country=="")
					{
						$("#p8").html("Country is required");
						$("#p8").css({"color":"red"});
					}
					if(State=="")
					{
						$("#p9").html("State is required");
						$("#p9").css({"color":"red"});
					}
					if(City=="")
					{
						$("#p10").html("City is required");
						$("#p10").css({"color":"red"});
					}
					if(Phone=="")
					{
						$("#p11").html("Phone is required");
						$("#p11").css({"color":"red"});
					}
					return false;
				}
				else
				{
					return true;
				}
			});
			$("#fname").keyup(function(){
				var Fname=$("#fname").val();
				if(Fname.length>2)
				{
					
					$("#p1").html("First name is confirmed");
					$("#p1").css({"color":"green"});
				}
				else
				{
					$("#p1").html("First name is not confirmed");
					$("#p1").css({"color":"red"});
					
				}
			});
			$("#lname").keyup(function(){
				var Lname=$("#lname").val();
				if(Lname.length>2)
				{
					
					$("#p2").html("Last name is confirmed");
					$("#p2").css({"color":"green"});
				}
				else
				{
					$("#p2").html("Last name is not confirmed");
					$("#p2").css({"color":"red"});
					
				}
			});
			$("#email").keyup(function(){
				var Email=$("#email").val();
				if(Email!="")
				{
					
					var regEx = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					var validEmail = regEx.test(Email);
					if (!validEmail) 
					{
							$("#p3").html("Email is not valid");
							$("#p3").css({"color":"red"});
					}
					else
					{
							$("#p3").html("Email is Valid");
							$("#p3").css({"color":"green"});
					}
				}
				else
				{
					$("#p3").html("Email is not Valid");
					$("#p3").css({"color":"red"});
					
				}
			});
			$("#password").keyup(function(){
				var Password=$("#password").val();
				
				if(Password!="")
				{
					if(Password.length>5)
					{
						$("#p4").html("Password is confirmed");
						$("#p4").css({"color":"green"});
					}
					else
					{
						$("#p4").html("Password must be greater than 6 digits");
						$("#p4").css({"color":"red"});
					}
				}
				else
				{
					$("#p4").html("Password is not confirmed");
					$("#p4").css({"color":"red"});
				}
			});
			$("#confirm_password").keyup(function(){
				var Password=$("#password").val();
				var Confirm_Password=$("#confirm_password").val();
				
				if(Confirm_Password==Password)
				{
					$("#p5").html("Match password");
					$("#p5").css({"color":"green"});
					
				}
				else
				{
					$("#p5").html("Password does not match");
					$("#p5").css({"color":"red"});
				}
			});
			$("#age").keyup(function(){
				var Age=$("#age").val();
				
				if(Age!="")
				{
					if(Age>=18)
					{
						$("#p6").html("Age is confirmed");
						$("#p6").css({"color":"green"});
					}
					else
					{
						$("#p6").html("Age must be greater than 18");
						$("#p6").css({"color":"red"});
					}
				}
				else
				{
					$("#p6").html("Age is not valid");
					$("#p6").css({"color":"red"});
					
				}
			});
			$("#birthday").keyup(function(){
				var Birthday=$("#birthday").val();
			
				if(Birthday!="")
				{
					$("#p7").html("Birthday is confirmed");
					$("#p7").css({"color":"green"});
					
				}
				else
				{
					$("#p7").html("Birthday is not valid");
					$("#p7").css({"color":"red"});
					
				}
			});
			$("#country").keyup(function(){
				var Country=$("#country").val();
				
				if(Country!="")
				{
					$("#p8").html("Country is confirmed");
					$("#p8").css({"color":"green"});
					
				}
				else
				{
					$("#p8").html("Country is not valid");
					$("#p8").css({"color":"red"});
					
				}
			});
			$("#state").keyup(function(){
				var State=$("#state").val();
				
				if(State.length>2)
				{
					$("#p9").html("State is confirmed");
					$("#p9").css({"color":"green"});
					
				}
				else
				{
					$("#p9").html("State is not valid");
					$("#p9").css({"color":"red"});
					
				}
			});
			$("#city").keyup(function(){
				var City=$("#city").val();
				
				if(City.length>2)
				{
					$("#p10").html("City is confirmed");
					$("#p10").css({"color":"green"});
					
				}
				else
				{
					$("#p10").html("City is not valid");
					$("#p10").css({"color":"red"});
					
				}
			});
			$("#phone").keyup(function(){
				var Phone=$("#phone").val();
				
				if(Phone.length==10)
				{
					$("#p11").html("Phone is confirmed");
					$("#p11").css({"color":"green"});
					
				}
				else
				{
					$("#p11").html("Phone is not valid");
					$("#p11").css({"color":"red"});
				}
			});
		});

	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
            <div class="text-primary">
              <center><h1>Registration</h1></center>
            </div>
					<div class="panel-body">
						<form id="form" method="post" class="form-horizontal" action="">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">First name</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="fname" name="fname" placeholder="First name" />
									<p id="p1"></p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lname">Last name</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" />
									<p id="p2"></p>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4 control-label" for="email">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email" />
									<p id="p3"></p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="password">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
									<p id="p4"></p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password">Confirm password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
									<p id="p5"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="age">Age:</label>
								<div class="col-sm-5">
									<input type="number" class="form-control" id="age" name="age" placeholder="Enter the Age " />
									<p id="p6"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="date">Birthday :</label>
								<div class="col-sm-5">
									<input type="date" class="form-control" id="birthday" name="birthday" placeholder="Please Choose the Date" />
									<p id="p7"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="country">Country :</label>
								<div class="col-sm-5">
									<p id="p8"></p>
									<select id="country" name="country" class="form-control">
										<option value="Afghanistan">Afghanistan</option>
										<option value="Åland Islands">Åland Islands</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Antarctica">Antarctica</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Benin">Benin</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Bouvet Island">Bouvet Island</option>
										<option value="Brazil">Brazil</option>
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option value="Brunei Darussalam">Brunei Darussalam</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Cote D'ivoire">Cote D'ivoire</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="French Guiana">French Guiana</option>
										<option value="French Polynesia">French Polynesia</option>
										<option value="French Southern Territories">French Southern Territories</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Grenada">Grenada</option>
										<option value="Guadeloupe">Guadeloupe</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guernsey">Guernsey</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-bissau">Guinea-bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
										<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
										<option value="Honduras">Honduras</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Isle of Man">Isle of Man</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japan">Japan</option>
										<option value="Jersey">Jersey</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
										<option value="Korea, Republic of">Korea, Republic of</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macao">Macao</option>
										<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
										<option value="Moldova, Republic of">Moldova, Republic of</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Netherlands Antilles">Netherlands Antilles</option>
										<option value="New Caledonia">New Caledonia</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Niue">Niue</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="Northern Mariana Islands">Northern Mariana Islands</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Pitcairn">Pitcairn</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Reunion">Reunion</option>
										<option value="Romania">Romania</option>
										<option value="Russian Federation">Russian Federation</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Saint Helena">Saint Helena</option>
										<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										<option value="Saint Lucia">Saint Lucia</option>
										<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
										<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Senegal">Senegal</option>
										<option value="Serbia">Serbia</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Singapore">Singapore</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syrian Arab Republic">Syrian Arab Republic</option>
										<option value="Taiwan, Province of China">Taiwan, Province of China</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
										<option value="Thailand">Thailand</option>
										<option value="Timor-leste">Timor-leste</option>
										<option value="Togo">Togo</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad and Tobago">Trinidad and Tobago</option>
	 									<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="United Arab Emirates">United Arab Emirates</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="United States">United States</option>
										<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Viet Nam">Viet Nam</option>
										<option value="Virgin Islands, British">Virgin Islands, British</option>
										<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
										<option value="Wallis and Futuna">Wallis and Futuna</option>
										<option value="Western Sahara">Western Sahara</option>
										<option value="Yemen">Yemen</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									</select>
							</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="state">State :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="state" name="state" placeholder="Please Enter the State Name " />
									<p id="p9"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="city">City :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="city" name="city" placeholder="Please Enter the City Name " />
									<p id="p10"></p>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-4 control-label" for="phone">Phone Number :</label>
								<div class="col-sm-5">
									<input type="phone" class="form-control" id="phone" name="phone" placeholder="Please Enter Phone Number " />
									<p id="p11"></p>
								</div>
							</div>	
							<div class="form-group">
								<div class="col-sm-5 col-sm-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" id="agree" name="agree" value="agree" required />Please agree to <a href="#">Terms </a>and <a href="#">Conditions</a>
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<input type="submit" class="btn btn-primary" name="signup" value="Sign up"></button>
								</div>
							</div>
						</form>
					</div>
				
			</div>
		</div>
	</div>
</body>
</html>
