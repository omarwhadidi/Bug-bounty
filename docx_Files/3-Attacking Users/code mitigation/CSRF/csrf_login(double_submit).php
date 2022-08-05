<!-- The following snippet of code shows what is probably the easiest of the recommended methods, Double submit cookies.
The code will generate a random token and set it both as a cookie and as a hidden-value in the form. When the form is submitted, the code will check if the CSRFToken in the form is the same as the CSRFToken in the cookie and the user will be logged in only if they are the same.

This works as a protection because the attacker can’t know the value of the cookie CSRFToken and therefore can’t send that value in the form. This method is also valid for other kinds of CSRF vulnerabilities, not just login CSRF.
https://support.detectify.com/support/solutions/articles/48001048951-login-csrf
 -->

 <?php
    if (isset($_POST["user"], $_POST["pass"])){
      
        if (isset($_POST["CSRFtoken"], $_COOKIE["CSRFtoken"])){
            if ($_POST["CSRFtoken"] == $_COOKIE["CSRFtoken"]){
                // code for checking the user and password
            }
        }
    } 
    else {
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        setcookie("CSRFtoken", $token, time() + 60 * 60 * 24);
        echo '
            <form method="post">
                <input name="user">
                <input name="pass" type="password">
                <input name="CSRFtoken" type="hidden" value="' . $token . '">
                <input type="submit">
            </form>
        ';
    }
?>
