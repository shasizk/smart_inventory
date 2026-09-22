@extends ('be.master')
@section('smartlock')
<div id="view-smartlock" class="page-view active">
                <div class="panel">
                    <div class="panel-header">
                        <span class="panel-title">Kontrol & API Validator ESP32 Smart Lock</span>
                        <span style="color: var(--success); font-size: 0.85rem;"><i class="fa-solid fa-circle"></i> Connected (192.168.1.120)</span>
                    </div>
                    <p style="margin-bottom: 20px;">Klik tombol di bawah untuk mensimulasikan uji kunci relay solenoid ESP32:</p>
                    <div style="display: flex; gap: 10px;">
                        <button class="btn btn-primary" onclick="toggleLocker(1)"><i class="fa-solid fa-lock-open"></i> Unlock Slot 01</button>
                        <button class="btn btn-primary" onclick="toggleLocker(2)"><i class="fa-solid fa-lock-open"></i> Unlock Slot 02</button>
                    </div>
                </div>
            </div>



            
<!-- Modal 4: Scan Locker -->
    <div class="modal-overlay" id="modalScan">
        <div class="modal" style="text-align: center;">
            <div class="modal-header">
                <h3>Scan Barcode Locker ESP32</h3>
                <button class="modal-close" onclick="closeModal('modalScan')">&times;</button>
            </div>
            <div class="modal-body">
                <i class="fa-solid fa-qrcode" style="font-size: 5rem; color: var(--primary); margin-bottom: 16px;"></i>
                <p style="font-size: 0.9rem; margin-bottom: 16px;">Arahkan scanner barcode pengajuan Anda ke sensor locker.</p>
                <button class="btn btn-success" style="width: 100%; justify-content: center;" onclick="simulasiUnlock()">Simulasi Validation API Barcode</button>
            </div>
        </div>
    </div>

    @endsection