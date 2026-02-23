<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background:#f4f4f4; padding:20px; }
        .container { max-width:600px; margin:0 auto; background:#fff; border-radius:8px; overflow:hidden; }
        .header { background:#0d6efd; padding:30px; text-align:center; }
        .header h1 { color:#fff; margin:0; font-size:24px; }
        .body { padding:30px; }
        .field { margin-bottom:15px; border-bottom:1px solid #eee; padding-bottom:15px; }
        .label { font-weight:bold; color:#555; font-size:13px; }
        .value { color:#333; margin-top:5px; }
        .footer { background:#f4f4f4; padding:15px; text-align:center; color:#999; font-size:12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Yeni İletişim Mesajı</h1>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Ad Soyad</div>
                <div class="value">{{ $data['name'] }}</div>
            </div>
            <div class="field">
                <div class="label">Email</div>
                <div class="value">{{ $data['email'] }}</div>
            </div>
            <div class="field">
                <div class="label">Konu</div>
                <div class="value">{{ $data['topic'] }}</div>
            </div>
            <div class="field">
                <div class="label">Mesaj</div>
                <div class="value">{{ $data['message'] }}</div>
            </div>
        </div>
        <div class="footer">
            Blog Sitesi &copy; {{ date('Y') }}
        </div>
    </div>
</body>
</html>