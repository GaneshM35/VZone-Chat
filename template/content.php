<?php
/**
 * Created by IntelliJ IDEA.
 * User: ganesh
 * Date: 22-10-2017
 * Time: 17:42
 */
?>

<div id="content">
    <div>
        <img src="images/banner.jpg" style="float: left;padding-top:  20px; margin-left: -40px; width: 500px" />
    </div>
    <div id="form2">
        <form action="" method="post">
            <h2>Sign Up Here!!!</h2>
            <table>
                <tr>
                    <td Align="right">Name:</td>
                    <td><input  type="text" name="User_name" placeholder="Enter Your Name" required="required"/></td>
                </tr>
                <tr>
                    <td Align="right">Password:</td>
                    <td><input  type="password" name="User_pswd" placeholder="Enter Password" required="required"/></td>
                </tr>
                <tr>
                    <td Align="right">Email-id:</td>
                    <td><input  type="email" name="User_mail" placeholder="Enter Your Mail-id" required="required"/></td>
                </tr>
                <tr>
                    <td Align="right">Country:</td>
                    <td>
                        <select name="User_country" required="required">
                            <option>Select a Country</option>
                            <option value="india">India</option>
                            <option value="china">China</option>
                            <option value="japan">Japan</option>
                            <option value="dubai">Dubai</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td Align="right">Gender:</td>
                    <td>
                        <select name="User_gender" required="required">
                            <option>Select a Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="transgender">Trans-Gender</option>
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
                    <td colspan="6">
                        <button name="sign_up">Sign Up</button>
                    </td>
                </tr>
            </table>
            <div id="errMail"></div>
        </form>
        <?php include("user_add.php"); ?>
    </div>
</div>
