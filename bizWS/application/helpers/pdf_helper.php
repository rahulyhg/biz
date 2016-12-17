<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function planPdf($menu) {
    $ci = & get_instance();
    $ci->load->library('pdfdownload');
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetPrintHeader(false);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(3, PDF_MARGIN_TOP, 3);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->AddPage();
//    $info = 'Plan Details';
//    $pdf->Write(0, $info, '', 0, 'C', true, 0, false, false, 0);
    $pdf->SetFont('helvetica', '', 8);
    $html = '<div style="background-color:#ffffff;width:100%">
    <table cellspacing="0" cellpadding="0" style="background-color:#f2f2f2;width:100%;font-family:sans-serif;margin:0 auto">
        <tbody >
            <tr>
                <td style="background-color:#fff;"> 
                    <table cellpadding="0" cellspacing="0" style=" box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width:100%;min-width:100%;">
                        <tbody>
                            <tr>
                                <td style="background-image: url(bg-pattern-sm-5.png); background-size:cover; background-position:center center;border-radius:6px; position:relative;">
                                    <table style="width:100%; ">
                                        <thead>
                                            <tr>
                                                <td style="text-transform:uppercase; color:#2EA194; width:99%; padding:3% 2% 0% 2%; font-size:25px;" >
                                                    <h2><b>Bizjumper</b></h2>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody style="">
                                            <tr>
                                                <td>
                                                    <p style="padding:30px 5px 15px 5px; color:#999;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="padding:15px 5px; color:#999;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="padding:15px 5px; color:#999;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="padding:15px 5px 30px 5px; color:#999;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style=" border-top:1px solid #74B9E7; width:99%; padding: 2% 0; "></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style=" color: #999;">
                                                    <h1 style="padding-left:1%;">Contact Information</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style=" color: #999; padding-bottom:5%; width:45%; float:left;">
                                                    <p style="padding-left:2%;">Mahendra Sahu</p>
                                                    <p style="padding-left:2%;">mahen.babu1990@gmail.com</p>
                                                    <p style="padding-left:2%;">www.bizjumper.com</p>
                                                </td>
                                                <td style=" color: #999; padding-bottom:5%; width:45%; float:left">
                                                    <p style="padding-left:20%;">Marathahalli, Bangalore</p>
                                                    <p style="padding-left:20%;">+91 9739027888</p>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>        
    </table>
</div>	';
//    if (isset($menu[0])) {
//        foreach ($menu[0] as $key => $title) {
//            $html .= '<h1>' . $title->title . '</h1>';
//            if (isset($menu[$key])) {
//                foreach ($menu[$key] as $sKey => $sTitle) {
//                    $html .= '<h2>' . $sTitle->title . '</h2>';
//                    if (isset($menu[$sKey])) {
//                        foreach ($menu[$sKey] as $tKey => $tTitle) {
//                            $html .= '<h3>' . $tTitle->title . '</h3>';
//                            $html .= '<p>' . $tTitle->summary . '</p>';
//                        }
//                    }
//                }
//            }
//        }
//    }


    $pdf->writeHTML($html, true, false, false, false, '');
    return $pdf->Output('plan.pdf', 'D');
}
