<div id="content">
    <div>
        <img src="image/image.png" style="float:left;margin-left: -80px"/>
    </div>
    <div id="form2">
        <form action="" method="post">
            <h2>Sign Up Here</h2>
            <table>
                <tr>
                    <td align="right">
                        Name:
                    </td>
                    <td>
                        <input type="text" name="u_name" placeholder="Enter your name" required="required"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Password:
                    </td>
                    <td>
                        <input type="password" name="u_pass" placeholder="Enter your password" required="required"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Email:
                    </td>
                    <td>
                        <input type="email" name="u_email" placeholder="Enter your email address"
                               required="required"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Country:
                    </td>
                    <td>
                        <select name="u_country"/>
                        <option>Select a country</option>
                        <option>England</option>
                        <option>France</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Gender:
                    </td>
                    <td>
                        <select name="u_gender"/>
                        <option>Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Date of Birth:
                    </td>
                    <td>
                        <input type="date" name="u_birthday"/>
                    </td>
                </tr>
                <tr>
                    <td align="right" colspan="6">
                        <button name="sign_up">Sign up</button>
                    </td>

                </tr>
            </table>
        </form>
        <?php
            include ("functions/user_insert.php");
        ?>
    </div>
</div>