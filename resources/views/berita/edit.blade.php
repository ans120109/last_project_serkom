@extends('layout.app')

@section('title', 'Edit Berita')

@section('content')
<main class="content">
    <div class="container">

        <h1 class="page-title">Edit Berita</h1>
        <p class="page-subtitle">Perbarui informasi berita di bawah ini.</p>
        <hr class="divider">

        @if ($errors->any())
            <div style="background:#f8d7da; color:#721c24; padding:12px 16px; border-radius:5px; margin-bottom:16px;">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('berita.update', $berita->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Judul <span style="color:red;">*</span>
                    </label>
                    <input type="text"
                           name="judul"
                           value="{{ old('judul', $berita->judul) }}"
                           required
                           style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                </div>

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Isi Berita <span style="color:red;">*</span>
                    </label>
                    <textarea name="isi"
                              rows="6"
                              required
                              style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">{{ old('isi', $berita->isi) }}</textarea>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px;">Penulis</label>
                        <input type="text"
                               name="penulis"
                               value="{{ old('penulis', $berita->penulis) }}"
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                    <div>
                        <label style="display:block; font-weight:600; margin-bottom:6px;">Tanggal</label>
                        <input type="date"
                               name="tanggal"
                               value="{{ old('tanggal', optional($berita->tanggal)->format('Y-m-d')) }}"
                               style="width:100%; padding:8px 12px; border:1px solid #ccc; border-radius:4px; font-size:14px;">
                    </div>
                </div>

                <div style="margin-bottom:20px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">
                        Foto <span style="color:#888; font-weight:400;">(biarkan kosong jika tidak diganti)</span>
                    </label>
                    <input type="file"
                           name="foto"
                           accept="image/*"
                           style="width:100%; padding:6px; border:1px solid #ccc; border-radius:4px;">

                    @if ($berita->foto)
                        <div style="margin-top:12px;">
                            <p class="muted" style="margin-bottom:6px;">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $berita->foto) }}"
                                 alt="{{ $berita->judul }}"
                                 style="max-height:180px; border-radius:6px; border:1px solid #ddd;">
                        </div>
                    @endif
                </div>

                <div class="action-buttons" style="margin-top:20px; padding-top:16px; border-top:1px solid #eee;">
                    <button type="submit" class="btn-action">
                        Update
                    </button>
                    <a href="{{ route('berita.index') }}" class="btn-action" style="background:#6c757d;">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</main>
@endsection
