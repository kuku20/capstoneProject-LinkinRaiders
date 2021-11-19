<br>
 	<h4 >Report account id= can delete it</h4>

<!--  	<form  method="" enctype="multipart/form-data">
	 	
	 	<input class="text" type="type" id="userrole" name="usernamerole" placeholder="Username" >
	 	<button  type="submit" onclick="updaterole()">APPLY</button>
	</form>
<a class="text" href="../components/adminjob/assignrole.php">cl</a> -->
<br>
<h4 >Assign role to user: </h4>

	<input class="text" type="type" id="userrole" name="usernamerole" placeholder="Username" >
      <button onclick='functionConfirm("Which role would you assign?", function moderator() {
        var userrole = document.getElementById("userrole").value;
        $.ajax({
            type: "POST",
            url: "../components/adminjob/assignrole.php",
            data: {
                userrole: userrole,
                role : "moderator",
            }
        });
          alert(userrole + " has been asigned to be a moderator.");
      }, function user() {
        var userrole = document.getElementById("userrole").value;
        $.ajax({
            type: "POST",
            url: "../components/adminjob/assignrole.php",
            data: {
                userrole: userrole,
                role : "user",
            }
        });
          alert(userrole+"has been asigned to be a user.");
      }
      );'class="text">Apply</button>
      	<div id="confirm">
         <div class="message"></div>
         <button class="moderator">moderator</button>
         <button class="user">user</button>
         <button class="cancel">Cancel</button>
      </div>

 </div>
