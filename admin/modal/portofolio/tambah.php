<div class="modal fade" id="tambahporto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="action/portofolio/proses_tambah.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="col">
                            <label class="form-label">Gambar Portofolio</label>
                            <input type="file" class="form-control" name="foto" id="foto" onchange="previewImage(event)">
                        </div>
                    </div>
                    <center>
                        <img id="preview" src="" alt="Preview Gambar" style="max-width: 300px; height:300px; margin-top: 10px;">
                    </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        
        reader.onload = function(){
            const preview = document.getElementById('preview');
            preview.src = reader.result;
        }
        
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>