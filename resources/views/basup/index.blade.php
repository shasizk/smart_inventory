@extends('be.master')

@section('basup')
    <div id="view-master" class="page-view active">
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Master Data Item & Supplier</span>

                <button class="btn btn-primary" onclick="openModal('modalMasterBarang')">
                    <i class="fa-solid fa-plus"></i> Tambah Item Baru
                </button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>SKU / Barcode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok Min</th>
                        <th>Stok Saat Ini</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="masterTableBody">
                    <tr>
                        <td><strong>SKU-SPL-01</strong></td>
                        <td>Fiber Optic Splicer Signal Fire</td>
                        <td>
                            <span class="pill pill-blue">
                                Alat / Asset
                            </span>
                        </td>
                        <td>2 Unit</td>
                        <td>5 Unit</td>
                        <td>
                            <button class="btn btn-outline">
                                Edit
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<!-- Modal 1: Master Barang -->
    <div class="modal-overlay" id="modalMasterBarang">
        <div class="modal">
            <div class="modal-header">
                <h3>Tambah Item Master Baru</h3>
                <button class="modal-close" onclick="closeModal('modalMasterBarang')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formMasterBarang" onsubmit="saveMasterBarang(event)">
                    <div class="form-group">
                        <label>SKU / Barcode</label>
                        <input type="text" class="form-control" id="m_sku" placeholder="Contoh: SKU-SPL-003" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" id="m_nama" placeholder="Contoh: Optical Power Meter" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori Jenis</label>
                        <select class="form-control" id="m_kategori">
                            <option value="Alat / Asset">Alat (Asset - SN Unik)</option>
                            <option value="Bahan / Consumable">Bahan (Consumable - Habis Pakai)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stok Minimum</label>
                        <input type="number" class="form-control" id="m_stok_min" placeholder="2" required>
                    </div>
                    <div class="form-group">
                        <label>Stok Awal</label>
                        <input type="number" class="form-control" id="m_stok_awal" placeholder="10" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" onclick="closeModal('modalMasterBarang')">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection