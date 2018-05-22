<form class="form-horizontal" id="login-form" method="post" action="login.php">
	<input type="hidden" name="id" value="id" />
	<input type="hidden" name="token" value="token" />

	<div class="text-center">
        <div class="row content">
         
          <div class="col-sm-12" style="margin-top:40px;">
			
					<h2 class="text-center">Notification Prototype</h2>
					<p>Login and send message to other users</p>
					<button type="button" class="btn btn-info btn-lg" id="myBtn"><span class="glyphicon glyphicon-user"></span> Login</button>




		 <a href="register.php" class="btn btn-info btn-lg" id="register"><span class="glyphicon glyphicon-book"></span> Register</a>
			
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
        <!-- Trigger the modal with a button -->
        
      
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="padding:35px 50px;">
                <button type="button" style= "color: black;" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
              </div>
              <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                  <div class="form-group">
                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>  Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" value="" checked>Stay online?</label>
                  </div>
                    <button type="button" onclick="checkForm();" class="btn btn-info btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="" class="btn btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <p>Still not a member?<a href="register.php"><font color="">Register.</font></a></p>
              </div>
            </div>
            
          </div>
        </div> 
        </div>
   
	   </div>
	</div>
</form>

<script>
	//$("#blBody").load("leaderboard.php #bsLoadable");
	function checkForm(){
		var username= document.getElementById("username").value;
		var password = document.getElementById("password").value;
		db.query(function(doc, emit) {
			if (doc.type === "user") {
				if(doc.username === username && doc.password== password){
					emit(doc);
				}
			}
		    }).then(function (result) {
			console.log(result);
			if(result.rows.length == 0){
				alert("Invalid username or password");
			} else{
				$('input[name="id"]').val(result.rows[0].id);
				$('input[name="token"]').val(token);

				document.getElementById("login-form").submit();
			}
		    }).catch(function (err) {
			console.log(err);
		    });
	}
	
	 $("#myBtn").click(function(){
        $("#myModal").modal();
    });
	 
	
</script>