<?php  

require_once('/Users/Ashbec/Sites/TTScreen.com/include/config.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Restaurant Review</title>
<meta http-equiv="Content-Type" content="text/html; ">
<meta http-equiv="Content-Style-Type" content="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo $secure_server; ?>css/menu.css">
</head>

<body>
<div id="menuDiv" style="top:0pt; position:sticky; z-index:3; font-size: 14px;" >
	<table align="left" style="z-index: 3; width:100%; margin:0pt; font-size: 18px; 
		padding: 0pt; border: 0pt; left: 0pt; color: rgb(0,0,0); background-color:rgb(255,255,255); ">
		<tr style="width:100%; "> 
			<td align="center" style="width:20%; background-color:rgb(255,255,255);">
			<a href="<?php echo $secure_server,'index.php'; ?>" style="width:100%;">
				<img src="<?php echo $secure_server, 'images/ToptalLogo.png' ; ?>" style="border:0pt; width:100pt; height:36pt;" />
			</a>
			<noscript>
				 <p align="left">
				 <font style="color: rgb(0,0,0); font-weight:bold; ">
				 This site requires that Javascript be enabled.  Please check your browser settings.
				 </font>
				 </p>
			</noscript>
			</td>
			<td class="menu-cell" style="width:16%; vertical-align:middle;">&nbsp; </td>
			<td class="menu-cell" style="width:16%; vertical-align:middle;" >&nbsp;</td>
			<td class="menu-cell" style="width:16%; vertical-align:middle;">&nbsp;</td>
			<td class="menu-cell" style="width:16%; vertical-align:middle;">&nbsp;</td>
			
			<td id="menuCell" class="menu-cell" style="width:16%; vertical-align:middle; border: 1px solid;" 
				onmouseover='document.getElementById("DivPopMenu4").style.visibility="visible"; 
					document.getElementById("menuTable").style.visibility="visible";'>
				&nbsp;User Menu&nbsp;&#9662;
			</td>
	   </tr>
	</table>
	<div id="PopMenus" style="top:46px; position:absolute; width:100%;" >
	<table style="padding:0; margin:0; width:100%; ">
	   <tr style="padding:0; margin:0;">
		<td  style="width:20%;">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
			<div id="DivPopMenu4" style="position:absolute; z-index: 3; left:84%; width:16%; visibility: hidden; 
				padding:0; margin:0;"  
				onmouseover='document.getElementById("DivPopMenu4").style.visibility="visible"; 
					document.getElementById("menuTable").style.visibility="visible";' 
				onmouseout='document.getElementById("menuTable").style.visibility="hidden";
					document.getElementById("DivPopMenu4").style.visibility="hidden";'>
			<table id="menuTable" cellspacing="0" class="menu-table" style="width:100%;" >
				<tr>
				  <td class="menu-lower-cell" onmouseover='style.fontWeight="bold";' 
						onmouseout='style.fontWeight="normal";'onclick="login()">Login</td>
			    </tr>
			</table>
			</div>
		</td>
		<td> </td>
		</tr>
	</table>
	</div>
</div>
	<h1 align="center" style="font-family: Dinot, Verdana, Geneva, sans-serif;">Restaurant Review Website</h1>
	<div id=loginDiv>
		<h3>Please login or Create a new account</h3>
		<form id="loginForm" style="width: 400px; ">
		<p>&nbsp;Email address:&nbsp;<input id="userEmailFld" type="text" name="userEmail" 
			size="30" maxlength="40" /></p>
		<div id="emailErr" style="color: red;"></div>
		<p>
			&nbsp;Password:&nbsp;<input id="userPwFld" name="password" type="password" size="16" maxlength="16" 
			style="margin-left:8px; " />
		<div id="pwErr" style="color: red;"></div>
		<br/>
		</p>
		<div align="center">
			<input id="submitLogin" type="submit" name="submit" value="Login/Create" style="font-size:16px; " 
				  onclick="login(); return false;" /> 
		</div>
		</form>
	</div>
	<div id=restListDiv hidden>
		<h2 align="center">Restaurants ordered by average rating</h2>
		<h3 align="center">(Select name for restaurant details.)</h3>
		<select id=restFilter size=1 name=filter >Ratings filter: 
			<option value="0" selected>All (no filter)</option>
			<option value="1">1+</option>
			<option value="2">2+</option>
			<option value="3">3+</option>
			<option value="4">4+</option>
		</select>
		<p id=restListErr ></p>
		<div id=restSelectionList >
		</div>
	</div>
	<div id=viewRestDiv hidden>
		<p>viewRestDiv</p>
	</div>
	<div id=addCommentDiv hidden>
		<p>addCommentDiv</p>
	</div>
	<div id=editUserDiv hidden>
		<p>editUserDiv</p>
	</div>
	<div id=createRestDiv align="center" hidden>
		<h2 align="center">Create an owned restaurant</h2>
		<form style="width: 400px; align-content:flex-end;">
			<p>Restaurant Name: 
				<input id="restName" type="text" name="restName" size="30" maxlength="30" />
			</p>
			<p>Street: 
				<input id="restStreet" type="text" name="restStreet" size="40" maxlength="40" />
			</p>
			<p>City: 
				<input id="restCity" type="text" name="restCity" size="30" maxlength="30" />
			</p>
			<p>State/Province: 
				<select id="restState" type="text" name="restState" size="1" >
				</select> (dependent on country selected)
			</p>
			<p>Country: 
				<select id="restCountry" type="text" name="restCountry" size="1" >
				</select>
			</p>
			<div align="center">
				<br/>
				<p align="center">
				<input id="submitRest" align="middle" type="submit" name="submit" value="Create" style="font-size:16px; " 
					  onclick="createRest(); return false;" /> 
				</p>
				<br/>
			</div>
			<div id="creationErr" style="color: red;" >
			</div>
		</form>
	</div>
	<div id="viewRestDiv" align="center" hidden>
		<div id="existingDetails" >
		
		</div>
		<div id="newCommentDiv" >
			
		</div>
	</div>
	<div id=editRestDiv hidden>
		<p>editRestDiv</p>
	</div>
	<div id=replyDiv hidden>
		<p>replyDiv</p>
	</div>
	
	<script src=<?php echo $secure_server;?>scripts/countries.js ></script>
	<script>
		// Select visible div
		function setScreen(div) {
			screenList = [loginDiv,restListDiv,viewRestDiv,addCommentDiv,editUserDiv,editRestDiv,
						  createRestDiv,replyDiv,viewRestDiv] ;
			screenList.forEach (element => element.hidden = ! (element == div));
		}
		async function prepRestList() {
			let url = "<?php echo $secure_server; ?>getRestList.php?filter=" + restFilter.value ;
			try {
				let response = await fetch(url);
				jsonRest = await response.json();
			} catch(err) {
				restListErr.innerHTML = "<p>Communications error. Please try later.</p><p>"
								+ err + "</p>";
				return false;
			}
			let htmlList;
			if (jsonRest['rest'].length == 0) {
				restSelectionList.innerHTML = "<p>No restaurants matched the filter criteria.</p>";
			} else {
				jsonRest['rest'].forEach(rest => 
				htmlList += `<input type=text value="` + rest['restName'] + `" onclick="prepViewRest("` 
						 + rest['restID'] + `")" readonly /><br/>`);
				restSelectionList.innerHTML = htmlList;
			}
			setScreen(restListDiv);
		}
		async function createRest() {
			userID = sessionStorage.getItem('userID');
			creationErr.innerHTML = "";
			let jsonReturned;
			let poundSign = "#";
			let restaurantName = restName.value;
			if (restaurantName.length == 0) {
				creationErr.innerHTML = "<p>Restaurant name must be supplied.</p>";
				return false;
			} 
			if (restaurantName.includes(poundSign)) {
				creationErr.innerHTML = "<p>Restaurant name can not contain a #.</p>";
				return false;
			}
			let restaurantStreet = restStreet.value;
			if (restaurantStreet.includes(poundSign)) {
				creationErr.innerHTML = "<p>Address can not contain a #.</p>";
				return false;
			}
			let restaurantCity = restCity.value;
			if (restaurantCity.includes(poundSign)) {
				creationErr.innerHTML = "<p>City name can not contain a #.</p>";
				return false;
			}
			let restaurantState = restState.value;
			let restaurantCountry = restCountry.value;
			if (restaurantCountry == "-1") restaurantCountry = "";
			let url = `<?php echo $secure_server;?>createRest.php?restName=` + restaurantName ;
			if (restaurantStreet.length > 0){url += `&restStreet=` + restaurantStreet ;}
			if (restaurantCity.length > 0) {url += `&restCity=` + restaurantCity ;}
			if (restaurantState.length > 0 ) {url += `&restState=` + restaurantState ;}
			if (restaurantCountry.length > 0) {url += `&restCountry=` + restaurantCountry ;}
			url += `&restOwner=` + userID ;
			let cleanURL = encodeURI(url);
			response = await fetch(cleanURL);
			try {
				jsonReturned = await response.json();
				let status = jsonReturned['status'];
				if (status.indexOf("Authentication") == 0) {
					// login mismatch
					pwErr.innerHTML = "<p>You must verify your identity before creating a restaurant.  Please login.</p>";
					setScreen(loginDiv);
				} else if (status.indexOf("Duplicate") == 0) {
					creationErr.innerHTML = "<p>" + restaurantName + " already exists.</p>";
				} else if (jsonReturned['status'] == "OK") {
					creationErr.innerHTML = "<p>" + restaurantName + " successfully created.</p>";
				} else {
					creationErr.innerHTML = status;
				}
			} catch(err) {
				creationErr.innerHTML = err;
			}
		}
		function prepCreateRest() {
			populateCountries("restCountry","restState");
			setScreen(createRestDiv);
		}
		async function prepViewRest(rest) {
			url = "<?php echo $secure_server;?>getRest.php?restID=" + rest;
			response = await fetch(url);
			jsonRest = await response.json();
			if (jsonRest['status'] !== "OK") {
				if ($jsonRest['status'] == "Notfound.") {
					viewErr.innerHTML = "<p>That restaurant could not be found.</p>"
						+ "<p>Please use the user menu to return to the restaurant list for another selection.</p>";
				}
				viewRestErr.innerHTML = "<p>" + jsonRest['status'] + "</p>";
				return false;
			}
			let htmlStr = `<h2 align="center" >` + jsonRest['restName'] + `</h2><br/><br/>`;
			htmlStr += `<p>` + jsonRest['restStreet'] + `</p>`
					+ `<p>` + jsonRest['restCity'] + `, ` + jsonRest['restState'] + `</p>`
					+ `<p>` + jsonRest['restCountry'] + `</p><br/><p>Average rating: `
					+ jsonRest['averageRating'] + `</p><p>Highest rating: `
					+ jsonRest['highestRating'] + `</p><p>Lowest rating: `
					+ jsonRest['lowestRating'] + `</p><br/><br/>` ;
			htmlStr += `<table width=600px ><tr><th width=10% align="center" >Date/Rating</th>`
					+ `<th width=10% align="center" >Author</th><th width=80% align="center" >`
					+ `Reviews/Replies</th></tr>`;
				jsonRest['review'].forEach(function(review) {
					htmlStr += `<tr><td width=10% ><p>` + review['visitDate'] + `</p><p>rating: `
							+ review['rating'] +`</p></td>`
							+ `<td width=10% >` + review['author'] + `</td>` 
							+ `<td width=80% ><p>Review: ` + review['comment'] + `</p><p>Reply: `
							+ review['reply'] + `</p></td></tr>`;
				});
		    htmlStr += `</table>`;
			existingDetails.innerHTML = htmlStr;
			setScreen(viewRestDiv);
		}
		function prepReply() {
			
		}
		function prepEditUser() {
			
		}
		function prepEditRest() {
			
		}
		function prepDeleteReview() {
			
		}
		function prepDeleteReply() {
			
		}
		// Initial screen by userType
		function initScreen(type) {
			let htmlString;
			switch (type) {
				case 'regular':
					setScreen(restListDiv);
					htmlString = `<tr>
				  <td class="menu-lower-cell" onmouseover='style.fontWeight="bold";' onmouseout='style.fontWeight="normal";'
						onclick="prepRestList()"> 
					List restaurants
				  </td>
			   </tr>`;
					menuTable.innerHTML = htmlString;
					break;
				case 'owner':
					setScreen(replyDiv);
					htmlString = `<tr>
						  <td class="menu-lower-cell" onmouseover='style.fontWeight="bold";' 
								onmouseout='style.fontWeight="normal";' onclick="prepCreateRest();">Create restaurant</td>
					   </tr>`;
					htmlString += `<tr>
						  <td class="menu-lower-cell" onmouseover='style.fontWeight="bold";' 
								onmouseout='style.fontWeight="normal";' onclick="prepReply();">Reply to reviews</td>
					   </tr>`;
					htmlString +=`<tr>
						  <td class="menu-lower-cell" onmouseover='style.fontWeight="bold";
								' onmouseout='style.fontWeight="normal";' onclick="prepRestList();">List restaurants</td>
					   </tr>`;
					menuTable.innerHTML = htmlString;
					break;
				case 'admin':
					setScreen(viewRestDiv);
					htmlString = `<tr>
						  <td class="menu-lower-cell" onmouseover='style.fontWeight="bold";' 
								onmouseout='style.fontWeight="normal";' onclick="prepEditUser()"> 
							Edit user
						  </td>
					   </tr>`;
					htmlString += `<tr>
						  <td class="menu-lower-cell" onmouseover='style.fontWeight="bold";' 
								onmouseout='style.fontWeight="normal";' onclick="prepEditRest();"> 
							Edit restaurant
						  </td>
					   </tr>`;
					menuTable.innerHTML = htmlString;
					break;
			}
		}
	</script>

	<script>
		var userType;
		var userID;
		if (typeof sessionStorage['userType'] !== undefined) {
			userID = sessionStorage.getItem('userID');
			userType = sessionStorage.getItem('userType');
			initScreen(userType);
		} else {
			setScreen(loginDiv);
		}
		
	</script>
	<script>
		async function login() {
			var errFound = false;
			var loginJSON;
			// Check email address
			let userEmail = userEmailFld.value;
			let ampersand = '@';
			let ampTest = userEmail.includes(ampersand);
			if (! (userEmail.length > 0)) {
				emailErr.innerHTML = 'You must supply an e-mail address to use this site.';
				errFound = true;
			} else if (!(ampTest)) {
				emailErr.innerHTML = 'Invalid email address.';
				errFound = true;
			} else {
				emailErr.innerHTML = "";
			}
			// Capture password 
			let userPW = userPwFld.value;
			if (userPW.length < 6) {
				pwErr.innerHTML = 'You must supply a password of six or more characters.';
				errFound = true;
			} else {
				pwErr.innerHTML = "";																		 
			}																						 
			if (! errFound) {
				// Ask the server for a login / creation
				// let data = {'user': userEmail, 'pw': userPW}	;
				/*let options = { method: 'POST',
								mode: 'cors',
								credentials: 'same-origin',
								headers: {'Content-Type': 'application/json'},
								body: {'user': userEmail, 'pw': userPW}																			
								} */
				// let url = "<?php echo $secure_server, 'establishUser.php'; ?>";
				let url = "<?php echo $secure_server ; ?>" 
							+ "establishUser.php?user=" + userEmail 
							+ "&pw=" + userPW ;
				// let loginResponse = await fetch(url, options) ;
				let cleanURL = encodeURI(url);
				let loginResponse = await fetch(cleanURL);
				if (loginResponse.ok) {
					try {
						loginJSON = await loginResponse.json();
						if (loginJSON['status'] !== 'OK') {
							pwErr.innerHTML = loginJSON['status'];
						}
					} catch(err) {
						errFound = true;
						pwErr.innerHTML = "<p>" + err + "</p>";
					}
				} else {
					errFound = true;
					let errStr = "<p>Communications issue. Please try later.</p><p>" 
						+ loginResponse.statusText + "</p>";
					pwErr.innerHTML = errStr;
				}
			}
			if (! errFound && loginJSON['userType'] !== undefined ) {
				sessionStorage.setItem('userID', loginJSON['userID']);
				sessionStorage.setItem('userType', loginJSON['userType']);
				initScreen(loginJSON['userType']);
			}
			return false;
		}

	</script>
</body>
</html>
