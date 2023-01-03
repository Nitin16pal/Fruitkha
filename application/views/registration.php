<?php include "header.php" ?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Get 24/7 Support</p>
                    <h1>User Registration</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Have you any question?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <!--Success message -->
                    <?php if ($this->session->flashdata('csuccess')) { ?>
                        <p class="text-success"><?php echo $this->session->flashdata('csuccess'); ?></p>
                    <?php } ?>
                    <!--error message -->
                    <?php if ($this->session->flashdata('conerror')) { ?>
                        <p class="text-danger"><?php echo $this->session->flashdata('conerror'); ?></p>
                    <?php } ?>
                    <form method="POST" id="fruitkha-contact">
                        <div class="form-row mb-3">
                            <div class="col-sm-6 mb-2">
                                <input type="text" placeholder="Name" name="username" id="username" value="<?= set_value('username') ?>" class="form-control py-4 <?= (form_error('username') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('username', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <input type="email" placeholder="Email" name="useremail" id="useremail" value="<?= set_value('useremail') ?>" class="form-control py-4 <?= (form_error('useremail') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('useremail', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <input type="tel" placeholder="Phone" name="usermobile" id="usermobile" value="<?= set_value('usermobile') ?>" class="form-control py-4 <?= (form_error('usermobile') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('usermobile', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <input type="text" placeholder="city" name="usercity" id="usercity" value="<?= set_value('usercity') ?>" class="form-control py-4 <?= (form_error('usercity') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('usercity', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <input type="text" placeholder="Street Address " name="userstreet1" id="userstreet1" value="<?= set_value('userstreet1') ?>" class="form-control py-4 <?= (form_error('userstreet1') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('userstreet1', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <input type="text" placeholder="Street Address" name="userstreet2" id="userstreet2" value="<?= set_value('userstreet2') ?>" class="form-control py-4 <?= (form_error('userstreet2') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('userstreet2', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <input type="text" placeholder="State" name="userstate" id="userstate" value="<?= set_value('userstate') ?>" class="form-control py-4 <?= (form_error('userstate') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('userstate', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <input type="text" placeholder="Country" name="usercountry" id="usercountry" value="<?= set_value('usercountry') ?>" class="form-control py-4 <?= (form_error('usercountry') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('usercountry', "<span style='color:red'>", "</span>"); ?>
                            </div>

                            <div class="col-sm-6 mb-2">
                                <input type="text" placeholder="Pin Code" name="userpin" id="userpin" value="<?= set_value('userpin') ?>" class="form-control py-4 <?= (form_error('userpin') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('userpin', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <input type="password" placeholder="Password" name="userpass" id="userpass" value="<?= set_value('userpass') ?>" class="form-control py-4 <?= (form_error('userpass') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('userpass', "<span style='color:red'>", "</span>"); ?>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="<?= set_value('confirm_password') ?>" class="form-control py-4 <?= (form_error('confirm_password') != "") ? 'is-invalid' : ''; ?>">
                                <?= form_error('confirm_password', "<span style='color:red'>", "</span>"); ?>
                            </div>

                        </div>
                        <!-- <div class="row d-flex justify-content-around">
							</div> -->
                        <input type="hidden" name="token" value="FsWga4&@f6aw" />
                        <input type="submit" value="Submit" class="contact-submit">
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Shop Address</h4>
                        <p>34/8, East Hukupara <br> Gifirtok, Sadan. <br> Country Name</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours</h4>
                        <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +00 111 222 3333 <br> Email: support@fruitkha.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
            </div>
        </div>
    </div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
</div>
<!-- end google map section -->
<?php include "footer.php" ?>
<?php include "inc-script.php" ?>




</body>

</html>