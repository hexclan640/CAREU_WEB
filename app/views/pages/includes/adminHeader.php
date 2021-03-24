	<nav id="navbar">
		<a href="home"><img src="../img/appLogo.png" class="careulogo" id="careulogo"></a>
		<div class="title" id="title">
			<h1 id="service">ADMIN PANEL</h1>
		</div>
  		<div id="navbar-right">
		  	<div class="datetime">
				<div class="date">
					<span id="dayname">Day</span>,
					<span id="month">Month</span>
					<span id="daynum">00</span>,
					<span id="year">Year</span>
				</div>
				<div class="timepart">
					<span id="hour">00</span>:
					<span id="minutes">00</span>:
					<span id="seconds">00</span>
					<span id="period">AM</span>
				</div>
    		</div>
    		<a href="usermanagement">
  				<span><img src="../img/header/users.png" alt=""></span>
  				<span class="badge" id="badge1">|</span>
			</a>
		</div>
	</nav>
	<div id="notification" class="notification">
		<div class="modal-content">
   			<div class="modal-header">
      			<span onclick="closenotification()" class="close">&times;</span>
      			<h2>New Request</h2>
    		</div>
    		<a href="usermanagement"><div class="modal-body">
				<p><span id="badge2">|</span> new requests</p>
    		</div></a>
  		</div>
	</div>