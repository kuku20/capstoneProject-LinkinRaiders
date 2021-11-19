
function functionConfirm(msg, mymoderator, myUser, cancel) {
   var confirmBox = $("#confirm");
   confirmBox.find(".message").text(msg);
   confirmBox.find(".moderator,.user,.cancel").unbind().click(function() {
      confirmBox.hide();
   });
   confirmBox.find(".moderator").click(mymoderator);
   confirmBox.find(".user").click(myUser);
   confirmBox.find(".no").click(cancel);
   confirmBox.show();
}

function updaterole() {
  var userrole = document.getElementById("userrole").value;
  if (confirm("DO YOU WANT TO PROMOTE THIS USER ACCOUNT?")) {
  	$.ajax({
            type: "POST",
            url: "../components/adminjob/assignrole.php",
            data: {
                userrole: userrole,
            }
        });
  	// location.replace("../components/adminjob/assignrole.php");
	}else{alert("YOUR CANCEL IT!!!");}
  
}
function getIdEvent(a) {
  var idevent = "";
  var decision = "";
	idevent = a.getAttribute("value");
  decision = a.getAttribute("class");
	// location.replace("../components/adminjob/eventsbyadmin.php");
	// alert(idevent)
	console.log(idevent)
  console.log(decision)
	$.ajax({
            type: "POST",
            url: "../components/adminjob/eventbyadmin.php",
            data: {
                idevent: idevent,
                decision: decision,
            }
        });
    location.reload();
}

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
