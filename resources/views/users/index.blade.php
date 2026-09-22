@extends ('be.master')
@section('users')
 <div id="view-users" class="page-view active">
                <div class="panel">
                    <div class="panel-header">
                        <span class="panel-title">Manajemen User System</span>
                        <button class="btn btn-primary" onclick="openModal('modalUser')"><i class="fa-solid fa-user-plus"></i> Tambah User</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <tr>
                                <td>Alex Johnson</td>
                                <td><span class="pill pill-blue">Super Admin</span></td>
                                <td>alex@karlink.id</td>
                                <td><span class="pill pill-green">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


<!-- Modal 5: Tambah User -->
    <div class="modal-overlay" id="modalUser">
        <div class="modal">
            <div class="modal-header">
                <h3>Tambah User Akses Baru</h3>
                <button class="modal-close" onclick="closeModal('modalUser')">&times;</button>
            </div>
            <div class="modal-body">
                <form onsubmit="saveUser(event)">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="u_nama" placeholder="Dedi Supriadi" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="u_email" placeholder="dedi@karlink.id" required>
                    </div>
                    <div class="form-group">
                        <label>Role Hak Akses</label>
                        <select class="form-control" id="u_role">
                            <option value="Teknisi">Teknisi</option>
                            <option value="NOC">NOC</option>
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" onclick="closeModal('modalUser')">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection