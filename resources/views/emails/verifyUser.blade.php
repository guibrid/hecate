@extends('layouts.email')

@section('content')
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 10px; font-family: Georgia, 'Times New Roman', serif"><![endif]-->
    <div style="color:#FFFFFF;font-family:'Bitter', Georgia, Times, 'Times New Roman', serif;line-height:120%;padding-top:20px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
            <div style="font-size: 12px; line-height: 14px; font-family: 'Bitter', Georgia, Times, 'Times New Roman', serif; color: #FFFFFF;">
                    <p style="font-size: 14px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; line-height: 33px; text-align: center; margin: 0;"><span style="font-size: 28px;">Welcome to {{ env('APP_NAME') }}<br/></span></p>
            </div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
            <div style="color:#acd6f4;font-family:'Open Sans', Helvetica, Arial, sans-serif;line-height:150%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
            <div style="font-size: 14px; line-height: 18px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; text-align: center; color: #acd6f4;">
                <p>You have been registered with the following email address:</p>
                <p><b>{{$user['email']}}</b></p> 
                <p>Please click on the below link to connect to you personal account</p></div>
            </div>
            <!--[if mso]></td></tr></table><![endif]-->
            <div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:31.5pt; width:109.5pt; v-text-anchor:middle;" arcsize="10%" stroke="false" fillcolor="#3AAEE0"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]-->
            <a href="{{url('/user/verify', $user->verifyUser->token)}}" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#3AAEE0;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;width:auto; width:auto;;border-top:1px solid #3AAEE0;border-right:1px solid #3AAEE0;border-bottom:1px solid #3AAEE0;border-left:1px solid #3AAEE0;padding-top:5px;padding-bottom:5px;font-family:'Open Sans', Helvetica, Arial, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;">
                <span style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;">
                    <span style="font-size: 16px; line-height: 32px;">
                        Connect to {{ env('APP_NAME') }}
                    </span>
                </span>
            </a>
            <p style="color:#FFF; font-size:10px;font-family:'Open Sans', Helvetica, Arial, sans-serif;">If you’re having trouble clicking the "Connect" button, copy and paste the URL below into your web browser: <a style="color:#FFF" href="{{url('/user/verify', $user->verifyUser->token)}}">{{url('/user/verify', $user->verifyUser->token)}}</a></p>
            <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
            </div>
            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px; border-collapse: collapse;" valign="top">
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; border-top: 0px solid transparent;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; border-collapse: collapse;" valign="top"><span></span></td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <!--[if (!mso)&(!IE)]><!-->
            </div>
            <!--<![endif]-->
            </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
            </div>
            </div>

@endsection
