<h1>Login</h1>
<form action="<?php echo config::URL  ?>login/authenticate"  method="post"> 
    <table>
        <tr><td><label>Login</labal></td><td><input type="text" name="login"><br></td></tr>
        <tr><td><label>Password</labal></td><td><input type="password" name="password"></td></tr>
        <tr><td><input type="submit" value="Login"></td><td></td></tr>
    </table>
</form>