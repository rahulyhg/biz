<?php
$result = $account->row();
$email = $result->email;
$subs_type = $result->subs_type;
$val = '';
switch ($subs_type) {
    case '1':
        $val = 'Free';
        break;
    case '2':
        $val = 'Basic';
        break;
    case '3':
        $val = 'Advanced';
        break;
}
?>
<div class="user-dashboard">
    <h1>Account Overview</h1>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 gutter">
            <div class="sales">
                <h2><?php echo $email; ?></h2>
                <p></p>
                <p>Welcome to your account !</p>
                <p>You're Currently on the <?php echo $val; ?> Plan. &nbsp; &nbsp; <a href="<?php echo base_url(); ?>settings/subscription"> Upgrade </a></p>
            </div>
        </div>
    </div>
</div>