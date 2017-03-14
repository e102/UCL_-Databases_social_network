<div id="content">
    
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
                        <select name="u_country" id="country_dropdown_box"/>
                        <option>Select a country</option>
                        <?php
                        $countries = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe");

                        foreach ($countries as $country) {
                            echo('<option value="' . $country . '">' . $country . '</option>');
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
                        <option>Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
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
                        <button name="sign_up" class="btn-white btn-small">Sign up</button>
                    </td>   

                </tr>
            </table>
        </form>
        <?php
        include("functions/user_insert.php");
        ?>
    </div>
</div>