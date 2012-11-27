<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
	FB.init({
		appId      : '<?= $appId ?>', // App ID
		channelURL : '../../Vendor/channel.php', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		oauth      : true, // enable OAuth 2.0
		xfbml      : true  // parse XFBML
	});
	
	
	// Checks whether the user is logged in
	FB.getLoginStatus(function(response) {
		if (response.authResponse) {
			// logged in and connected user, someone you know
			// alert('You are connected');
		} else {
			// no user session available, someone you dont know
			// alert('You are disconnected');
		}
	});
		   
	FB.Event.subscribe('auth.authResponseChange', function(response) {
		if (response.authResponse) {
			// the user has just logged in
			// alert('You just logged in facebook from somewhere');
		} else {
			// the user has just logged out
			// alert('You just logged out from faceboook');
		}
	});
	
	// Other javascript code goes here!

};

// logs the user in the application and facebook
function login(redirection){
	FB.login(function (response) {
		if(response.authResponse) {
			// user is logged in
			// console.log('Welcome!');
			if(redirection != null && redirection != ''){
				top.location.href = redirection;
			}
		} else {
			// user could not log in
			console.log('User cancelled login or did not fully authorize.');
		}
	}, {scope: '<?= $options['perms'] ?>'});
}

// logs the user out of the application and facebook
function logout(redirection){
	FB.logout(function(response) {
		// user is logged out
		// redirection if any
		if(redirection != null && redirection != ''){
			top.location.href = redirection;
		}
	});
}

// Load the SDK Asynchronously
(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol + '//connect.facebook.net/<?= $locale ?>/all.js';
document.getElementById('fb-root').appendChild(e);
}());
</script>
