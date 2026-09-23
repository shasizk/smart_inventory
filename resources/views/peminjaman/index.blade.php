@extends ('be.master')
@section('peminjaman')
     <div id="view-pengajuan" class="page-view active">
                <div class="panel">
                    <div class="panel-header">
                        <span class="panel-title">Form & Riwayat Pengajuan Peminjaman</span>
                        <button class="btn btn-primary" onclick="openModal('modalPengajuan')"><i class="fa-solid fa-paper-plane"></i> Buat Pengajuan Baru</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No. Ref</th>
                                <th>Keperluan</th>
                                <th>Tgl Pinjam - Kembali</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="pengajuanTableBody">
                            <tr>
                                <td><strong>#REQ-2026-001</strong></td>
                                <td>Splicing FO Node Cluster A</td>
                                <td>21 Sep - 22 Sep 2026</td>
                                <td><span class="pill pill-amber">Pending Admin</span></td>
                                <td><button class="btn btn-danger" style="padding: 4px 8px;" onclick="approveRequest(this, '#REQ-2026-001')">Approve</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


<!-- Modal 3: Buat Peminjaman -->
    <div class="modal-overlay" id="modalPengajuan">
        <div class="modal">
            <div class="modal-header">
                <h3>Form Pengajuan Pinjam / Pemakaian</h3>
                <button class="modal-close" onclick="closeModal('modalPengajuan')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formPengajuan" onsubmit="savePengajuan(event)">
                    <div class="form-group">
                        <label>Keperluan / Project</label>
                        <input type="text" class="form-control" id="p_keperluan" placeholder="Pemasangan FO Node B" required>
                    </div>
                    <div class="form-group">
                        <label>Pilih Barang</label>
                        <select class="form-control" id="p_barang">
                            <option value="Splicer FO Exfo">Splicer FO Exfo (Alat)</option>
                            <option value="Kabel UTP Cat6">Kabel UTP Cat6 (Bahan)</option>
                            <option value="OTDR Exfo FTB">OTDR Exfo FTB (Alat)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipe Pengajuan</label>
                        <select class="form-control" id="p_tipe">
                            <option value="Alat">Peminjaman Alat</option>
                            <option value="Bahan">Pemakaian Bahan (Habis Pakai)</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" onclick="closeModal('modalPengajuan')">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection