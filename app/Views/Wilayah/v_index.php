<div class="col-md-12">

    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('Wilayah/Input') ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
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
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $value['nama_wilayah'] ?></td>
                            <td style="background-color: <?= $value['warna'] ?>;"></td>
                            <td class="text-center">
                                <a href="<?= base_url('Wilayah/Edit/' . $value['id_wilayah']) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('Wilayah/Delete/' . $value['id_wilayah']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data..?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="col-md-12">
    <div id="map" style="width: 100%; height: 800px;"></div>
</div>

<script>
    var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap' });
    var peta2 = L.tileLayer('https://arcgisonline.com{z}/{y}/{x}', { attribution: '© Esri' });
    var peta3 = L.tileLayer('https://cartocdn.com{z}/{x}/{y}{r}.png', { attribution: '© CARTO' });
    var peta4 = L.tileLayer('https://cartocdn.com{z}/{x}/{y}{r}.png', { attribution: '© CARTO' });

    var map = L.map('map', {
        center: [-7.0051, 108.9483],
        zoom: 10,
        layers: [peta1]
    });

    var baseMaps = { "OpenStreetMap": peta1, "Satellite": peta2, "Streets": peta3, "Night": peta4 };
    var layerControl = L.control.layers(baseMaps).addTo(map);

    <?php foreach ($wilayah as $key => $value) { ?>
        L.geoJSON(<?= $value['geojson'] ?? '{}' ?>, {
            fillColor: '<?= $value['warna'] ?? '#3388ff' ?>',
            fillOpacity: 0.5,
        })
        .bindPopup("<b><?= $value['nama_wilayah'] ?? 'Tanpa Nama' ?></b>")
        .addTo(map);
    <?php } ?>

    $(document).ready(function () {
        $('#example1').DataTable({ responsive: true, autoWidth: false, lengthChange: true, searching: true, paging: true, ordering: true, info: true });
    });
</script>
