<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karlink System - Verifikasi OTP</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-body: #f4f6f9;
            --bg-card: #ffffff;
            --border-color: #e2e8f0;
            --primary-blue: #2563eb;
            --primary-hover: #1d4ed8;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .otp-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            padding: 36px 32px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #eff6ff;
            color: var(--primary-blue);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
            border: 1px solid #dbeafe;
        }

        .brand-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .brand-subtitle {
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 28px;
        }

        .email-highlight {
            color: var(--text-main);
            font-weight: 600;
        }

        .otp-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 24px;
        }

        .otp-input {
            width: 50px;
            height: 56px;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            text-align: center;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-main);
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        .otp-input:focus {
            border-color: var(--primary-blue);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .btn-verify {
            width: 100%;
            background: var(--primary-blue);
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-verify:hover {
            background: var(--primary-hover);
        }

        .resend-text {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 24px;
        }

        .resend-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 20px;
            font-size: 0.85rem;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            color: var(--text-main);
        }
    </style>
</head>
<body>

    <div class="otp-card">
        <div class="icon-box">
            <i class="fa-solid fa-shield-halved"></i>
        </div>

        <h1 class="brand-title">Verifikasi Kode OTP</h1>
        <p class="brand-subtitle">
            Masukkan 6 digit kode verifikasi yang telah kami kirimkan ke email <br>
            <span class="email-highlight">{{ $email ?? 'email@domain.com' }}</span>
        </p>

        <form action="{{ route('verify.otp.post') }}" method="POST" id="otp-form">
            @csrf
            <input type="hidden" name="otp_code" id="full-otp">

            <div class="otp-container">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required autofocus>
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
            </div>

            <button type="submit" class="btn-verify">
                <span>Verifikasi Akun</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <p class="resend-text">
            Tidak menerima kode?
            <a href="#" class="resend-link">Kirim Ulang</a>
        </p>

        <a href="{{ route('register') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Register
        </a>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp-input');
        const hiddenOtp = document.getElementById('full-otp');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                updateFullOtp();
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', (e) => {
                const pasteData = e.clipboardData.getData('text').trim();
                if (pasteData.length === inputs.length && /^\d+$/.test(pasteData)) {
                    pasteData.split('').forEach((char, i) => {
                        inputs[i].value = char;
                    });
                    inputs[inputs.length - 1].focus();
                    updateFullOtp();
                }
            });
        });

        function updateFullOtp() {
            let code = '';
            inputs.forEach(input => code += input.value);
            hiddenOtp.value = code;
        }
    </script>
</body>
</html>