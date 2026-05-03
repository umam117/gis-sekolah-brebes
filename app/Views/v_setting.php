<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
               <?php echo form_open()?>
              
              
                  
                  <div class="row">
                    <div class="col-sm-7">
                      <div class="form-group">
                        <label>Nama Website</label>
                        <input name="nama_web" class="form-control" placeholder="Nama Website">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                    <label>Coordinat Wilayah</label>
                    <input name="coordinat_wilayah" class="form-control" placeholder="Coordinat Wilayah">
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                        <label>Zoom View</label>
                        <input type="number" name="coordinat_wilayah" min="0" max="20" class="form-control" placeholder="Coordinat Wilayah">
                    </div> 
                  </div>
                </div>  



                <button class="btn-btn-prymary" type="submit">Simpan</button>
            

              <?php echo form_close()?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


<div class="col-md-12">
   <div id="map" style="width: 100%; height: 800px;"></div>
</div>


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
center: [-6.2,106.8],
zoom: 10,
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
</script>         