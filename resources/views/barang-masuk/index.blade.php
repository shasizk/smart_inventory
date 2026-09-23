@extends ('be.master')
@section('barang-masuk')
  <div id="view-barang-masuk" class="page-view active">
                <div class="panel">
                    <div class="panel-header">
                        <span class="panel-title">Pencatatan Barang Masuk (Pembelian)</span>
                        <button class="btn btn-primary" onclick="openModal('modalBarangMasuk')"><i class="fa-solid fa-truck-arrow-right"></i> Input Barang Masuk</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No. Penerimaan</th>
                                <th>Supplier</th>
                                <th>Tgl Masuk</th>
                                <th>Total Item</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody id="barangMasukTableBody">
                            <tr>
                                <td><strong>TRX-IN-2026-001</strong></td>
                                <td>PT Optik Jaya Indonesia</td>
                                <td>20 Sep 2026</td>
                                <td>3 Item</td>
                                <td>Pembelian pengadaan Q3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


<!-- Modal 2: Barang Masuk -->
    <div class="modal-overlay" id="modalBarangMasuk">
        <div class="modal">
            <div class="modal-header">
                <h3>Input Transaksi Barang Masuk</h3>
                <button class="modal-close" onclick="closeModal('modalBarangMasuk')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formBarangMasuk" onsubmit="saveBarangMasuk(event)">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" id="bm_supplier" placeholder="PT Optik Indonesia" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" id="bm_tgl" value="2026-09-21" required>
                    </div>
                    <div class="form-group">
                        <label>Total Jumlah Item</label>
                        <input type="number" class="form-control" id="bm_qty" placeholder="5" required>
                    </div>
                    <div class="form-group">
                        <label>Catatan Penerimaan</label>
                        <input type="text" class="form-control" id="bm_catatan" placeholder="Restok bahan bulanan">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" onclick="closeModal('modalBarangMasuk')">Batal</button>
                        <button type="submit" class="btn btn-primary">Proses Input</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection