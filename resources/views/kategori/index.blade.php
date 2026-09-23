@extends('be.master')

@section('basup')
<div class="panel">
    <div class="panel-header">
        <span class="panel-title">Master Data Kategori Barang</span>
        <button class="btn btn-primary" onclick="openModal('modalAddKategori')">
            <i class="fa-solid fa-plus"></i> Tambah Kategori
        </button>
    </div>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoris as $kat)
                <tr>
                    <td><strong>{{ $kat->kategori_id }}</strong></td>
                    <td>{{ $kat->nama_kategori }}</td>
                    <td>{{ $kat->catatan ?? '-' }}</td>
                    <td style="display: flex; gap: 6px;">
                        <button class="btn btn-outline" onclick="editKategori({{ $kat->id_kategori }}, '{{ $kat->nama_kategori }}', '{{ $kat->catatan }}')">
                            Edit
                        </button>
                        <form action="{{ route('kategori.destroy', $kat->id_kategori) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="color: var(--danger); border-color: var(--danger);">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: var(--text-muted);">Belum ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal 1: Tambah Kategori -->
<div class="modal-overlay" id="modalAddKategori">
    <div class="modal">
        <div class="modal-header">
            <h3>Tambah Kategori Baru</h3>
            <button class="modal-close" onclick="closeModal('modalAddKategori')">&times;</button>
        </div>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Contoh: Alat Fiber Optic" required>
                </div>
                <div class="form-group">
                    <label>Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Keterangan opsional..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeModal('modalAddKategori')">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal 2: Edit Kategori -->
<div class="modal-overlay" id="modalEditKategori">
    <div class="modal">
        <div class="modal-header">
            <h3>Edit Kategori</h3>
            <button class="modal-close" onclick="closeModal('modalEditKategori')">&times;</button>
        </div>
        <form id="formEditKategori" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="edit_nama_kategori" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Catatan</label>
                    <textarea name="catatan" id="edit_catatan" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeModal('modalEditKategori')">Batal</button>
                <button type="submit" class="btn btn-primary">Update Kategori</button>
            </div>
        </form>
    </div>
</div>

<script>
    function editKategori(id, nama, catatan) {
        document.getElementById('formEditKategori').action = '/kategori/' + id;
        document.getElementById('edit_nama_kategori').value = nama;
        document.getElementById('edit_catatan').value = catatan;
        openModal('modalEditKategori');
    }
</script>
@endsection