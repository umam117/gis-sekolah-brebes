<div class="col-md-12">

    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">

            <?php if (session()->getFlashdata('sukses_tambah')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5 class="font-weight-bold mb-0">
                        <i class="icon fas fa-check mr-2"></i> <?= session()->getFlashdata('sukses_tambah') ?>
                    </h5>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('sukses_edit')) : ?>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5 class="font-weight-bold mb-0">
                        <i class="icon fas fa-info mr-2"></i> <?= session()->getFlashdata('sukses_edit') ?>
                    </h5>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('sukses_hapus')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5 class="font-weight-bold mb-0">
                        <i class="icon fas fa-ban mr-2"></i> <?= session()->getFlashdata('sukses_hapus') ?>
                    </h5>
                </div>
            <?php endif; ?>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Jenjang</th>
                        <th>Marker</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($jenjang as $key => $value) { ?>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;"><?= $no++; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $value['jenjang'] ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <?php if(!empty($value['marker'])): ?>
                                    <img src="<?= base_url('marker/' . strtolower($value['marker'])) ?>" width="75px" alt="Marker">
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada gambar</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <button type="button" class="btn btn-sm btn-warning btn-flat btn-ganti-marker" data-id="<?= $value['id_jenjang'] ?>" data-jenjang="<?= $value['jenjang'] ?>">
                                    <i class="fas fa-map-marker-alt"></i> Ganti Marker
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="modal fade" id="modalMarker" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Jenjang/UpdateMarker') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Marker - <span id="nama-jenjang"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_jenjang" id="input-id">
                    <div class="form-group">
                        <label>Pilih File Gambar (.png)</label>
                        <input type="file" name="marker" class="form-control" accept="image/png" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://jquery.com"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '.btn-ganti-marker', function() {
        var id = $(this).data('id');
        var jenjang = $(this).data('jenjang');
        $('#input-id').val(id);
        $('#nama-jenjang').text(jenjang);
        $('#modalMarker').modal('show');
    });
});
</script>
