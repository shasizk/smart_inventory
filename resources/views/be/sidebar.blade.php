    <!-- Sidebar -->
    <aside>
        <div class="brand">
            <i class="fa-solid fa-cube"></i>
            <span>Karlink System</span>
        </div>

        <ul class="nav-menu">
            <li class="nav-item"><a class="nav-link active" onclick="navigate('dashboard', this)"><i class="fa-solid fa-chart-pie"></i> Overview</a></li>
            <li class="nav-item role-sa role-admin"><a class="nav-link" onclick="navigate('master', this)"><i class="fa-solid fa-box-archive"></i> Master Data</a></li>
            <li class="nav-item role-sa role-admin role-teknisi"><a class="nav-link" onclick="navigate('barang-masuk', this)"><i class="fa-solid fa-truck-ramp-box"></i> Barang Masuk</a></li>
            <li class="nav-item"><a class="nav-link" onclick="navigate('pengajuan', this)"><i class="fa-solid fa-file-signature"></i> Peminjaman & Pinjam</a></li>
            <li class="nav-item role-sa role-admin"><a class="nav-link" onclick="navigate('smartlock', this)"><i class="fa-solid fa-vault"></i> Smart Lock ESP32</a></li>
            <li class="nav-item role-sa role-admin role-noc"><a class="nav-link" onclick="navigate('laporan', this)"><i class="fa-solid fa-chart-column"></i> Laporan & Stok</a></li>
            <li class="nav-item role-sa"><a class="nav-link" onclick="navigate('users', this)"><i class="fa-solid fa-users-gear"></i> User Manager</a></li>
        </ul>

        <div class="sidebar-card">
            <h4>Karlink Smart Lock</h4>
            <p>ESP32 Controller Online</p>
            <button class="btn btn-primary" style="width: 100%; justify-content: center; font-size: 0.75rem;" onclick="checkApiStatus()">Cek Status API</button>
        </div>

        <div class="user-profile-sidebar">
            <div class="avatar">KA</div>
            <div>
                <div style="font-weight: 600; font-size: 0.85rem; color: var(--text-title);" id="profileName">Alex Johnson</div>
                <div style="font-size: 0.75rem; color: var(--text-muted);" id="profileRole">Super Admin</div>
            </div>
        </div>
    </aside>

        <!-- Main Content -->
    <main>
        <header>
            <div class="header-left">
                <h2 id="pageTitle">Dashboard Task & Inventory</h2>
                <p id="pageSub">Kelola dan pantau seluruh pergerakan barang & locker Karlink</p>
            </div>

            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass" style="color: var(--text-muted);"></i>
                <input type="text" placeholder="Cari barang, SKU, pengajuan...">
            </div>

            <div class="header-actions">
                <select class="role-selector" onchange="switchRole(this.value)">
                    <option value="superadmin">Role: Super Admin</option>
                    <option value="admin">Role: Admin Warehouse</option>
                    <option value="teknisi">Role: Teknisi Lapangan</option>
                    <option value="noc">Role: NOC Operator</option>
                </select>

                <button class="btn btn-primary" onclick="openModal('modalPengajuan')"><i class="fa-solid fa-plus"></i> + Transaksi</button>
            </div>
        </header>