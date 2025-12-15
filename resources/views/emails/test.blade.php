<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Notification de connexion</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #1a1a1a; padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">SoftLather</h1>
                        </td>
                    </tr>
                    
                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px; color: #333333;">
                            <h2 style="margin-top: 0; color: #1a1a1a;">Connexion détectée</h2>
                            <p>Votre compte SoftLather vient d’être utilisé pour une connexion.</p>
                            <p>Si ce n’était pas vous, veuillez contacter immédiatement notre équipe SoftLather.</p>
                            <p style="margin-top: 30px;">Merci,<br><strong>Équipe SoftLather</strong></p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #1a1a1a; padding: 20px; text-align: center; color: #ffffff; font-size: 12px;">
                            © {{ date('Y') }} SoftLather. Tous droits réservés.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
