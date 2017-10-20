# rankwatch17_php_userlogin

A form page with Full Name (input), Email Address (input), Password, Mobile Number (input), Age (input), Gender (dropdown), Address (textarea), Country list (dropdown), State list (List Based on country selection using AJAX), Used Bootstrap to design the page, Used jQuery validator plugin to validate the forms. Storing these credentials and performing login authentication based on the email and password provided. Created a page which can only be accessed after login and displays all the information stored of the user.

### Requirement
* MySQL server
* Bootstrap - CDN
* jQuery - CDN
* Tether - CDN (Required by Bootstrap)
* jQuery Validator plugin 
* Font Awesome icon - CDN

### Method
`Index` page provides Login/SignUp to the user, since bootstrap is used, a tabbed control is provided where both Login and SignUp form are. 

#### Login 
takes email and password from a user, sends it, its checked with the database and if match user is redirected to info.php page. Note that passwrod in database is hashed, so user password is verfified with the hashed password in database

#### SignUp 
takes all the details from the user, sends it to the server where it is inserted into the database. Options for State select dropdown is populated by JS which is brought through AJAX from the database at backend, Have used jQuery post function for AJAX.

#### Info
Upon successfull login, user is redirected to `info.php` page, where all his information is displayed which is brought from the server by supplying the user id which was stored in a `SESSION` Var upon login.

#### Database
MySQL database is used to store data, Database `userlogin` contains 3 tables `tbl_users` which contains user details, `tbl_countries` which contains all the countries in the world, and `tbl_states` which contains all the states of each country with a country_id to relate every state to its country.
> Data for `tbl_country` and `tbl_state` database tables is brought from the internet

#### Validation
Used [jQuery validator plugin](https://github.com/jquery-validation/jquery-validation) to validate the Login/SignUp forms,
The plugin comes bundled with a useful set of validation methods, including URL and email validation, while providing an API to write our own methods. All bundled methods come with default error messages. Have used Bootstrap validation styles along with the jQuery Validator, makes validation styles attractive and colorful.

![Validation](https://github.com/ErFaanHussain/rankwatch17_php_userlogin/blob/master/validation.png)

#### Styling
Have used Bootstrap v4-alpha 6 CSS framework for styling the pages, used its various components and layout styles 

#### Icons 
Used font awesome icons for buttons to make it more assistive and attractive


![](https://github.com/ErFaanHussain/rankwatch17_php_userlogin/blob/master/signup.png)
`SIGNUP` Tab secreenshot


![](https://github.com/ErFaanHussain/rankwatch17_php_userlogin/blob/master/info.png)
`INFO` page screenshot


