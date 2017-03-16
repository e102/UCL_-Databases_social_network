<!DOCTYPE html>
<html>
<head>
    <title>My Social Network</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css">
</head>
<body>

<div id="content">

    <div id="form2">
      <h2>Sign Up Here</h2>
      <div>
         <iframe src="//giphy.com/embed/3oz8xSjBmD1ZyELqW4" width="240" height="180" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p></p>
       </div>
        <form action="" method="post">

                  <div class="field"> <label class="label">Name</label> <p
                  class="control"> <input class="input" type="text" name="u_name" placeholder="Enter your name" required="required"> </p> </div>

                  <div class="field"> <label class="label">Password</label><p class="control has-icon"> <input
                  class="input" name="u_pass" placeholder="Enter your password"
                  required="required"> <span class="icon is-small"> <i class="fa
                  fa-lock"></i> </span> </p> </div>

                  <div class="field"> <label class="label">Email</label>
                  <p class="control has-icon"> <input class="input" type="email" name="u_email" placeholder="Enter your email address"
                         required="required"> <span class="icon is-small"> <i class="fa
                  fa-envelope"></i> </span> </p> </div>

                  <div class="field">
                    <label class="label">Select a country</label>
                    <p class="control">
                      <span class="select">
                        <select name="u_country" id="country_dropdown_box" style="width: auto;">
                          <option>Select country</option>
                          <?php
                          $countries = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Cape Verde", "Cayman Islands", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cruise Ship", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyz Republic", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Satellite", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "South Africa", "South Korea", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "St. Lucia", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe");

                          foreach ($countries as $country) {
                              echo('<option value="' . $country . '">' . $country . '</option>');
                          }
                          ?>
                        </select>
                      </span>
                    </p>
                  </div>

                  <div class="field">
                    <label class="label">Gender</label>
                    <p class="control">
                      <span class="select">
                        <select name="u_gender" style="width: auto;">
                          <option>Select gender</option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Other</option>
                        </select>
                      </span>
                    </p>
                    </div>

                    <div class="field">
                      <label class="label">Date of birth</label>
                      <p class="control">
                        <span class="select">
                          <input type="date" name="u_birthday"/>
                          </select>
                        </span>
                      </p>
                      </div>
        </form>
        <?php
        include("functions/user_insert.php");
        ?>
    </div>
</div>
