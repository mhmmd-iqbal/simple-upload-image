<div style="padding: 0px 20px">
	<div>
		<nav aria-label="breadcrumb" style="padding-top: 10px;">
		  <ol class="breadcrumb" style="height: 40px;">
		    <li class="breadcrumb-item active"><small>Home</small></li>
		  </ol>
		</nav>
	</div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
            	<form
            		enctype="multipart/form-data"
            		method="post"
            		id="submitForm" >
	                <div class="card-body">
	                    <div class="custom-file">
	                        <input 
	                        	type="file" 
	                        	id="inputFile" 
	                        	class="imgFile custom-file-input" 
	                        	aria-describedby="inputGroupFileAddon01"
	                        	accept="image/*"
	                        	name="gambar" >
	                        <input type="hidden" id="site_url" value="<?=site_url()?>">
	                        <input type="hidden" id="base_url" value="<?=base_url()?>">
	                        <label class="custom-file-label" for="inputFile">Choose file</label>
	                    </div>
	                </div>
	                <hr>
	                <div class="imgWrap mb-1 text-center">
	                    <img 
	                    	src="<?=base_url()?>assets/logo/no_image.png" 
	                    	id="imgView" 
	                    	style="max-height: 300px; width: auto;"
	                    	class="card-img-top img-fluid" />
	                </div>
	                <div class="mb-3" style="margin: 0px 10px">
	                	<button class="btn btn-block btn-success" type="submit">Upload File</button>
	                </div>
            	</form>
            </div>
        </div>
  		
    	<div class="col-lg-9">
    		<div class="card">
    			<div class="card-body" >
				 	<div class="">
			    		<table class="table table-bordered table-striped" id="mydata">
			    			<thead>
			    				<tr>
			    					<th width="10px">No</th>
			    					<th width="200px">Review</th>
			    					<th width="200px">File Description</th>
			    					<th width="200px">Uploaded At</th>
			    					<th width="100px">Action</th>
			    				</tr>
			    			</thead>
			    		</table>
				 	</div>
    			</div>	
    		</div>
    	</div>
    </div>
</div>


<div class="modal fade" id="modal-id">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title judul"></h4>
			</div>
			<div class="modal-body">
				<div class="gambar"></div>				
				<hr>
				<div class="row">
					<div class="col-lg-2">
						<label for="">Judul Gambar</label>
					</div>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="namaFile">
					</div>
				</div>
			</div>	
			<div class="modal-footer">
				<button class="btn btn-info update"><i class="fa fa-pencil"></i> Ganti Nama</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

