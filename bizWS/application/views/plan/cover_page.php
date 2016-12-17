<?php
$count = $value->num_rows();
$company = $val->company;
if ($count > 0) {
    $val = $value->row();
    $slogan = $val->slogan;
    $dateValue = $val->modified_on;
    $time = strtotime($dateValue);
    $month = date("F", $time);
    $year = date("Y", $time);
    $contact = $val->contact;
    $phone = $val->phone;
    $email = $val->email;
    $street = $val->street;
    $city = $val->city;
    $state = $val->state;
    $postal = $val->postal;
} else {
    $company = 'SAMPLE';
    $slogan = 'sample';
    $month = 'Oct';
    $year = '1990';
    $contact = 'john deo';
    $phone = '1234567890';
    $email = 'xyz@gmail.com';
    $street = 'sample data';
    $city = 'xyz';
    $state = 'xyz';
    $postal = '123456';
}
?>
<head>
    <style type="text/css">

        .cover_page{

            background: url(../../assets/image/bg-pattern-5.png) repeat ;
            border-radius: 4px;
            border: 1px solid #74B9E7;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        .center-box{
            width: 100%;
            margin-top:30%;
            margin-bottom: 30%;

        }

        .center-box h3{

        }

        .cover_page_main{
            margin:3%;
            min-height: 980px;
        }

        .cover-heading{
            text-transform: uppercase;
            color: #2EA194;
        }
        .cover-heading-2{
            text-transform: uppercase;
        }
        .cover-heading-3{
            text-transform: uppercase;
            margin-top: 5%;
        }

        .box_2{
            border-top:1px solid #2EA194;
            margin-bottom: 12%;
        }
        .box_2_heading{
            padding-left: 15px;
        }
        .cover_left_foo p{
        }

        .cover_right_foo p{
            padding-left: 25%;
        }
        .cover_foo{
            margin-top: 82%;
        }
        @media screen and (max-width: 768px) {
            .cover_page_main{
                margin:3%;
                min-height: 764px;
            }
            .cover_page{

                background: url(../../assets/image/bg-pattern-sm-5.png) repeat ;
                border-radius: 4px;
                border: 1px solid #74B9E7;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            }
            .cover_foo {
                margin-top: 105%;
            }
            .box_2{
                margin-bottom: 17%;
            }
        }
    </style>
</head>
<div class="main_container cover_page_main">
    <div class="col-md-8 col-xs-12 col-sm-10 col-md-offset-2 col-sm-offset-1 cover_page">
        <div class="center-box text-center">
            <h3>Confidential</h3>
            <h1 class="cover-heading"><b><?php echo $company; ?></b></h1>
            <h3 class="cover-heading-2"><?php echo $slogan; ?></h3>
            <h3 class="cover-heading-3"><b>Business Plan</b></h3>
            <h3 class="">Prepared <?php echo $month; ?> <?php echo $year; ?></h3>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 box_2">
                <div class="">
                    <h2 class="box_2_heading">Contact Information</h2>
                    <div class="col-md-6 col-sm-6 col-xs-6 cover_left_foo">
                        <p><?php echo $contact; ?></p>
                        <p><?php echo $phone; ?></p>
                        <p><?php echo $email; ?></p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 cover_right_foo">
                        <p><?php echo $street; ?></p>
                        <p><?php echo $city; ?></p>
                        <p><?php echo $state; ?> - <?php echo $postal; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>

