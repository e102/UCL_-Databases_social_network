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
                            <select name="u_country"/>
                            <?php
                            $countries = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe");
                            foreach ($countries as $country) {
                                if ($country == $user_country) {
                                    echo('<option selected = "selected" value="' . $country . '">' . $country . '</option>');
                                }
                                else {
                                    echo('<option value="' . $country . '">' . $country . '</option>');
                                }
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            Gender:
                        </td>
                        <td>
                            <select name="u_gender"/>
                            <?php
                            if ($user_gender == 'Male') {
                                echo "<option value='Male' selected='selected'>Male</option>";
                                echo "<option value='Female'>Female</option>";
                            }
                            if ($user_gender == 'Female') {
                                echo "<option value='Male'>Male</option>";
                                echo "<option value='Female' selected='selected'>Female</option>";
                            }
                            ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Photo:
                        </td>
                        <td>
                            <input type="file" name="u_image"/>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            Privacy:
                        </td>
                        <td>
                            <select name="profile_is_private" required="required">
                                <!--Goes into is_private field in database. 1 = true. 0 = false-->
                                <option value="1">Private</option>
                                <option value="0">Public</option>
                            </select><br><br>
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