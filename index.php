<!DOCTYPE html>
<html>
<head>
	<title>Chatty Boy</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div class = "container">
		<div id = "head_wrap">
			<div id = "header">
				<img src="images/logo.jpg" style="float:left;" width="120px" />
				<form method="POST" action="" id="login1">
					<strong>Email :</strong><input type="text" name="email" placeholder="Email" />
					<strong>Password :</strong><input type="password" name="password" placeholder="password" />
					<button name="Login">Login</button>
				</form>
			</div>
		</div>

        <div id="content">
            <div>
                <img src="images/banner.jpg" style="float: left; width: 450px">
            </div>
            <div>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td Align="right">Name:</td>
                            <td><input  type="text" name="User_name" placeholder="Enter Your Name"></td>
                        </tr>
                        <tr>
                            <td Align="right">Password:</td>
                            <td><input  type="password" name="User_pswd" placeholder="Enter Password"></td>
                        </tr>
                        <tr>
                            <td Align="right">Email-id:</td>
                            <td><input  type="text" name="User_mail" placeholder="Enter Your Mail-id"></td>
                        </tr>
                        <tr>
                            <td Align="right">Country:</td>
                            <td>
                                <select name="User_country">
                                    <option>Select a Country</option>
                                    <option>India</option>
                                    <option>China</option>
                                    <option>Japan</option>
                                    <option>Dubai</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td Align="right">Gender:</td>
                            <td>
                                <select name="User_gender">
                                    <option>Select a Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Trans-Gender</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td Align="right">DOB:</td>
                            <td>
                                <input type="date" name="User_birth"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <button name="sign_up">Sign Up</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

	</div>
</body>
</html>