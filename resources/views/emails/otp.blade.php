<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode OTP Registrasi</title>
</head>

<body style="margin: 0; padding: 24px; background: #f4f6f9; font-family: Arial, sans-serif; color: #1e293b;">

    <div style="
        max-width: 520px;
        margin: 0 auto;
        padding: 32px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
    ">

        <h1 style="margin: 0 0 16px; font-size: 22px;">
            Verifikasi Registrasi
        </h1>

        <p style="margin: 0 0 24px; line-height: 1.6;">
            Gunakan kode berikut untuk menyelesaikan registrasi akun Karlink System:
        </p>

        <div style="
            margin: 0 0 24px;
            padding: 18px;
            background: #eff6ff;
            border-radius: 8px;
            color: #2563eb;
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 8px;
            text-align: center;
        ">
            {{ $otpCode }}
        </div>

        <p style="margin: 0; color: #64748b; line-height: 1.6;">
            Kode ini berlaku selama 10 menit.
            Jangan berikan kode ini kepada orang lain.
        </p>

    </div>

</body>
</html>