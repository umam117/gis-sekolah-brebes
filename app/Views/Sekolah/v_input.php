<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Input Sekolah</h3>
        </div>
        
        <form action="<?= base_url('Sekolah/Simpan') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control" required placeholder="Nama Sekolah">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Akreditasi</label>
                            <input type="text" name="akreditasi" class="form-control" required placeholder="Akreditasi">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">--Pilih Status--</option>
                        <option value="Negeri">Negeri</option>
                        <option value="Swasta">Swasta</option>
                    </select>
                </div>
                
            <div class="form-group">
    <label>Peta Lokasi</label>
    <div id="map" style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 4px;"></div>
</div>

<div class="form-group">
    <label>Coordinat Sekolah</label>
    <input type="text" name="coordinat" id="coordinat" class="form-control" readonly required placeholder="Coordinat Sekolah">
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Provinsi</label>
            <select name="provinsi" class="form-control">
                </select>
        </div>
    </div>
    </div>

            <div class="form-group">
                    <label>Kabupaten</label>
                    <select name="id_kabupaten" class="form-control" required>
                    </select>
                </div>

            <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="id_kecamatan" class="form-control" required>
                    </select>
                </div>

            <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="coordinat" id="coordinat" class="form-control" required placeholder="Alamat">
                </div>
            </div>
            
            <div class="form-group">
                    <label>Wilayah Administrasi</label>
                    <select name="id_provinsi" class="form-control" required>
                </select>
            </div>

            <div class="form-group">
                    <label>Foto Sekolah</label>
                    <input type="file" accept=".jpg"name="foto" id="foto" class="form-control">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('Sekolah') ?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    // 1. Inisialisasi Peta
    var map = L.map('map', {
        center: [<?= $web['coordinat_wilayah'] ?>],
        zoom: <?= $web['zoom_view'] ?>
    });

    // 2. Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // 3. Plot Wilayah
    <?php if (!empty($wilayah)) { foreach ($wilayah as $key => $value) { ?>
        L.geoJSON(<?= json_encode(json_decode($value['geojson'] ?? '{}')) ?>, {
            style: { 
                color: '<?= $value['warna'] ?? '#3388ff' ?>', 
                fillOpacity: 0.5 
            }
        })
        .bindPopup("<b><?= addslashes($value['nama_wilayah'] ?? 'Tanpa Nama') ?></b>")
        .addTo(map);
    <?php }} ?>

    // 4. Marker Klik untuk koordinat
    var marker;
    map.on('click', function(e) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(map);
        // Mengisi input koordinat
        document.getElementById('coordinat').value = e.latlng.lat + "," + e.latlng.lng;
    });

    var coordinat = document.querySelector("[name=cordinat]");
    var curLocation = [<?= $web['coordinat_wilayah'] ?>];
    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation,{
        draggable : 'true',
    });


    //mengambil coordinat saat marker di geser
    marker.on('dragend',function (e) {
        var position = marker.getLating();
        marker.setLatlng(position, {
            curLocation
        }).bindPopup(position).update();
    });

    map.addlayer(marker);
</script>