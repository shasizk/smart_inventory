@extends ('be.master')
@section('laporan')
<div id="view-laporan" class="page-view active">
                <div class="panel">
                    <div class="panel-header">
                        <span class="panel-title">Laporan & Kartu Stok</span>
                        <button class="btn btn-primary" onclick="downloadPDF()"><i class="fa-solid fa-file-pdf"></i> Download PDF</button>
                    </div>
                    <p style="margin-bottom: 12px; font-weight: 600;">Pilih Filter Laporan:</p>
                    <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                        <input type="date" class="form-control" style="width: 180px;" value="2026-09-01">
                        <input type="date" class="form-control" style="width: 180px;" value="2026-09-21">
                        <button class="btn btn-outline" onclick="alert('Filter diterapkan!')">Terapkan Filter</button>
                    </div>
                </div>
            </div>

    @endsection