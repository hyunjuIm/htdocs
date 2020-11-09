<style>
	/* BASIC */
	body {
		font-family: "Poppins", sans-serif;
		height: 100vh;
	}

	a {
		color: #5645ED;
		display: inline-block;
		text-decoration: none;
		font-weight: 400;
	}

	h2 {
		text-align: center;
		font-size: 16px;
		font-weight: 600;
		text-transform: uppercase;
		display: inline-block;
		margin: 40px 8px 10px 8px;
		color: #cccccc;
	}

	/* STRUCTURE */
	.wrapper {
		display: flex;
		align-items: center;
		flex-direction: column;
		justify-content: center;
		width: 100%;
		min-height: 100%;
	}

	#formContent {
		-webkit-border-radius: 10px 10px 10px 10px;
		border-radius: 10px 10px 10px 10px;
		background: #fff;
		padding: 30px;
		width: 90%;
		max-width: 450px;
		position: relative;
		padding: 0px;
		-webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
		box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
		text-align: center;
		vertical-align: middle;
	}

	/* FORM TYPOGRAPHY*/
	input[type=button], input[type=submit], input[type=reset] {
		background-color: #5645ED;
		border: none;
		color: white;
		padding: 15px 80px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		text-transform: uppercase;
		font-size: 13px;
		-webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
		box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
		-webkit-border-radius: 5px 5px 5px 5px;
		border-radius: 5px 5px 5px 5px;
		margin: 5px 20px 40px 20px;
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-ms-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}

	input[type=text], input[type=password] {
		background-color: #f6f6f6;
		border: none;
		color: #0d0d0d;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 5px;
		width: 85%;
		border: 2px solid #f6f6f6;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;
		-webkit-border-radius: 5px 5px 5px 5px;
		border-radius: 5px 5px 5px 5px;
	}

	input[type=text]:focus, input[type=password]:focus {
		background-color: #fff;
		border-bottom: 2px solid #5645ED;
	}

	/* ANIMATIONS */
	/* Simple CSS3 Fade-in-down Animation */
	.fadeInDown {
		-webkit-animation-name: fadeInDown;
		animation-name: fadeInDown;
		-webkit-animation-duration: 1s;
		animation-duration: 1s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}

	@-webkit-keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0);
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	}

	@keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0);
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	}

	/* Simple CSS3 Fade-in Animation */
	@-webkit-keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	@-moz-keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	.fadeIn {
		opacity: 0;
		-webkit-animation: fadeIn ease-in 1;
		-moz-animation: fadeIn ease-in 1;
		animation: fadeIn ease-in 1;

		-webkit-animation-fill-mode: forwards;
		-moz-animation-fill-mode: forwards;
		animation-fill-mode: forwards;

		-webkit-animation-duration: 1s;
		-moz-animation-duration: 1s;
		animation-duration: 1s;
	}

	.fadeIn.second {
		-webkit-animation-delay: 0.6s;
		-moz-animation-delay: 0.6s;
		animation-delay: 0.6s;
	}

	.fadeIn.third {
		-webkit-animation-delay: 0.8s;
		-moz-animation-delay: 0.8s;
		animation-delay: 0.8s;
	}

	.fadeIn.fourth {
		-webkit-animation-delay: 1s;
		-moz-animation-delay: 1s;
		animation-delay: 1s;
	}

	/* OTHERS */
	*:focus {
		outline: none;
	}
</style>

<div class="container" style="height: 100%">
	<div class="row" style="height:inherit">
		<div class="col-sm wrapper fadeInDown">
			<form id="formContent" style="padding: 40px">
				<p style="text-align: center; color: #3529b1; font-size: 400%; font-weight: bold">DUAL</p>
				<input type="text" id="login" class="fadeIn second" name="login" placeholder="ID"
					   style="margin-bottom: 10px; text-align: left" onkeyup="enterKey();"
					   onkeydown="onlyAlphabet(this)">
				<input type="password" id="password" class="fadeIn third" name="login" placeholder="PASSWORD"
					   style="margin-bottom: 30px; text-align: left" onkeyup="enterKey();">
				<div class="fadeIn fourth btn-light-purple-square"
					 style="font-size: 20px;font-weight: bold;width: 90%; border-radius: 30px; padding: 12px 20px;"
					 value="Log In" onclick="masterLogin()">LOGIN
				</div>
			</form>
		</div>
	</div>
</div>

