<style>
	.btn-file {
		position: relative;
		overflow: hidden;
	}
	.btn-file input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		min-width: 100%;
		min-height: 100%;
		font-size: 999px;
		text-align: right;
		filter: alpha(opacity=0);
		opacity: 0;
		outline: none;
		background: white;
		cursor: inherit;
		display: block;
	}
	</style>

<div id="about" class="region">
      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center block">
            <h3>Upload Your Video</h3>
            <p>Dengan mengirimkan video ke Video+, Anda menyatakan bahwa Anda setuju dengan <a href="">Persyaratan Layanan</a> dan <a href="#">Pedoman Komunitas</a> Video+. 
			Pastikan Anda tidak melanggar hak cipta atau hak privasi orang lain.</p>
			
			<form role="form" id="bigUploadForm" enctype="multipart/form-data">		
				<span class="btn btn-primary btn-file btn-block margin-top-50">
					<i class="icon ion-upload"></i> Choose Video to upload <input type="file" id="bigUploadFile" name="bigUploadFile" />
				</span>
			</form>
			<!-- <input type="button" class="bigUploadButton btn-default" value="Start Upload" id="bigUploadSubmit" onclick="upload()" /> -->
          </div> <!-- /col-xs-12 -->
          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center block">
          	<h4><div class="urlwatch"></div></h3>
          </div>
        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /about -->
	
	<div id="services" class="region bg-color-grayLight1">
      <div class="container">
        <div class="row">
		 <div class="col-xs-12 col-md-8 col-md-offset-2 text-center block">
            <h3><div id="bigUploadTimeRemaining"></div></h3>
            	
				<div id="bigUploadResponse"></div>
				<div class="progress" id="bigUploadProgressBarContainer">
                  	<div class="progress-bar progress-bar-red" id="bigUploadProgressBarFilled">
                  	</div> <!-- /progress-bar -->
                </div> <!-- /progress -->
				
				<!-- Nav tabs -->
				<ul class="nav nav-tabs margin-top-50" role="tablist">
				  <li class="active"><a href="#basic" role="tab" data-toggle="tab">Basic</a></li>
				  <li><a href="#advance" role="tab" data-toggle="tab">Advance</a></li>
				 
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="basic">
						
						<form method="POST" role="form" id="basicvideo" action="{{ route('video.informasi.add') }}">
						  
						  <div class="form-group">
							<input type="hidden" id="video_id" name="video_id"><input type="text" name="name" class="form-control" id="name" placeholder="Name"></textarea>
						  </div>
						  
						  <div class="form-group">
							<textarea type="text" name="description" class="form-control" id="description" placeholder="Description"></textarea>
						  </div>
						  
						  <div class="form-group">
							<input type="text" name="tags" class="form-control" id="tags" placeholder="Tag (Separate your tags with commas, please.)"></textarea>
						  </div>
						  
						  
						  
						  <button type="submit" class="btn btn-default btn-sm btn-block margin-top-50">Save Change</button>
						
				  	 
				  </div>
				  <div class="tab-pane" id="advance">
						
						<div class="form-group">
							{{ Form::select('category_id', array_merge(array(null=>'Category'), Category::newInstance()->lists('category','id') ), null , array('class'=>'form-control') ) }}							  
						</div>


						 
						  <div class="form-group">
							<select class="form-control" name="comment">
							  <option>Available to comment?</option>
							  <option value="yes">Yes</option>
							  <option value="no">No</option>
							</select>						  
						  </div>
						
						<div class="form-group">
							<select class="form-control" name="language">
							  <option>Language</option>
							  <option value="en">English</option>
							  <option value="id">Indonesia</option>
							</select>						  
						  </div>
						
						
						
						  
						   <div class="form-group">
						   	{{ Form::select('license_id', array_merge(array(null=>'License to your video'), License::lists('license','id') ), null , array('class'=>'form-control') ) }}							  				  
						  </div>
						
						
						  <button type="submit" class="btn btn-default btn-sm btn-block margin-top-50">Save Change</button>
						</form>
				  
				  </div>
				 
				</div>
				
				
		 </div>
        

        </div> <!-- /row -->
        <script type="text/javascript">
				  		$(function(){
				  			$("#basicvideo").submit(function(e)
							{	
								if($('#video_id')==='') return;
							    var postData = $(this).serializeArray();
							    var formURL = $(this).attr("action");
							    $.ajax(
							    {
							        url : formURL,
							        type: "POST",
							        data : postData,
							        success:function(data, textStatus, jqXHR) 
							        {	
							        	//console.log(rootUrl);
							            //data: return data from server
							            if(data.statusError===0){
							            	
											    
											
							            }
							        },
							        error: function(jqXHR, textStatus, errorThrown) 
							        {
							            //if fails      
							        }
							    });
							    e.preventDefault(); //STOP default action
							    //e.unbind(); //unbind. to stop multiple form submit.
							});
				  		});

				  	</script> 
      </div> <!-- /container -->
    </div> <!-- /about -->
