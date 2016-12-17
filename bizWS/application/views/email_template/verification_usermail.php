<table border='0' cellpadding='0' cellspacing='0' align='center' width='100%' style='font-family:Arial,Helvetica,sans-serif;max-width:700px'>
    <tbody>
        <tr bgcolor='#292D32'>
            <td colspan='5' height='15'>&nbsp;</td>
        </tr>
        <tr bgcolor='#292D32'>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
            <td align='center' valign='middle' >
                <img src='<?php echo base_url(); ?>assets/image/emailer_logo.png' width='250' height='50' style='display:block;'>
            </td>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
        </tr>
        <tr bgcolor='#292D32'>
            <td colspan='5' height='15'>&nbsp;</td>
        </tr>
        <tr>
            <td height='10' colspan='5'>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan='3' align='left' valign='top' style='color:#666666;font-size:15px'>
                <p>Dear <?php echo $fname; ?>,
                    <br>
                    <br>Welcome to bizjumper<br>
                    <br>You have recently signed up for a bizjumper account.
                    <br>
                    <br>Please verify your email address and activate your account by clicking the button below :
                    <br></p>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height='20' colspan='5'>&nbsp;</td>
        </tr>
        <tr>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
            <td align='center' valign='middle' >
                <a href='<?php echo $url; ?>' style='display: block; height: 50px;  width:250px; border-radius: 33px; border:1px solid #ccc; background-color: #30beac; text-decoration: none; color: #fff; font-size: 20px; ' ><strong style='padding-top: 15px; display: inline-block;'>Verify your account</strong></a>
            </td>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
        </tr>
        <tr>
            <td height='20' colspan='5'>&nbsp;</td>
        </tr>
        <tr>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
            <td align='center' valign='middle' >or</td>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
        </tr>
        <tr>
            <td height='20' colspan='5'>&nbsp;</td>
        </tr>
        <tr>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
            <td align='center' valign='middle' style='color:#666666;font-size:15px' >Copy following link in your browser: <a href='<?php echo $url; ?>' style='color:#30beac; text-decoration:none;'><?php echo $url; ?></a></td>
            <td width='20'>&nbsp;</td>
            <td width='20'>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan='3' align='left' valign='top' style='color:#666666;font-size:15px'>
                <p><br>Regards Team
                    <br><?php echo TITLE; ?></p>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td height='20' colspan='5'>&nbsp;</td>
        </tr>
        <tr>
            <td height='20' colspan='5'>&nbsp;</td>
        </tr>
        <tr style='color:#999999;font-size:10px'>
            <td align='center' colspan='5'>
            </td>
        </tr>
        <tr>
            <td height='20' colspan='5'>&nbsp;</td>
        </tr>
    </tbody>
</table>