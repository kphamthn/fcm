<form id="userForm" method="post" action="register.php">
<div class="modal-dialog">
          	<input type="hidden" name="token" value="token" />

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="padding:35px 50px;">
                <h4><span class="glyphicon glyphicon-lock"></span> Registrieren</h4>
              </div>
              <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                  <div class="form-group">
                    <label for="usrnameInput"><span class="glyphicon glyphicon-user"></span> Username</label>
                    <input type="text" class="form-control" id="usernameInput" name="usernameInput" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="passwordInput"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                    <input type="password" onkeyup="checkIfPasswordMatch();" class="form-control" id = "passwordInput" name = "passwordInput" required placeholder="Enter password">
                  </div>
				  <div class="form-group">
                    <label for="confirmationInput"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
                    <input type="password" onkeyup="checkIfPasswordMatch();" class="form-control" id="confirmationInput" required placeholder="Confirm password">
					<p style="color:red; display:none;" id="confirmation_alert"></p>
				  </div>
                    <button class="btn btn-info btn-block" id="registerSubmit" onclick="submitForm();"><span class="glyphicon glyphicon-off"></span>Register</button>
                </form>
              </div>
              <div class="modal-footer">
                <p>Already a member? <a href="login.php"><font color="">Login</font></a></p>
              </div>
            </div>
            
          </div>
</form>
<script>

	
function checkIfPasswordMatch(){
	var password = document.getElementById("passwordInput").value;
	var confirmation_password = document.getElementById("confirmationInput").value;
	if(confirmation_password!=password && confirmation_password!=''){
		document.getElementById("confirmation_alert").innerHTML = "Passwords do not match";
		document.getElementById("confirmation_alert").style.display="inline-block";
		document.getElementById("registerSubmit").disabled = true;
	}else{
		document.getElementById("confirmation_alert").innerHTML = "";
		document.getElementById("confirmation_alert").style.display="none";
		document.getElementById("registerSubmit").disabled = false;
	}
}
function submitForm(){
	$('input[name="token"]').val(token);
	var _username = document.getElementById("usernameInput").value;
	var _password = document.getElementById("passwordInput").value;
	var confirmation_password = document.getElementById("confirmationInput").value;
	if(_username == '' || _password == ''){
		alert("Please enter all fields");
		return;
	}
	var tokens = [];
	tokens.push(token);
	var user ={
		type: "user",
		username: _username,
		password:_password,
		tokens: tokens
	};
	console.log(user);
		

	db.post(user).then(function(response){
		console.log(response);
		
		document.getElementById("userForm").submit();
		}).catch(function (err) {
		console.log(err);
	    });
}
</script>