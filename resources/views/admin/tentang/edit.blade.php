<input type="hidden" name="id" value="{{ $data_tentang->id }}">
<input type="hidden" name="gambarLama" value="{{$data_tentang->image}}">
<div class="form-group mb-1">
    <label for="judul">Judul </label>
    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}{{ $data_tentang->judul }}" required>
    @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-1">
    <label for="isi">Isi</label>
    <textarea name="isi" class="form-control @error('isi') is-invalid @enderror"
     id="edit" >{{old('isi',$data_tentang->isi)}}
    </textarea>
    @error('isi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="image"> Gambar </label>
    <br><br>
    <img src="{{ url('/storage/' .$data_tentang->image)}}" style="width: 20%;"><br><br>
    <input type="file" class="form-control  " name="image" id="image">
</div>

<script>
    CKEDITOR.replace('edit');
</script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>