<div id="form-container">
<div id="form-block">
<h3>signup</h3>
    <form method="POST" action="user/process.php?action=new&type=user">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="enter name">
            <br>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="enter lastname">
            <br>
            <label for="email">email</label>
            <input type="text" id="email" class="input" name="email" placeholder="Enter email">
            <br>
            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password">
        </div>
       
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>
</div>