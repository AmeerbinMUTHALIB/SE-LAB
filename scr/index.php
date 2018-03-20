<!DOCTYPE html>
<html>
<head>
<meta name="google-signin-client_id" content="546058867792-7tqonu5kbtni0ird2s2bgi65mld9vqt0.apps.googleusercontent.com">
<meta name="google-signin-hosted_domain" content="nitc.ac.in" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
var i =0;
function onSignIn(googleUser) {

  var profile = googleUser.getBasicProfile();
  document.getElementById("emailval").value=profile.getEmail();
  document.getElementById("nameval").value=profile.getName();
  document.getElementById("signinform").submit();
  // $("#emailval").attr('value',profile.getEmail());
  // $("#nameval").attr('value',profile.getName());
	// console.log("22");
i=1;

}

function signOut() {

	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function () {
		console.log('User signed out.');

	});

}
function signIN(){
	if(i==1)
	document.getElementById("signinform").submit();
}
</script>
<body>
	<form action="index.php" id="signinform" method="post" style="display:none">
		<input name="user_email" id="emailval" style="display:none" required/>
		<input name="user_name" id="nameval" style="display:none" required/>
	</form>
	<div class="g-signin2" data-onsuccess="onSignIn" onclick="signIN();"></div>
	</body>
</html>

