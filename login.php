<?php
    include "components/home_header.php";
?>

<br><br><br><br>
<form method="POST" action="../operation/ceklogin.php">
			<div class="container" style="color:black" id="logincont">
				<table align="center" border="0px" style="margin:0px auto;";>
					<tr>
						<td width="140px" id="deftext">Username</p></td>
						<td><input type="text" required name="username"></td>
					</tr>
					<tr>
						<td width="140px" id="deftext">Password</td>
						<td> <input type="password" required name="password"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><br><br><button type="submit" name="submit" id="black" class="yellowbutton">Login</button></td>
					</tr>
					<tr>
						<td colspan="2" align="center" id="deftext"><br><input type="checkbox" name="remember" id="remember"><label for = "remember">Remember me</label></td>
					</tr>
				</table>
			</div>
		</form>
    