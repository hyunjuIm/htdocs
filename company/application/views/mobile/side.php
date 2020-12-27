<style>
	.demo-container {
		width: 100%;
		display: block;
		margin: 0 auto;
		position: relative;
		overflow: hidden;
	}

	/***** Base header & nav styles *****/
	.header {
		position: relative;
		padding-bottom: 0;
		width: 100%;
		background-color: #fff;
		z-index: 4;
	}

	.header__container {
		box-shadow: 0 0 10px #d7d7d7;
		margin: 0 auto;
	}

	.header ul {
		margin: 0;
		padding: 0;
	}

	.header ul li {
		list-style: none;
		margin-bottom: 0;
	}

	.header ul li a:hover {
		color: black;
	}

	nav.secondary {
		width: 100%;
		border-bottom: 1px solid #e9ecef;
	}

	nav.primary {
		background-color: #fff;
		box-shadow: 0 0 10px #d7d7d7;
		position: relative;
		border-bottom: 1px solid #e9ecef;
	}

	nav.primary ul {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		align-items: center;
		box-sizing: border-box;
	}

	nav.primary ul li {
		flex: 1;
	}

	nav.primary ul li.logo {
		flex: 3;
		text-align: left;
	}

	nav.primary ul li.logo a {
		height: 60px;
		display: block;
	}

	/***** Mobile nav toggle container *****/
	li.mobile-nav {
	}

	/***** hamburger menu *****/
	#nav-toggle {
		position: absolute;
		width: 32px;
		right: 0;
		background: transparent;
		border: none;
		display: block;
		z-index: 1000;
		line-height: 1;
		padding: 0;
		cursor: pointer;
	}

	#nav-toggle:hover,
	#nav-toggle:focus {
		color: black;
		outline: none;
	}

	#nav-toggle .menu {
		position: absolute;
		display: block;
		width: 20px;
		height: 2px;
		background: black;
		overflow: visible;
		transition: background-color 0.3s ease-out;
		transition-delay: 0.1s;
	}

	#nav-toggle .menu:before,
	#nav-toggle .menu:after {
		content: "";
		position: absolute;
		left: 0;
		width: 20px;
		height: 2px;
		background: black;
		transition: transform 0.2s;
	}

	#nav-toggle .menu:before {
		top: -8px;
	}

	#nav-toggle .menu:after {
		top: 8px;
	}

	#nav-toggle.open .menu {
		background-color: transparent;
		transition: background-color 0s;
		transition-delay: 0s;
	}

	#nav-toggle.open .menu:before,
	#nav-toggle.open .menu:after {
		transition: transform 0.3s;
	}

	#nav-toggle.open .menu:before {
		top: 0;
		box-shadow: none;
		transform: rotate(45deg);
	}

	#nav-toggle.open .menu:after {
		transform: rotate(-45deg);
		top: 0;
	}

	/***** Mobile nav menu styles *****/
	nav.mobile {
		display: block;
		position: fixed;
		top: 60px;
		width: 100%;
		background-color: #fff;
		z-index: 3;
		box-shadow: 0 0 10px #d7d7d7;
		transform: translate(0, -360px);
		transition: all 0.3s ease-out;
		padding-bottom: 1rem;
		opacity: 0;
	}

	nav.mobile--open {
		transform: translate(0, 0);
		opacity: 1;
	}

	nav.mobile ul {
		list-style-type: none;
		padding: 0;
		margin: 0;
	}

	nav.mobile li.link {
		font-weight: 400;
	}

	nav.mobile li.link a {
		color: #294661;
		display: block;
		text-decoration: none;
	}

</style>

<div class="demo-container">

	<!-- nav -->
	<header class="header">
		<nav class="primary">
			<div class="header__container">
				<ul>
					<li class="logo">
						<a href="https://sendgrid.com"></a>
					</li>
					<li class="mobile-nav">
						<button id="nav-toggle">
							<span class="menu"></span>
						</button>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- /nav -->
	<!-- mobile nav menu -->
	<nav class="mobile">
		<ul>
			<li class="link">
				<a href="#">Docs Home</a>
			</li>

			<li class="link">
				<a href="#">Glossary</a>
			</li>

			<li class="link link--selected">
				<a href="#">Support</a>
			</li>

			<li class="link">
				<a href="#">Status</a>
			</li>
			<li class="link">
				<a href="#">Log In</a>
			</li>
			<li class="link">
				<a href="#">Sign Up</a>
			</li>
		</ul>
	</nav>
	<!-- /mobile nav menu -->

</div>

<script>
	$(document).ready(function(){
		$('#nav-toggle').click(function(){
			if($(this).hasClass('open')){
				$(this).removeClass('open');
				$('nav.mobile').removeClass('mobile--open');
			}else{
				$(this).addClass('open');
				$('nav.mobile').addClass('mobile--open');
			}
		});
	});
</script>
