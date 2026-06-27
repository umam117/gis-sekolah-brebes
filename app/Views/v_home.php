<div id="map" style="width: 100%; height: 800px;"></div>

<script>

	// OpenStreetMap
var peta1 = L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
attribution:'© OpenStreetMap'
});


// Satellite (Esri)
var peta2 = L.tileLayer(
'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',{
attribution:'© Esri'
});


// Night (Carto Dark)
var peta3 = L.tileLayer(
'https://basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png',{
attribution:'© CARTO'
});


// Modern (Carto Light)
var peta4 = L.tileLayer(
'https://basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png',{
attribution:'© CARTO'
});


// Tampilkan map awal
var map = L.map('map',{
center: [<?= $web['coordinat_wilayah']?>],
zoom: <?= $web['zoom_view']?>,
layers:[peta1]
});


// Layer control
var baseMaps = {
"OpenStreetMap": peta1,
"Satellite": peta2,
"Streets": peta3,
"Night": peta4,
};

 var layerControl = L.control.layers(baseMaps).addTo(map);

     <?php foreach ($wilayah as $key => $value) { ?>
        L.geoJSON(<?= $value['geojson'] ?? '{}' ?>, {
            fillColor: '<?= $value['warna'] ?? '#3388ff' ?>',
            fillOpacity: 0.5,
        })
        .bindPopup("<b><?= $value['nama_wilayah'] ?? 'Tanpa Nama' ?></b>")
        .addTo(map);
    <?php } ?>
</script>