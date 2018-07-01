<h1 class="loginHeading">Login</h1>
<form class="loginForm"action="<?php echo config::URL  ?>login/authenticate"  method="post"> 
        <label>Login: </label><input type="text" name="login"><br>
        <label>Password: </label><input type="password" name="password">
        <input type="submit" value="Login">
</form>