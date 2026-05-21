<div class="col-md-12">

    <div class="card card-outline card-primary">

        <div class="card-header">

            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
                <button type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse">

                    <i class="fas fa-minus"></i>

                </button>
            </div>

        </div>

        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">

                <thead>

                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama Wilayah</th>
                        <th>Warna</th>
                        <th width="100px">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    foreach ($wilayah as $key => $value) { ?>

                        <tr>

                            <td class="text-center">
                                <?= $no++; ?>
                            </td>

                            <td>
                                <?= $value['nama_wilayah'] ?>
                            </td>

                            <td style="background-color: <?= $value['warna'] ?>;">
                            </td>

                            <td class="text-center">

                                <button class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>
    $(document).ready(function () {

        $('#example1').DataTable({
            responsive: true,
            autoWidth: false,
            lengthChange: true,
            searching: true,
            paging: true,
            ordering: true,
            info: true
        });

    });
</script>