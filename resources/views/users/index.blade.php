@extends('be.master')

@section('users')
<div id="view-users" class="page-view active">
    <div class="panel">
        <div class="panel-header">
            <span class="panel-title">Manajemen User System</span>
            <button type="button" class="btn btn-primary" onclick="openAddUserModal()">
                <i class="fa-solid fa-user-plus"></i> Tambah User
            </button>
        </div>

        @if (session('success'))
            <div class="alert alert-success" style="margin: 0 0 16px;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" style="margin: 0 0 16px;">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" style="margin: 0 0 16px;">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            <span class="pill {{ $roleClasses[$user->role] ?? 'pill-blue' }}">
                                {{ $roleLabels[$user->role] ?? ucfirst(str_replace('_', ' ', $user->role)) }}
                            </span>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td><span class="pill pill-green">Active</span></td>
                        <td>
                            <div style="display:flex; gap:8px; align-items:center;">
                                <button
                                    type="button"
                                    class="btn btn-outline"
                                    onclick="openEditUserModal({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}', '{{ $user->role }}')">
                                    Edit
                                </button>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;">Belum ada data user</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal-overlay" id="modalUser">
    <div class="modal">
        <div class="modal-header">
            <h3 id="userModalTitle">Tambah User Akses Baru</h3>
            <button type="button" class="modal-close" onclick="closeModal('modalUser')">&times;</button>
        </div>

        <div class="modal-body">
            <form id="userForm" method="POST" action="{{ route('users.store') }}">
                @csrf
                <input type="hidden" name="_method" id="userMethod" value="POST">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" id="u_nama" placeholder="Dedi Supriadi" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="u_email" placeholder="dedi@karlink.id" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="u_password"
                        placeholder="Minimal 8 karakter"
                        required>
                </div>

                <div class="form-group">
                    <label>Role Hak Akses</label>
                    <select class="form-control" name="role" id="u_role">
                        <option value="teknisi">Teknisi</option>
                        <option value="noc">NOC</option>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" onclick="closeModal('modalUser')">Batal</button>
                    <button type="submit" id="userSubmitBtn" class="btn btn-primary">Simpan User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openAddUserModal() {
        const form = document.getElementById('userForm');
        const method = document.getElementById('userMethod');
        const title = document.getElementById('userModalTitle');
        const submitBtn = document.getElementById('userSubmitBtn');
        const passwordInput = document.getElementById('u_password');

        form.action = "{{ route('users.store') }}";
        method.value = 'POST';
        title.textContent = 'Tambah User Akses Baru';
        submitBtn.textContent = 'Simpan User';

        passwordInput.required = true;
        passwordInput.placeholder = 'Minimal 8 karakter';
        passwordInput.value = '';

        form.reset();
        openModal('modalUser');
    }

    function openEditUserModal(id, name, email, role) {
        const form = document.getElementById('userForm');
        const method = document.getElementById('userMethod');
        const title = document.getElementById('userModalTitle');
        const submitBtn = document.getElementById('userSubmitBtn');
        const passwordInput = document.getElementById('u_password');

        form.action = '/users/' + id;
        method.value = 'PUT';
        title.textContent = 'Edit User';
        submitBtn.textContent = 'Update User';

        document.getElementById('u_nama').value = name;
        document.getElementById('u_email').value = email;
        document.getElementById('u_role').value = role;

        passwordInput.required = false;
        passwordInput.placeholder = 'Kosongkan jika tidak ingin ganti password';
        passwordInput.value = '';

        openModal('modalUser');
    }
</script>
@endsection