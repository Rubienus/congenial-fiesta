
<div id="form-container">
<div id="form-block">
<h3>view/edit user</h3>
<form method="POST" action="user/process.php">
    <div id="form-block-half">
        <label for="fname">First Name</label>
        <input type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id) ?? '';?>" placeholder="Your name..">
        <br>
        <label for="lname">Last Name</label>
        <input type="text" id="lname" class="input" name="lastname" value="<?php echo $user->get_user_lastname($id) ?? '';?>" placeholder="Your last name..">
        <br>
        <label for="email">Email</label>
        <input type="email" id="email" class="input" name="email"  value="<?php echo $user->get_user_email($id) ?? '';?>" placeholder="Your email..">
        <br>
        <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>">
    </div>
    <br/>
    <div id="button-block">
        <input type="submit" name="action" value="delete" formmethod="post" formaction="user/process.php?action=delete&type=user">
        <input type="submit" name="action" value="update" formmethod="post" formaction="user/process.php?action=update&type=user">
    </div>
</form>
</div>
</div>
