@extends('layout.app')

@section('title', 'Data User')

@push('styles')
<style>
    .du-header { display: flex; justify-content: space-between; align-items: flex-start;
                 gap: 16px; margin-bottom: 20px; }
    .du-header h1 { margin-bottom: 2px; }
    .du-header p { margin: 0; color: #6f7782; font-size: 16px; }

    .user-card { background: #fff; border-radius: 10px; box-shadow: 0 4px 14px rgba(0,0,0,.07);
                 overflow: hidden; }
    .user-table { width: 100%; border-collapse: collapse; }
    .user-table th { background: #f4f8fb; text-align: left; padding: 18px 16px; font-size: 15px; }
    .user-table td { padding: 18px 16px; border-top: 1px solid #f0f0f0; font-size: 15px; }
    .user-table tr:hover td { background: #fafafa; }
    .user-empty { text-align: center; color: #9ca3af; padding: 24px !important; }

    .link-edit { color: #0d1b3e; font-weight: 600; text-decoration: underline; }
    .link-edit:hover { color: #d99a22; }

    .status-badge { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px;
                    border-radius: 999px; font-size: 13px; font-weight: 600; }
    .status-badge::before { content: ""; width: 8px; height: 8px; border-radius: 50%;
                            background: currentColor; }
    .status-aktif { background: #dcfce7; color: #166534; }
    .status-nonaktif { background: #fee2e2; color: #b91c1c; }

    .alert-ok { background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px;
                margin-bottom: 16px; }
</style>
@endpush

@section('content')
    <div class="du-header">
        <div>
            <h1>Data User</h1>
            <p>Kelola akun admin, guru, dan siswa.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn">+ Tambah User</a>
    </div>

    @if(session('success'))
        <div class="alert-ok">{{ session('success') }}</div>
    @endif

    <div class="user-card">
        <div style="overflow-x:auto">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        @php
                            $aktif = in_array(strtolower((string) $user->status), ['1', 'aktif', 'active', 'true']);
                        @endphp
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                @if($aktif)
                                    <span class="status-badge status-aktif">Aktif</span>
                                @else
                                    <span class="status-badge status-nonaktif">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="link-edit">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="user-empty">Belum ada data user.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
