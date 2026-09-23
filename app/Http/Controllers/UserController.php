<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private function roleLabels(): array
    {
        return [
            'super_admin' => 'Super Admin',
            'admin' => 'Admin',
            'teknisi' => 'Teknisi',
            'noc' => 'NOC',
        ];
    }

    private function roleClasses(): array
    {
        return [
            'super_admin' => 'pill-purple',
            'admin' => 'pill-blue',
            'teknisi' => 'pill-green',
            'noc' => 'pill-amber',
        ];
    }

    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [
            'title' => 'User Manager',
            'users' => $users,
            'roleLabels' => $this->roleLabels(),
            'roleClasses' => $this->roleClasses(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => ['required', 'in:super_admin,admin,teknisi,noc'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:super_admin,admin,teknisi,noc'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return redirect()->route('users.index')->with('error', 'Anda tidak bisa menghapus user yang sedang login.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'employee_id' => ['nullable', 'string', 'max:50', 'unique:users,employee_id,' . $user->id],
            'barcode' => ['nullable', 'string', 'max:100', 'unique:users,barcode,' . $user->id],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'employee_id' => $request->employee_id,
            'barcode' => $request->barcode,
        ];

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $data['profile_photo_path'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile')->with('success', 'Password berhasil diperbarui.');
    }
}