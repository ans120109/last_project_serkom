@extends('layout.app')

@section('content')
<style>
    .du-wrap { max-width: 825px; margin: 0 auto; padding: 30px 0 60px; }
    .du-head { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px; }
    .du-head h1 { margin: 0; font-size: 26px; font-weight: 500; color: #111; }
    .du-head p { margin: 8px 0 0; font-size: 13px; color: #777; }
    .du-btn-add { background: #d99a1e; color: #fff; padding: 9px 14px; border-radius: 6px;
                  font-size: 12px; font-weight: 700; text-decoration: none; }
    .du-btn-add:hover { background: #c58916; }

    .du-alert { padding: 12px 16px; border-radius: 6px; font-size: 14px; margin-bottom: 16px; }
    .du-alert-success { background: #dcfce7; color: #166534; }
    .du-alert-error { background: #fee2e2; color: #991b1b; }

    .du-card { background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,.06); overflow: hidden; }
    .du-table { width: 100%; border-collapse: collapse; font-size: 12px; }
    .du-table th { background: #f3f6f9; text-align: left; padding: 16px 12px; font-weight: 700; color: #111; }
    .du-table td { padding: 14px 12px; border-top: 1px solid #edf0f3; color: #222; vertical-align: middle; }

    .du-badge { display: inline-block; padding: 4px 10px; border-radius: 999px; font-size: 11px; font-weight: 700; }
    .du-badge-active { background: #dcfce7; color: #166534; }
    .du-badge-inactive { background: #fee2e2; color: #b91c1c; }

    .du-last small { display: block; color: #888; font-size: 11px; margin-top: 2px; }
    .du-last .du-old { color: #b91c1c; font-weight: 600; }

    .du-actions { white-space: nowrap; }
    .du-actions a, .du-actions button { font-size: 12px; font-weight: 600; color: #111;
        text-decoration: underline; background: none; border: none; padding: 0; cursor: pointer; font-family: inherit; }
    .du-actions .du-delete { color: #b91c1c; margin-left: 12px; }
    .du-actions form { display: inline; }
</style>

<div class="du-wrap">
    <div class="du-head">
        <div>
            <h1>Data User</h1>
            <p>Kelola akun admin, guru, dan siswa.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="du-btn-add">+ Tambah User</a>
    </div>

    @if (session('success'))
        <div class="du-alert du-alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="du-alert du-alert-error">{{ session('error') }}</div>
    @endif

    <div class="du-card">
        <table class="du-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Terakhir Aktif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ ucfirst($user->role) }}</td>

                        <td>
                            @if ($user->isInactive())
                                <span class="du-badge du-badge-inactive">● Tidak Aktif</span>
                            @else
                                <span class="du-badge du-badge-active">● Aktif</span>
                            @endif
                        </td>

                        <td class="du-last">
                            @if ($user->last_active_at)
                                <span class="{{ $user->isInactive() ? 'du-old' : '' }}">
                                    {{ $user->last_active_at->translatedFormat('d F Y, H:i') }}
                                </span>
                                <small>{{ $user->last_active_at->diffForHumans() }}</small>
                            @else
                                <small>Belum tercatat</small>
                            @endif
                        </td>

                        <td class="du-actions">
                            <a href="{{ route('admin.users.edit', $user) }}">Edit</a>

                            @if ($user->isInactive() && $user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                      onsubmit="return confirm('Hapus akun {{ $user->name }}?\nTerakhir aktif: {{ $user->last_active_at ? $user->last_active_at->translatedFormat('d F Y') : 'tidak tercatat' }}.\nTindakan ini tidak bisa dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="du-delete">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;color:#888;padding:30px">Belum ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
