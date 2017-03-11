<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");
include("template/Main/header.php");

if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
}
else {

    ?>
    <!-- Content area starts -->
    <div class="content">
        <!-- user timeline starts -->
        <div id="user_timeline">
            <div id="user_timeline">
                <?php include("template/Main/user_details.php"); ?>
            </div>
        </div>
        <!-- user timeline ends -->
        <!-- content timeline starts -->
        <div id="content_timeline">
            <form action="" method="post" id="f" enctype="multipart/form-data">

                <table width="600">
                    <tr>
                        <td colspan="6">
                            <h2>Edit your profile:</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Name:
                        </td>
                        <td>
                            <input type="text" name="u_name" required="required" value="<?php echo $user_name; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Password:
                        </td>
                        <td>
                            <input type="password" name="u_pass" required="required" value="<?php echo $user_pass; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Email:
                        </td>
                        <td>
                            <input type="email" name="u_email" required="required" value="<?php echo $user_email; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Country:
                        </td>
                        <td>
                            <select name="u_country" disabled="disabled"/>
                            <option><?php echo $user_country; ?></option>
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
                            <select name="u_gender" disabled="disabled"/>
                            <option><?php echo $user_gender; ?></option>
                            <option>Male</option>
                            <option>Female</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Photo:
                        </td>
                        <td>
                            <input type="file" name="u_image" required="required"/>
                        </td>
                    </tr>

                    <tr>
                        <td align="right" colspan="6">
                            <input type="submit" name="update" value="Update account"/>
                        </td>

                    </tr>
                </table>
            </form>
            <?php
            include("functions/user_update.php");
            ?>
        </div>
        <!-- content timeline ends -->
    </div>
    <!-- content area ends -->
    </div>
    <!-- container ends -->

    </body>
    </html>
<?php } ?>