<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karlink System - Register Account</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-body: #f4f6f9;
            --surface-card: #ffffff;
            --border-color: #e5e7eb;
            --primary-blue: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --text-light: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
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

        .register-container {
            width: 100%;
            max-width: 440px;
        }

        .auth-card {
            background-color: var(--surface-card);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 36px 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-logo-icon {
            font-size: 2.2rem;
            color: var(--primary-blue);
            margin-bottom: 8px;
        }

        .brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.3px;
        }

        .brand-subtitle {
            font-size: 0.825rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-main);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            color: var(--text-light);
            font-size: 0.9rem;
            transition: 0.2s;
        }

        .form-input {
            width: 100%;
            padding: 11px 14px 11px 40px;
            background-color: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 0.875rem;
            color: var(--text-main);
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            background-color: #ffffff;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        select.form-input {
            appearance: none;
            cursor: pointer;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-blue);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 10px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
        }

        .auth-footer-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.825rem;
            color: var(--text-muted);
        }

        .auth-footer-link a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 700;
        }

        .auth-footer-link a:hover {
            text-decoration: underline;
        }

        .terms-text {
            font-size: 0.75rem;
            color: var(--text-light);
            text-align: center;
            margin-top: 16px;
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="auth-card">

            <div class="brand-header">
                <i class="fa-solid fa-cube brand-logo-icon"></i>
                <div class="brand-title">Karlink System</div>
                <div class="brand-subtitle">Registrasi Akun Pengguna Baru</div>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <input type="text" name="name" class="form-input" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat Email</label>
                    <div class="input-wrapper">
                        <input type="email" name="email" class="form-input" placeholder="nama@karlink.com" value="{{ old('email') }}" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Akses Peran (Role)</label>
                    <div class="input-wrapper">
                        <select name="role" class="form-input" required>
                            <option value="">Pilih Role</option>
                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="teknisi">Teknisi</option>
                            <option value="noc">NOC</option>
                        </select>
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Konfirmasi Sandi</label>
                    <div class="input-wrapper">
                        <input type="password" name="password_confirmation" class="form-input" placeholder="••••••••" required>
                        <i class="fa-solid fa-key"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Telepon</label>
                    <div class="input-wrapper">
                        <input type="text" name="phone" class="form-input" placeholder="0812xxxxxxx" value="{{ old('phone') }}">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <div class="input-wrapper">
                        <textarea name="address" class="form-input" rows="3" style="padding-left: 14px; min-height: 90px;">{{ old('address') }}</textarea>
                    </div>
                </div>

                @if ($errors->any())
                    <div style="margin-bottom: 12px; color: #dc2626; font-size: 0.8rem;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <button type="submit" class="btn-submit">
                    <span>Daftarkan Akun</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <div class="auth-footer-link">
                Sudah memiliki akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>

            <div class="terms-text">
                Dengan mendaftar, Anda menyetujui hak akses sistem Smart Lock & aturan pengelolaan barang Karlink System.
            </div>

        </div>
    </div>

</body>
</html>