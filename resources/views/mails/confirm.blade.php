<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background:#f4f4f4; padding:20px; }
        .container { max-width:600px; margin:0 auto; background:#fff; border-radius:8px; overflow:hidden; }
        .header { background:#0d6efd; padding:30px; text-align:center; }
        .header h1 { color:#fff; margin:0; font-size:24px; }
        .body { padding:30px; text-align:center; }
        .footer { background:#f4f4f4; padding:15px; text-align:center; color:#999; font-size:12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Mesajınız Alındı</h1>
        </div>
        <div class="body">
            <p>Merhaba <strong>{{ $data['name'] }}</strong>,</p>
            <p>Mesajınız başarıyla alınmıştır. En kısa sürede dönüş yapılacaktır.</p>
            <p>Teşekkürler.</p>
        </div>
        <div class="footer">
            Blog Sitesi &copy; {{ date('Y') }}
        </div>
    </div>
</body>
</html>