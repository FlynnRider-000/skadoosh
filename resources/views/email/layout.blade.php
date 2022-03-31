<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]--> 
    <link rel="stylesheet" href="{{ asset('assets/css/email.layout.css') }}">
</head>

<body style="margin: 0; padding: 0;">
    <div style="font-size:0px;font-color:#ffffff;opacity:0;visibility:hidden;width:0;height:0;display:none;">email</div>
   
	<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#e9e8e8">
        <tr>
            <td>
                <table class="main table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#e9e8e8" align="center">
                    <tr>                      
                        <td class="top-right" align="right" style="padding-top: 8px; padding-right: 20px; padding-bottom: 8px;">
                            <p class="top-right-p" style="margin: 0; color:#ffffff; font-size: 12px; font-family: 'Roboto', 'Helvetica CY', sans-serif; line-height: 17px;"><a href="#" target="_blank" style="color: #ffffff; text-decoration: underline;">View in browser</a></p>
                        </td>
                    </tr>
                </table>
		        <table class="main table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td class="" align="center" style="padding-top: 15px; padding-bottom: 15px;">
                            <a href="https://www.exhibitsmart.com" target="_blank">
                                <img class="top_logo_img" src="https://i.ibb.co/n8X76KM/mine-logo.png" alt="logo" width="100"/>
                            </a>                                
                        </td>                        
                    </tr>
                </table>                
               
                <table class="table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td style="padding-right: 20px; padding-left: 20px;">
                            &nbsp;
                        </td>
                    </tr>
                </table>

                <table class="table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td style="padding-right: 15px; padding-left: 15px;">
                            <p style="font-family: 'Roboto', 'Helvetica CY', sans-serif; font-size: 25px; font-weight: bold; color: #1C1D28; margin: 0; line-height: 30px;">Top Job Picks for You</p>
                        </td>
                    </tr>
                </table>

                <table class="table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td style="padding-right: 20px; padding-left: 20px;">
                            &nbsp;
                        </td>
                    </tr>
                </table>
                
                @yield('email-content')

                <table class="table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td style="padding-right: 20px; padding-left: 20px; line-height: 30px;">
                            &nbsp;
                        </td>
                    </tr>
                </table>

                <table class="table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td style="padding-right: 20px; padding-left: 20px; line-height: 30px;">
                            &nbsp;
                        </td>
                    </tr>
                </table>
                
        
               

                <table class="table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td align="center">
                            {{-- <p style="font-family: 'Roboto', 'Helvetica CY', sans-serif; font-size: 14px; color: #2b2a2a; margin: 0; line-height: 20px; padding-left: 10px; padding-right: 10px; text-align:center"><a href="{{ route('unsubscribe', ['token'=> $token]) }}" target="_blank" style="color: #2b2a2a; text-decoration: underline;">Unsubscribe</a> | Sent by Niche Site Project</p> --}}
                            <p style="font-family: 'Roboto', 'Helvetica CY', sans-serif; font-size: 14px; color: #2b2a2a; margin: 0; line-height: 20px; padding-left: 10px; padding-right: 10px; text-align:center"><a href="{{ url('unsubscribe/') }}{{ $token }}" target="_blank" style="color: #2b2a2a; text-decoration: underline;">Unsubscribe</a> | Sent by Niche Site Project</p>
                            <p style="font-family: 'Roboto', 'Helvetica CY', sans-serif; font-size: 14px; color: #2b2a2a; margin: 0; line-height: 20px; padding-left: 10px; padding-right: 10px; text-align:center">201 Coffman Street #516 • Longmont, CO • 80501</p>
                        </td>
                    </tr>
                </table>
                <table class="table-600" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" align="center">
                    <tr>
                        <td style="padding-right: 20px; padding-left: 20px; line-height: 30px;">
                            &nbsp;
                        </td>
                    </tr>
                </table>               
            </td>     
        </tr>        
	</table>
</body>

</html>