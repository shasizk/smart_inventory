<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karlink - Smart Lock & Inventory Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-main: #f1f5f9;
            --bg-card: #ffffff;
            --primary: #2563eb;
            --primary-light: #eff6ff;
            --text-title: #0f172a;
            --text-body: #475569;
            --text-muted: #94a3b8;
            --border: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --sidebar-width: 240px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-main); color: var(--text-body); display: flex; min-height: 100vh; font-size: 14px; }

        /* --- SIDEBAR --- */
        aside {
            width: var(--sidebar-width);
            background: var(--bg-card);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .brand {
            padding: 20px 24px;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-title);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .brand i { color: var(--primary); font-size: 1.3rem; }

        .nav-menu { list-style: none; padding: 0 12px; flex: 1; }
        .nav-item { margin-bottom: 4px; }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: var(--text-body);
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .nav-link:hover { background: var(--bg-main); color: var(--text-title); }
        .nav-link.active { background: var(--primary); color: #ffffff; }

        .sidebar-card {
            margin: 16px;
            padding: 16px;
            background: var(--primary-light);
            border-radius: 12px;
            text-align: center;
        }
        .sidebar-card h4 { color: var(--primary); font-size: 0.85rem; margin-bottom: 4px; }
        .sidebar-card p { font-size: 0.75rem; color: var(--text-muted); margin-bottom: 12px; }

        .user-profile-sidebar {
            padding: 16px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .avatar { width: 36px; height: 36px; border-radius: 50%; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--primary); }

        /* --- MAIN AREA --- */
        main { margin-left: var(--sidebar-width); flex: 1; display: flex; flex-direction: column; min-width: 0; }

        header {
            height: 70px;
            background: var(--bg-card);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 90;
        }
        .header-left h2 { font-size: 1.2rem; font-weight: 700; color: var(--text-title); }
        .header-left p { font-size: 0.8rem; color: var(--text-muted); }

        .search-bar {
            background: var(--bg-main);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 8px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            width: 280px;
        }
        .search-bar input { border: none; background: transparent; outline: none; font-size: 0.85rem; width: 100%; }

        .header-actions { display: flex; align-items: center; gap: 12px; }

        .role-selector {
            background: var(--bg-main);
            border: 1px solid var(--border);
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.8rem;
            color: var(--text-title);
            cursor: pointer;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-success { background: var(--success); color: #fff; }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-outline { background: transparent; border: 1px solid var(--border); color: var(--text-body); }
        .btn-outline:hover { background: var(--bg-main); }

        .content { padding: 24px 28px; display: flex; flex-direction: column; gap: 20px; }

        /* Stats Grid */
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .stat-card .label { font-size: 0.8rem; font-weight: 600; color: var(--text-muted); margin-bottom: 4px; }
        .stat-card .value { font-size: 1.5rem; font-weight: 700; color: var(--text-title); }
        .stat-card .badge-trend { font-size: 0.75rem; font-weight: 600; margin-top: 4px; display: inline-block; }
        .trend-up { color: var(--success); }
        .trend-down { color: var(--danger); }
        .stat-icon { width: 44px; height: 44px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; }

        .grid-2-1 { display: grid; grid-template-columns: 2.2fr 1fr; gap: 20px; }

        .panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
        }
        .panel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
        .panel-title { font-size: 0.95rem; font-weight: 700; color: var(--text-title); }

        /* Tables */
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 0.85rem; }
        th { padding: 10px 12px; color: var(--text-muted); font-weight: 600; border-bottom: 1px solid var(--border); font-size: 0.75rem; text-transform: uppercase; }
        td { padding: 12px; border-bottom: 1px solid var(--border); color: var(--text-body); }
        tr:last-child td { border-bottom: none; }

        .pill { padding: 4px 8px; border-radius: 6px; font-size: 0.7rem; font-weight: 600; display: inline-block; }
        .pill-blue { background: #dbeafe; color: #1e40af; }
        .pill-green { background: #d1fae5; color: #065f46; }
        .pill-amber { background: #fef3c7; color: #92400e; }
        .pill-red { background: #fee2e2; color: #991b1b; }

        /* Locker Grid */
        .locker-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; }
        .locker-card { border: 1px solid var(--border); border-radius: 8px; padding: 12px; text-align: center; background: var(--bg-card); transition: 0.3s; }
        .locker-card.unlocked { border-color: var(--success); background: #f0fdf4; }

        .page-view { display: none; }
        .page-view.active { display: block; }

        /* --- MODAL POPUP STYLES --- */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-overlay.show { display: flex; }
        .modal {
            background: var(--bg-card);
            border-radius: 12px;
            width: 100%;
            max-width: 520px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: modalFade 0.2s ease-out;
        }
        @keyframes modalFade {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .modal-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modal-header h3 { font-size: 1rem; font-weight: 700; color: var(--text-title); }
        .modal-close { background: transparent; border: none; font-size: 1.2rem; cursor: pointer; color: var(--text-muted); }
        .modal-body { padding: 20px; max-height: 75vh; overflow-y: auto; }
        .modal-footer {
            padding: 16px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            background: var(--bg-main);
        }

        .form-group { margin-bottom: 14px; }
        .form-group label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--text-title); margin-bottom: 6px; }
        .form-control {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.85rem;
            outline: none;
            background: #fff;
        }
        .form-control:focus { border-color: var(--primary); }
    </style>
</head>
<body>

<!-- sidebar -->
    <!-- Sidebar -->
    <aside>
        <div class="brand">
            <i class="fa-solid fa-cube"></i>
            <span>Karlink System</span>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a class="nav-link @if ($title === 'dashboard') active @endif" href="{{ route('admin.index') }}"><i class="fa-solid fa-chart-pie"></i> 
                Overview
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link @if ($title === 'Barang & Supplier') active @endif" href="{{ route('basup.index') }}">
                    <i class="fa-solid fa-box-archive"></i> 
                    Barang & Supplier
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link @if ($title === 'Barang Masuk') active @endif" href="{{ route('barang-masuk.index') }}">
                    <i class="fa-solid fa-truck-ramp-box"></i> 
                    Barang Masuk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($title === 'Peminjaman & Pinjam') active @endif" href="{{ route('peminjaman.index') }}">
                    <i class="fa-solid fa-file-signature"></i> 
                    Peminjaman & Pinjam
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('smartlock.index') }}">
                    <i class="fa-solid fa-vault"></i> 
                    Smart Lock ESP32
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('laporan.index') }}">
                    <i class="fa-solid fa-chart-column"></i> 
                    Laporan & Stok
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fa-solid fa-users-gear"></i> 
                    User Manager
                </a>
            </li>
        </ul>

        <div class="user-profile-sidebar">
            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <div style="font-weight: 600; font-size: 0.85rem; color: var(--text-title);" id="profileName">
                    {{ Auth::user()->name }}
                </div>
                <div style="font-size: 0.75rem; color: var(--text-muted);" id="profileRole">
                    {{ str_replace('_', ' ', Auth::user()->role) }}
                </div>
            </div>
        </div>
    </aside>

        <!-- Main Content -->
    <main>
        <header>
            <div class="header-left">
                <h2 id="pageTitle">{{ $title }}</h2>
                <p id="pageSub">Kelola dan pantau seluruh pergerakan barang & locker Karlink</p>
            </div>

            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass" style="color: var(--text-muted);"></i>
                <input type="text" placeholder="Cari barang, SKU, pengajuan...">
            </div>

            <div class="header-actions">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                @endguest

                @auth
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="text-align: right;">
                            <div style="font-weight: 700; font-size: 0.82rem; color: var(--text-title);">
                                {{ Auth::user()->name }}
                            </div>
                            <div style="font-size: 0.72rem; color: var(--text-muted);">
                                {{ str_replace('_', ' ', Auth::user()->role) }}
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline" style="padding: 8px 12px;">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
            
        </header>
<!-- end sidebar -->
        <div class="content">

            <!-- PAGE 1: DASHBOARD -->
            @if ($title === 'dashboard')
                @yield('dashboard')
            @endif
            <!-- PAGE 2: MASTER DATA -->
            @if ($title === 'Barang & Supplier')
                @yield('basup')
            @endif

            <!-- PAGE 3: BARANG MASUK -->
            @if ($title === 'Barang Masuk')
                @yield('barang-masuk')
            @endif

            <!-- PAGE 4: PENGAJUAN -->
            @if ($title === 'Peminjaman & Pinjam')
                @yield('peminjaman')
            @endif
            <!-- PAGE 5: SMART LOCK -->
            
            @if ($title === 'Smart Lock ESP32')
                @yield('smartlock')
            @endif
            <!-- PAGE 6: LAPORAN -->
            @if ($title === 'Laporan & Stok')
                @yield('laporan')
            @endif
            
            <!-- PAGE 7: USERS -->
            @if ($title === 'User Manager')
                @yield('users')
            @endif
            
    </main>

    <!-- ================= MODALS ================= -->


    <!-- JS Logic -->
    <script>
        // Modal Control Functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('show');
        }
        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        // Navigation
        function navigate(pageId, navElement) {
            document.querySelectorAll('.page-view').forEach(view => view.classList.remove('active'));
            document.getElementById('view-' + pageId).classList.add('active');

            if (navElement) {
                document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                navElement.classList.add('active');
            }

            const pageTitles = {
                'dashboard': ['Dashboard Task & Inventory', 'Kelola dan pantau seluruh pergerakan barang & locker Karlink'],
                'master': ['Master Data Barang & Supplier', 'Kelola data SKU, kriteria barang, dan daftar supplier'],
                'barang-masuk': ['Manajemen Barang Masuk', 'Pencatatan pembelian barang dan penerimaan unit baru'],
                'pengajuan': ['Pengajuan Peminjaman & Pemakaian', 'Form peminjaman alat dan pemakaian bahan habis pakai'],
                'smartlock': ['Smart Lock ESP32 Integration', 'Monitoring status solenoid dan log API pembukaan kuncian'],
                'laporan': ['Laporan Riwayat & Kartu Stok', 'Cetak dan unduh laporan pemakaian serta kartu stok ke PDF'],
                'users': ['Manajemen User & Role Access', 'Pengaturan hak akses Super Admin, Admin, Teknisi, dan NOC']
            };

            document.getElementById('pageTitle').textContent = pageTitles[pageId][0];
            document.getElementById('pageSub').textContent = pageTitles[pageId][1];
        }

        // Role Switcher
        function switchRole(role) {
            const roleNameMap = {
                'superadmin': 'Super Admin',
                'admin': 'Admin Warehouse',
                'teknisi': 'Teknisi Lapangan',
                'noc': 'NOC Operator'
            };

            document.getElementById('profileRole').textContent = roleNameMap[role];

            const saElements = document.querySelectorAll('.role-sa');
            const adminElements = document.querySelectorAll('.role-admin');
            const teknisiElements = document.querySelectorAll('.role-teknisi');
            const nocElements = document.querySelectorAll('.role-noc');

            document.querySelectorAll('.nav-item').forEach(el => el.style.display = 'none');

            if (role === 'superadmin') {
                document.querySelectorAll('.nav-item').forEach(el => el.style.display = 'block');
            } else if (role === 'admin') {
                saElements.forEach(el => el.style.display = 'none');
                adminElements.forEach(el => el.style.display = 'block');
                document.querySelector('.nav-item:nth-child(1)').style.display = 'block';
                document.querySelector('.nav-item:nth-child(4)').style.display = 'block';
            } else if (role === 'teknisi') {
                teknisiElements.forEach(el => el.style.display = 'block');
                document.querySelector('.nav-item:nth-child(1)').style.display = 'block';
                document.querySelector('.nav-item:nth-child(4)').style.display = 'block';
            } else if (role === 'noc') {
                nocElements.forEach(el => el.style.display = 'block');
                document.querySelector('.nav-item:nth-child(1)').style.display = 'block';
                document.querySelector('.nav-item:nth-child(4)').style.display = 'block';
            }
        }

        // Form Submit Actions
        function saveMasterBarang(e) {
            e.preventDefault();
            const sku = document.getElementById('m_sku').value;
            const nama = document.getElementById('m_nama').value;
            const kat = document.getElementById('m_kategori').value;
            const min = document.getElementById('m_stok_min').value;
            const awal = document.getElementById('m_stok_awal').value;

            const pillClass = kat.includes('Alat') ? 'pill-blue' : 'pill-green';

            const tbody = document.getElementById('masterTableBody');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${sku}</strong></td>
                <td>${nama}</td>
                <td><span class="pill ${pillClass}">${kat}</span></td>
                <td>${min} Unit</td>
                <td>${awal} Unit</td>
                <td><button class="btn btn-outline">Edit</button></td>
            `;
            tbody.prepend(tr);
            closeModal('modalMasterBarang');
            alert('Item Master Berhasil Ditambahkan!');
            document.getElementById('formMasterBarang').reset();
        }

        function saveBarangMasuk(e) {
            e.preventDefault();
            const supplier = document.getElementById('bm_supplier').value;
            const tgl = document.getElementById('bm_tgl').value;
            const qty = document.getElementById('bm_qty').value;
            const cat = document.getElementById('bm_catatan').value;

            const tbody = document.getElementById('barangMasukTableBody');
            const tr = document.createElement('tr');
            const noRef = 'TRX-IN-2026-' + Math.floor(100 + Math.random() * 900);
            tr.innerHTML = `
                <td><strong>${noRef}</strong></td>
                <td>${supplier}</td>
                <td>${tgl}</td>
                <td>${qty} Item</td>
                <td>${cat}</td>
            `;
            tbody.prepend(tr);
            closeModal('modalBarangMasuk');
            alert('Penerimaan Barang Masuk Berhasil Dicatat!');
            document.getElementById('formBarangMasuk').reset();
        }

        function savePengajuan(e) {
            e.preventDefault();
            const barang = document.getElementById('p_barang').value;
            const tipe = document.getElementById('p_tipe').value;
            const noRef = '#REQ-' + Math.floor(1000 + Math.random() * 9000);

            const tbody = document.getElementById('dashboardTableBody');
            const tr = document.createElement('tr');
            const pillClass = tipe === 'Alat' ? 'pill-blue' : 'pill-green';
            tr.innerHTML = `
                <td><strong>${noRef}</strong></td>
                <td>User Aktif</td>
                <td><span class="pill ${pillClass}">${tipe}</span></td>
                <td>${barang}</td>
                <td><span class="pill pill-amber">Pending</span></td>
                <td><button class="btn btn-outline" style="padding: 4px 8px; font-size: 0.75rem;" onclick="openDetail('${noRef}', 'User', '${barang}', 'Pending')">Detail</button></td>
            `;
            tbody.prepend(tr);
            closeModal('modalPengajuan');
            alert('Pengajuan Berhasil Dibuat!');
            document.getElementById('formPengajuan').reset();
        }

        function saveUser(e) {
            e.preventDefault();
            const nama = document.getElementById('u_nama').value;
            const email = document.getElementById('u_email').value;
            const role = document.getElementById('u_role').value;

            const tbody = document.getElementById('userTableBody');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${nama}</td>
                <td><span class="pill pill-blue">${role}</span></td>
                <td>${email}</td>
                <td><span class="pill pill-green">Active</span></td>
            `;
            tbody.prepend(tr);
            closeModal('modalUser');
            alert('User Baru Berhasil Ditambahkan!');
        }

        function simulasiUnlock() {
            closeModal('modalScan');
            const slot1 = document.getElementById('slot1');
            slot1.classList.add('unlocked');
            slot1.querySelector('i').className = 'fa-solid fa-lock-open';
            slot1.querySelector('i').style.color = 'var(--success)';
            alert('API ESP32 Validated! Solenoid Slot 01 Terbuka.');
        }

        function toggleLocker(slotNum) {
            const slot = document.getElementById('slot' + slotNum);
            slot.classList.toggle('unlocked');
            const icon = slot.querySelector('i');
            if (slot.classList.contains('unlocked')) {
                icon.className = 'fa-solid fa-lock-open';
                icon.style.color = 'var(--success)';
                alert('ESP32 Command Sent: Slot ' + slotNum + ' UNLOCKED');
            } else {
                icon.className = 'fa-solid fa-lock';
                icon.style.color = 'var(--danger)';
                alert('ESP32 Command Sent: Slot ' + slotNum + ' LOCKED');
            }
        }

        function checkApiStatus() {
            alert('ESP32 API Status: Online (Latency 12ms)');
        }

        function downloadPDF() {
            alert('Mencetak Laporan ke format PDF...');
        }

        function openDetail(ref, user, barang, status) {
            alert(`Detail Pengajuan:\nNo Ref: ${ref}\nPemohon: ${user}\nBarang: ${barang}\nStatus: ${status}`);
        }

        function approveRequest(btn, ref) {
            btn.parentElement.innerHTML = '<span class="pill pill-green">Approved</span>';
            alert(`Pengajuan ${ref} telah disetujui (Approved) oleh Admin!`);
        }
    </script>
</body>
</html>