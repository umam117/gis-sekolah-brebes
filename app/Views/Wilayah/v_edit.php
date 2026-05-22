<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Wilayah</h3>
        </div>
        
        <form action="<?= base_url('Wilayah/Update/' . $wilayah['id_wilayah']) ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Wilayah</label>
                            <input type="text" name="nama_wilayah" class="form-control <?= (session('errors.nama_wilayah')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_wilayah') ?? $wilayah['nama_wilayah'] ?>" placeholder="Contoh: Kecamatan Bumiayu">
                            <?php if (session('errors.nama_wilayah')) : ?>
                                <small class="text-danger font-weight-bold d-block mt-1"><?= session('errors.nama_wilayah') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Warna Wilayah</label>
                            <input type="text" name="warna" class="form-control my-colorpicker <?= (session('errors.warna')) ? 'is-invalid' : ''; ?>" value="<?= old('warna') ?? $wilayah['warna'] ?>">
                            <?php if (session('errors.warna')) : ?>
                                <small class="text-danger font-weight-bold d-block mt-1"><?= session('errors.warna') ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>GeoJSON</label>
                    <textarea name="geojson" class="form-control <?= (session('errors.geojson')) ? 'is-invalid' : ''; ?>" rows="10" placeholder="Tempelkan (paste) kode GeoJSON di sini..."><?= old('geojson') ?? $wilayah['geojson'] ?></textarea>
                    <?php if (session('errors.geojson')) : ?>
                        <small class="text-danger font-weight-bold d-block mt-1"><?= session('errors.geojson') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('Wilayah') ?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        if (typeof $.fn.colorpicker !== 'undefined') {
            $('.my-colorpicker').colorpicker();
        }
    });
</script>
