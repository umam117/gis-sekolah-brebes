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
                <a href="#" class="btn btn-sm btn-warning btn-flat">
                    <i class="fas fa-map-marker-alt"></i> Ganti Marker
                </a>
            </td>
        </tr>
    <?php } ?>
</tbody>



            </table>

        </div>
    </div>
</div>


