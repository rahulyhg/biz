<div class="main_container plan_main resize" style="display:table;">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php } ?>
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php } ?>
        <div class="upper-content">
            <h3>Cover Page &nbsp; &nbsp;<span></span></h3>
        </div>
        <div class="lower-content ">
            <!--<p><b> Company Logo</b></p>-->
            <p>Fill details related to your Company Name, Tagline, Address,Contact Name,Email & Phone number or any other confidential message to appear on cover page.</p>

            <form method="post">
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="cname">Company Name<span class="required">(required)</span></label>
                        <?php
                        echo form_input('company', set_value('company', $company_name), 'id="company" class="form-control" placeholder="Company Name" readonly="readonly"') . form_error('company');
                        ?>
                        <p class="tag_line">This is the same name that will appear on your pitch</p>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-12">
                        <label for="cname">Slogan or Tagline<span class="required">(required)</span></label>
                        <p class="tag_line">Got a catchy description of your company, product, or mission? </p>
                        <?php
                        echo form_input('slogan', set_value('slogan', $cover['slogan']), 'maxlength="120" id="slogan" class="form-control" placeholder="Slogan or Tagline"')
                        . form_error('slogan');
                        ?>
                        <p class="tag_line"> <span id="slogan-text">120</span> characters remaining</p>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="cname">Street Address</label>
                        <?php
                        echo form_input('street', set_value('street', $cover['street']), 'id="street" class="form-control" placeholder="Street Address"')
                        . form_error('street');
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cname">City</label>
                        <?php
                        echo form_input('city', set_value('city', $cover['city']), 'id="city" class="form-control" placeholder="City Name"')
                        . form_error('city');
                        ?>
                    </div>
                </div>   
                <div class="row col-md-12">
                    <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                        <label for="cname">State or Province</label>
                        <?php
                        echo form_input('state', set_value('state', $cover['state']), 'id="state" class="form-control" placeholder="State or Province"')
                        . form_error('state');
                        ?>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                        <label for="cname">Postal Code</label>
                        <?php
                        echo form_input('postal', set_value('postal', $cover['postal']), 'id="postal" class="form-control" placeholder="Postal Code"')
                        . form_error('postal');
                        ?>
                    </div>
                    <div class="form-group col-md-4 col-sm-4 col-xs-12 ">
                        <label for="cname">Country</label>
                        <?php
                        echo form_input('country', set_value('country', $cover['country']), 'id="country" class="form-control" placeholder="Country"')
                        . form_error('country');
                        ?>
                    </div>
                </div> 
                <div class="row col-md-12">
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="cname">Contact Name<span class="required">(required)</span></label>
                        <?php
                        echo form_input('contact', set_value('contact', $cover['contact']), 'id="contact" class="form-control" placeholder="Contact Name"')
                        . form_error('contact');
                        ?>
                    </div>

                    <div class="form-group col-md-6 col-sm-6">
                        <label for="cname">Contact Email<span class="required">(required)</span></label>
                        <?php
                        echo form_input('email', set_value('email', $cover['email']), 'id="email" class="form-control" placeholder="Contact Email"')
                        . form_error('email');
                        ?>
                        <p class="tag_line">For display on the cover page only</p>
                    </div>


                </div>
                <!-- <div class="row col-md-12">
                    
                </div> -->
                <div class="row col-md-12">
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="cname">Contact Phone</label>
                        <?php
                        echo form_input('phone', set_value('phone', $cover['phone']), 'id="phone" class="form-control" placeholder="Contact Phone"')
                        . form_error('phone');
                        ?>
                    </div>


                    <div class="form-group col-md-6 col-sm-6">
                        <label for="cname">Confidentiality Message</label>
                        <?php
                        echo form_input('message', set_value('message', $cover['message']), 'maxlength="100" id="message" class="form-control" placeholder="Confidentiality Message"')
                        . form_error('message');
                        ?>
                        <p class="tag_line"><span id="message-text">100</span> Characters Remaining</p>
                    </div>


                </div>
                <!-- <div class="row col-md-12">
                    
                </div> -->
                <div class="col-md-12" style="text-align:right;">
                    <button type="submit" class="btn btn-warning" name="submit" value="1">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <!--    <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12" >
            <div class="well cover-right">
                <h5><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b></h5>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem </p>
                <form>
                    <div class="checkbox">
                        <label><input type="checkbox" checked="true"><b> Inclued a table of content</b></label>
                    </div>
                </form>
            </div>
        </div>-->
    <!-- Footer -->
</div>