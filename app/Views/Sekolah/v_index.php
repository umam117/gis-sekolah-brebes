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

            <!-- Tabel HTML Pas 4 Kolom -->
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="50px" class="text-center">No</th>
                        <th class="text-center">Nama Sekolah</th>
                        <th width="150px" class="text-center">Status</th>
                        <th width="150px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (!empty($sekolah) && is_array($sekolah)) :
                        foreach ($sekolah as $key => $value) : ?>
                            <tr>
                                <!-- Kolom 1: Nomor -->
                                <td class="text-center"><?= $no++; ?></td>
                                
                                <!-- Kolom 2: Nama Sekolah -->
                                <td><?= $value['nama_sekolah'] ?></td>
                                
                                <!-- Kolom 3: Status -->
                                <td><?= $value['status'] ?></td>
                                
                                <!-- Kolom 4: Aksi (Huruf Akreditasi + Tombol Kuning & Merah) -->
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span><?= $value['akreditasi'] ?></span>
                                        <div>
                                            <a href="<?= base_url('Sekolah/Edit/' . $value['id_sekolah']) ?>" class="btn btn-sm btn-flat btn-warning" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('Sekolah/Delete/' . $value['id_sekolah']) ?>" class="btn btn-sm btn-flat btn-danger" onclick="return confirm('Yakin ingin menghapus data sekolah ini?')" title="Hapus Data">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Data sekolah tidak tersedia di database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script DataTables Tetap Dipertahankan -->
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

