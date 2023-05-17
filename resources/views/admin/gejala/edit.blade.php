<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group mb-1">
    <label for="nama_gejala">Nama Gejala</label>
    <input type="text" name="nama_gejala" class="form-control @error('nama_gejala') is-invalid @enderror" value="{{ old('nama_gejala') }}{{ $edit->nama_gejala }}" required>
    @error('nama_gejala')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group mb-1">
    <label for="kode_gejala">Kode Gejala</label>
    <input type="text" class="form-control" name="kode_gejala" id="kode_gejala"
        placeholder="Input Kode gejala" 
        @error('kode_gejala') is-invalid @enderror value="{{ old('kode_gejala') }}{{ $edit->kode_gejala }}" required>
    @error('kode_gejala')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
{{-- <div class="form-group mb-1">
    <label for="solusi">Solusi</label>
    <textarea class="form-control @error('solusi') is-invalid @enderror" name="solusi" id="edit" rows="3" placeholder="Masukan artikel">{{ old('solusi', $edit->solusi) }}</textarea>
    @error('solusi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div> --}}
<script>
    CKEDITOR.replace('edit');
</script>