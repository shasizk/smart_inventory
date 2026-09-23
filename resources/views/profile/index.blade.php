<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karlink System - Profil Akun</title>

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
        }

        .main-content {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 32px 20px;
        }

        .page-shell {
            width: min(1100px, 100%);
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 28px;
            text-align: center;
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .page-title p {
            font-size: 0.875rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 24px;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .profile-card {
            text-align: center;
        }

        .avatar-large-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 16px auto;
        }

        .avatar-large {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #dbeafe;
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            border: 3px solid #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .avatar-large img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-badge {
            position: absolute;
            bottom: 0;
            right: 0;
            background: var(--primary-blue);
            color: #ffffff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 2px solid #ffffff;
            font-size: 0.8rem;
            transition: background 0.2s;
        }

        .upload-badge:hover {
            background: var(--primary-hover);
        }

        .badge-role {
            display: inline-block;
            background: #eff6ff;
            color: var(--primary-blue);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 8px;
            border: 1px solid #dbeafe;
        }

        .info-list {
            margin-top: 24px;
            text-align: left;
            border-top: 1px solid var(--border-color);
            padding-top: 16px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            padding: 8px 0;
        }

        .info-item .label {
            color: var(--text-muted);
        }

        .info-item .value {
            font-weight: 600;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
        }

        .form-group label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .input-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.9rem;
            outline: none;
            background: #ffffff;
            transition: border-color 0.2s;
        }

        .input-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .input-control[readonly] {
            background-color: #f8fafc;
            color: var(--text-muted);
            cursor: not-allowed;
        }

        .btn-submit {
            background: var(--primary-blue);
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
        }

        .divider {
            height: 1px;
            background: var(--border-color);
            margin: 28px 0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #1e293b;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: 0.2s ease;
        }

        .btn-back:hover {
            background: #0f172a;
        }

        @media (max-width: 900px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <main class="main-content">
        <div class="page-shell">
            <header class="header">
                <div class="page-title">
                    <h1>Profil Akun</h1>
                    <p>Kelola informasi pribadi dan pengaturan keamanan akun Anda</p>
                </div>
            </header>

            @if(session('success'))
                <div style="background:#dcfce7; color:#166534; border:1px solid #bbf7d0; padding:12px 16px; border-radius:8px; margin-bottom:20px;">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background:#fee2e2; color:#991b1b; border:1px solid #fecaca; padding:12px 16px; border-radius:8px; margin-bottom:20px;">
                    <ul style="margin:0; padding-left:18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="profile-grid">
                <div class="card profile-card">
                    <div class="avatar-large-wrapper">
                        <div class="avatar-large">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Foto Profil">
                            @else
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            @endif
                        </div>

                        <label for="profile_photo" class="upload-badge" title="Ubah Foto">
                            <i class="fa-solid fa-camera"></i>
                        </label>
                    </div>

                    <h3 style="font-size: 1.1rem; font-weight: 700;">{{ Auth::user()->name }}</h3>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 2px;">{{ Auth::user()->email }}</p>
                    <span class="badge-role">{{ str_replace('_', ' ', Auth::user()->role) }}</span>

                    <div class="info-list">
                        <div class="info-item">
                            <span class="label">Status Akun</span>
                            <span class="value" style="color: #16a34a;">
                                <i class="fa-solid fa-circle-check"></i> Aktif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="label">Terdaftar Sejak</span>
                            <span class="value">
                                {{ Auth::user()->created_at ? Auth::user()->created_at->translatedFormat('d M Y') : '-' }}
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="label">Akses Device</span>
                            <span class="value">ESP32 Authorized</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-title">
                            <i class="fa-regular fa-id-card"></i> Informasi Pengguna
                        </div>

                        <div class="form-group">
                            <label for="name">Nama / Username</label>
                            <input type="text" id="name" name="name" class="input-control" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="email" id="email" name="email" class="input-control" value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Hak Akses / Role</label>
                                <input type="text" id="role" class="input-control" value="{{ str_replace('_', ' ', Auth::user()->role) }}" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Nomor HP</label>
                                <input type="text" id="phone" name="phone" class="input-control" value="{{ Auth::user()->phone ?? '' }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="profile_photo">Foto Profil</label>
                                <input type="file" id="profile_photo" name="profile_photo" class="input-control" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea id="address" name="address" class="input-control" rows="4">{{ Auth::user()->address ?? '' }}</textarea>
                        </div>

                        <div style="text-align: right; margin-top: 8px;">
                            <button type="submit" class="btn-submit">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                    <div class="divider"></div>

                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-title">
                            <i class="fa-solid fa-key"></i> Keamanan & Password
                        </div>

                        <div class="form-group">
                            <label for="current_password">Password Saat Ini</label>
                            <input type="password" id="current_password" name="current_password" class="input-control" placeholder="••••••••" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="new_password">Password Baru</label>
                                <input type="password" id="new_password" name="new_password" class="input-control" placeholder="Minimal 8 karakter" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="input-control" placeholder="Ulangi password baru" required>
                            </div>
                        </div>

                        <div style="text-align: right; margin-top: 8px;">
                            <button type="submit" class="btn-submit" style="background-color: #3b82f6;">
                                <i class="fa-solid fa-shield-halved"></i> Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div style="text-align: right; margin-top: 24px;">
                <a href="{{ route('admin.index') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </main>

</body>
</html>