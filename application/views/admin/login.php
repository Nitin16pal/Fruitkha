<div class="container">
    <div class="center verticle_center full_height">
        <div class="login_section">
            <div class="logo_login">
                <div class="center">
                    <img width="210" src="<?php echo base_url("assets/admin/images/logo/logo.png") ?>" alt="#" />
                </div>
            </div>
            <div class="login_form">
                <form method="POST"  enctype="multipart/form-data">
                    <fieldset>
                        <div class="field">
                            <label class="label_field" for="username">Username</label>
                            <input type="email" name="username" id="username" placeholder="Username" value="<?= set_value('username') ?>" />
                            <?php echo form_error('username', "<span id='username_error' class='field_error text-danger d-block'>", "</span>"); ?>

                        </div>
                        <div class="field">
                            <label class="label_field" for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" value="<?= set_value('password') ?>" />
                            <?php echo form_error('password', " <span id='password_error' class='field_error text-danger d-block'>", "</span>"); ?>
                        </div>
                        <div class="field margin_0">
                            <label class="label_field hidden">hidden label</label>
                            <button class="main_bt" type="submit">Log In</button>
                        </div>
                    </fieldset>
                    <?php if($this->session->flashdata('crederror')) {?>
                    <span id="result" class="text-danger mt-4 d-block text-center"><?= $this->session->flashdata('crederror') ?></span>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    function valid_login() {
        var username = jQuery('#username').val();
        var password = jQuery('#password').val();
        jQuery('.field_error').html('');
        var is_error = '';
        if (username == '') {
            jQuery('#username_error').html('Please enter username');
            is_error = 'yes';
        }
        if (password == '') {
            jQuery('#password_error').html('Please enter password');
            is_error = 'yes';
        }
        if (is_error == '') {
            jQuery.ajax({
                type: 'post',
                url: '<?php echo base_url("admin/login/index") ?>',
                data: 'username=' + username + '&password=' + password,
                success: function(data) {
                    var response = JSON.parse(data);
                    if (response.result == 'success') {
                        window.location.href = '<?php echo base_url("accounts/dashboard") ?>';
                    } else {
                        jQuery('#result').html(response.msg);
                    }
                }
            })
        }
    }
</script> -->