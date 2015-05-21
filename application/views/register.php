<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
<?php echo form_open(base_url().'users/register'); ?>
    <div class="form-group">
        <label>First Name*</label>
        <input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name"/>
    </div>
    
    <div class="form-group">
        <label>Last Name*</label>
        <input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name"/>
    </div>
    
    <div class="form-group">
        <label>Email*</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Your Email Adress"/>
    </div>
    
    <div class="form-group">
        <label>Username*</label>
        <input type="text" class="form-control" name="username" placeholder="Create a Username"/>
    </div>
    
    <div class="form-group">
        <label>Password*</label>
        <input type="password" class="form-control" name="password" placeholder="Enter A Password"/>
    </div>
    
    <div class="form-group">
        <label>Repeat Password*</label>
        <input type="password" class="form-control" name="password2" placeholder="Repeat Your Password"/>
    </div>
    
    <button type="submit" name="submit"  class="btn btn-primary">Register</button>

</form>