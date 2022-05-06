<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            Sufrati Email
        </title>
        <style media="all" type="text/css">
            table td {border-collapse: collapse;}
            td{ font-family:Arial, Helvetica, sans-serif; }
        </style>
    </head>
    <body style="margin:0;padding:0;-webkit-text-size-adjust:none;width:100% !important;font-family: Helvetica,Arial, sans-serif;font-size:14px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4" style="background-color:#f4f4f4; margin:0; padding:0; width:100% !important; line-height: 100% !important;">
            <tr>
                <td style="height:30px;" height="30"></td>
            </tr>
            <tr>
                <td align="center">
                    <table cellpadding="0" cellspacing="0" border="0" width="640" bgcolor="#ffffff" style="background:#ffffff;border:1px solid #cccccc;border-radius:3px;">
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" width="640" >
                                    <tr>
                                        <td colspan="2" align="left" style="padding:20px 30px;" valign="top">
                                            <a href="<?php echo Azooma::URL(); ?>" title="Sufrati">
                                                <img src="<?php echo Azooma::CDN('sufratilogo/sufratilogo_new.jpg'); ?>" height="60" alt="Sufrati" style="outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;border:none;"/>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" style="background:#e60683;border-right: 1px solid #D4D2D3;border-left: 1px solid #D4D2D3;height:28px;">
                                            <table cellpadding="0" cellspacing="0" border="0" width="698" style="padding:8px 0px;">
                                                <tr>
                                                    <td width="23"></td>
                                                    <td style="color:#fff;font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:16px;height:20px;"><span style="font-weight:bold;font-size: 17px;line-height: 19px;">
                                                            <?php
                                                            echo stripslashes($event->name);
                                                            ?>
                                                        </span></td>
                                                    <td width="30"></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="100px" valign="top" style="padding:0 30px 20px;">
                                            <table cellpadding="0" cellspacing="0" border="0" width="640">
                                                <tr>
                                                    <td>
                                                        <table cellpadding="2" cellspacing="2" border="0" width="640">
                                                            <tr>
                                                                <td colspan="2"style="padding:0px 20px;" ><div style="font-size:13px;line-height:20px;color:#646464;">
                                                                        <?php
                                                                        echo html_entity_decode(stripslashes($event->message));
                                                                        ?>
                                                                    </div></td>
                                                            </tr>
                                                            <?php
                                                            if (!empty($event->messageAr)) {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="2" style="padding:0px 20px;"><div style="font-size:13px;line-height:21px;color:#646464;direction:rtl;" dir="rtl"> <?php echo $event->messageAr; ?> </div></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td colspan="2" height="10" style="height:20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;line-height:20px;padding:0px 0px;line-height:21px;"> 
                                                                    Thank you for using Sufrati.com
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;">
                                                                    Feel free to contact us for any information at <a href="mailto:info@azooma.co" style="color:#00A2B1;">info@azooma.co</a> or call us on <span style="color:#e60683;font-size:18px;"><?php echo $country->telephone; ?></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;">
                                                                    If you would like to advertise with us please contact <a href="mailto:sales@azooma.co" style="color:#00A2B1;">sales@azooma.co</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;padding-bottom:10px;" > Thank you,  </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;padding-bottom:10px;" > Best regards </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;font-size:14px;padding-bottom:10px;" > Sufrati Team </td>
                                                            </tr>                  

                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="20" style="height:20px;"></td>
                                    </tr>
                                    <tr height="100px"  style="color:#646464; background-color:whitesmoke;">
                                        <td width="330" align="left" valign="bottom" style=" padding:20px 30px; ">
                                            <p>
                                                <a href="<?php echo Azooma::URL('contact'); ?>" target="_blank">
                                                    Contact Us
                                                </a> | 
                                                <a href="<?php echo $country->facebook; ?>" title="Sufrati Facebook">Facebook</a> | 
                                                <a href="<?php echo $country->twitter; ?>" title="Sufrati Twitter">Twitter</a>
                                            </p>
                                        </td>
                                        <td align="right" style=" padding:20px 30px;" valign="bottom">            
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="https://itunes.apple.com/us/app/sufrati-lite/id709229893?ls=1&mt=8" title="Download Sufrati for iOS">
                                                            <img src="http://local.azooma.co/new-sufrati/apple-badge.png" />
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="https://play.google.com/store/apps/details?id=com.LetsEat.SufratiLite" title="Download Sufrati for Android">
                                                            <img src="http://local.azooma.co/new-sufrati/google-badge.png" />
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="background-color:whitesmoke;padding:5px 30px;text-align:center;color:#666;line-height:18px;">
                                            &copy; <?php echo date('Y'); ?> Sufrati<br/>
                                            Tel:- <?php echo $country->telephone; ?><br/>
                                            <?php echo $country->address; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" colspan="2" style="min-height:20px !important;background-color:whitesmoke;">

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="50">

                </td>
            </tr>
        </table>
    </body>
</html>