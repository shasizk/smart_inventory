<!-- PAGE 1: OVERVIEW / DASHBOARD -->
            <div id="view-dashboard" class="page-view active">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div>
                            <div class="label">Total Alat (Asset)</div>
                            <div class="value" id="statAlat">48 Unit</div>
                            <span class="badge-trend trend-up"><i class="fa-solid fa-arrow-up"></i> 8 unit baru</span>
                        </div>
                        <div class="stat-icon" style="background: #dbeafe; color: var(--primary);"><i class="fa-solid fa-toolbox"></i></div>
                    </div>

                    <div class="stat-card">
                        <div>
                            <div class="label">Stok Bahan (Consumable)</div>
                            <div class="value" id="statBahan">160 Pcs</div>
                            <span class="badge-trend trend-down"><i class="fa-solid fa-arrow-down"></i> 12 dipakaikan</span>
                        </div>
                        <div class="stat-icon" style="background: #d1fae5; color: var(--success);"><i class="fa-solid fa-boxes-stacked"></i></div>
                    </div>

                    <div class="stat-card">
                        <div>
                            <div class="label">Pengajuan Pending</div>
                            <div class="value" id="statPending">5 Item</div>
                            <span class="badge-trend trend-up"><i class="fa-solid fa-clock"></i> Perlu verifikasi</span>
                        </div>
                        <div class="stat-icon" style="background: #fef3c7; color: var(--warning);"><i class="fa-solid fa-hourglass-half"></i></div>
                    </div>

                    <div class="stat-card">
                        <div>
                            <div class="label">Smart Lock Relay</div>
                            <div class="value" id="statLock">ONLINE</div>
                            <span class="badge-trend trend-up"><i class="fa-solid fa-wifi"></i> ESP32 Ready</span>
                        </div>
                        <div class="stat-icon" style="background: #fee2e2; color: var(--danger);"><i class="fa-solid fa-lock-open"></i></div>
                    </div>
                </div>

                <div class="grid-2-1" style="margin-top: 20px;">
                    <div class="panel">
                        <div class="panel-header">
                            <span class="panel-title">Pengajuan Peminjaman & Pemakaian Terbaru</span>
                            <button class="btn btn-outline" style="font-size: 0.75rem;" onclick="navigate('pengajuan')">View All</button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>No. Ref</th>
                                    <th>Pemohon</th>
                                    <th>Tipe</th>
                                    <th>Barang</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="dashboardTableBody">
                                <tr>
                                    <td><strong>#REQ-0818</strong></td>
                                    <td>Budi (Teknisi)</td>
                                    <td><span class="pill pill-blue">Alat</span></td>
                                    <td>Splicer FO Exfo</td>
                                    <td><span class="pill pill-amber">Pending</span></td>
                                    <td><button class="btn btn-outline" style="padding: 4px 8px; font-size: 0.75rem;" onclick="openDetail('REQ-0818', 'Budi', 'Splicer FO Exfo', 'Pending')">Detail</button></td>
                                </tr>
                                <tr>
                                    <td><strong>#REQ-0819</strong></td>
                                    <td>Dedi (NOC)</td>
                                    <td><span class="pill pill-green">Bahan</span></td>
                                    <td>Kabel Cat6 (50m)</td>
                                    <td><span class="pill pill-green">Approved</span></td>
                                    <td><button class="btn btn-primary" style="padding: 4px 8px; font-size: 0.75rem;" onclick="openModal('modalScan')">Scan Locker</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="panel">
                        <div class="panel-header">
                            <span class="panel-title">Smart Lock Locker ESP32</span>
                            <i class="fa-solid fa-signal" style="color: var(--success);"></i>
                        </div>
                        <div class="locker-grid">
                            <div class="locker-card" id="slot1">
                                <i class="fa-solid fa-lock" style="color: var(--danger); font-size: 1.2rem;"></i>
                                <div style="font-weight: 600; font-size: 0.8rem; margin-top: 6px;">Slot 01</div>
                                <div style="font-size: 0.7rem; color: var(--text-muted);">Splicer FO</div>
                            </div>
                            <div class="locker-card unlocked" id="slot2">
                                <i class="fa-solid fa-lock-open" style="color: var(--success); font-size: 1.2rem;"></i>
                                <div style="font-weight: 600; font-size: 0.8rem; margin-top: 6px;">Slot 02</div>
                                <div style="font-size: 0.7rem; color: var(--success);">Unlocked (Scan)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>