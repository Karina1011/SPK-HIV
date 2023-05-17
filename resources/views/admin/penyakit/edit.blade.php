<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group mb-1">
    <label for="nama_penyakit">Nama Penyakit</label>
    <input type="text" name="nama_penyakit" class="form-control @error('nama_penyakit') is-invalid @enderror" value="{{ old('nama_penyakit') }}{{ $edit->nama_penyakit }}" required>
    @error('nama_penyakit')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-1">
    <label for="kode_penyakit">Kode Penyakit</label>
    <input type="text" class="form-control" name="kode_penyakit" id="kode_penyakit"
        placeholder="Input Kode Penyakit" 
        @error('kode_penyakit') is-invalid @enderror value="{{ old('kode_penyakit') }}{{ $edit->kode_penyakit }}" required>
    @error('kode_penyakit')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-1">
    <label for="solusi">Solusi</label>
    <textarea class="form-control @error('solusi') is-invalid @enderror" name="solusi" id="edit" rows="3" placeholder="Masukan artikel">{{ old('solusi', $edit->solusi) }}</textarea>
    @error('solusi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<script>
    CKEDITOR.replace('edit');
</script>