<section class="login-reg-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success ">
                   <a href="" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> 
                   <p> <?php echo display('name')?> : <?php echo html_escape($name);?></p>
                   <p> <?php echo display('email')?> : <?php echo html_escape($email);?></p>
                   <p> <?php echo display('password')?> : <?php echo html_escape($password);?></p>
                </div>
                <a href="<?php echo base_url();?>users/user_profile" class="btn btn-primary"> <?php echo display('my_profile')?></a>
            </div>
        </div>
    </div>
</section>