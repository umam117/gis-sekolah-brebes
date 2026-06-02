<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('Sekolah/Input') ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>

        <div class="card-body">
            <?php if (session()->getFlashdata('sukses_tambah')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    <?= session()->getFlashdata('sukses_tambah') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('sukses_edit')) : ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <h5><i class="icon fas fa-info"></i> Berhasil!</h5>
                    <?= session()->getFlashdata('sukses_edit') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('sukses_hapus')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5><i class="icon fas fa-trash"></i> Terhapus!</h5>
                    <?= session()->getFlashdata('sukses_hapus') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th class="text-center">Nama Sekolah</th>
                        <th width="100px" class="text-center">Status</th>
                        <th width="100px" class="text-center">Akreditasi</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Foto</th>
                        <th width="150px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (!empty($sekolah) && is_array($sekolah)) :
                        foreach ($sekolah as $key => $value) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $value['nama_sekolah'] ?></td>
                                <td class="text-center"><?= $value['status'] ?></td>
                                <td class="text-center"><?= $value['akreditasi'] ?></td>
                                <td><?= $value['alamat'] ?></td>
                                <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="150px" height="100px"></td>
                                <td class="text-center">
                                    <a href="<?= base_url('Sekolah/Detail/' . $value['id_sekolah']) ?>" class="btn btn-sm btn-flat btn-info" title="Detail Data">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('Sekolah/Edit/' . $value['id_sekolah']) ?>" class="btn btn-sm btn-flat btn-warning" title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('Sekolah/Delete/' . $value['id_sekolah']) ?>" class="btn btn-sm btn-flat btn-danger" onclick="return confirm('Yakin ingin menghapus data sekolah ini?')" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Data sekolah tidak tersedia di database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
  $(function () {
    if (!$.fn.DataTable.isDataTable('#example1')) {
        $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true
        });
    }
  });
</script>
