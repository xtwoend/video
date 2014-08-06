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
	i.upload.ion-upload{
	  font-size: 90px;
	}
	</style>

<div id="about" class="region">
      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center block">
            <h3>Upload Your Video</h3>
            <p>Dengan mengirimkan video ke Video+, Anda menyatakan bahwa Anda setuju dengan <a href="">Persyaratan Layanan</a> dan <a href="#">Pedoman Komunitas</a> Video+. 
			Pastikan Anda tidak melanggar hak cipta atau hak privasi orang lain.</p>
			
		<div id="upload-place" class="resumable-drop btn btn-primary btn-file btn-block margin-top-50" ondragenter="jQuery(this).addClass('resumable-dragover');" ondragend="jQuery(this).removeClass('resumable-dragover');" ondrop="jQuery(this).removeClass('resumable-dragover');">
            <i class="icon ion-upload upload"></i> <br>Drop video files here to upload <br>Or<br>
            <a class="resumable-browse btn btn-success btn-small btn-file"> select from your computer</a>
         </div>
      
          <div class="resumable-progress">
            <table>
              <tr>
                <td width="100%">
                	<div class="progress" id="bigUploadProgressBarContainer">
                  		<div class="progress-bar progress-bar-red" id="bigUploadProgressBarFilled"></div> <!-- /progress-bar -->
                	</div> <!-- /progress -->
                </td>
                <td class="progress-text" nowrap="nowrap"></td>

                <td class="progress-pause" nowrap="nowrap">
                  <a href="#" onclick="r.upload(); return(false);" class="progress-resume-link"><span class="icon ion-play"></span></a>
                  <a href="#" onclick="r.pause(); return(false);" class="progress-pause-link"><span class="icon ion-pause"></span></a>
                  <a href="#" onclick="r.cancel(); return(false);" class="progress-cancel-link"><span class="icon ion-remove"></span></a>
                </td>

              </tr>
            </table>
          </div>
      
      		<ul class="resumable-list list-unstyled"></ul>
      		
			</div> <!-- /col-xs-12 -->
      			
          </div>
        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /about -->
	
	<div id="services" class="region bg-color-grayLight1">
      <div class="container">
        <div class="row">
		 <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs margin-top-50" role="tablist">
				  <li class="active"><a href="#basic" role="tab" data-toggle="tab">Basic</a></li>
				  <li><a href="#advance" role="tab" data-toggle="tab">Advance</a></li>
				  <li><a href="#privacy" role="tab" data-toggle="tab">Privacy</a></li>				 
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="basic">
						
						<form role="form">
						  
						  <div class="form-group">
							<input type="text" class="form-control" id="name" placeholder="Name"></textarea>
						  </div>
						  
						  <div class="form-group">
							<textarea type="text" class="form-control" id="description" placeholder="Description"></textarea>
						  </div>
						  
						  <div class="form-group">
							<input type="text" class="form-control" id="name" placeholder="Tag (Separate your tags with commas, please.)"></textarea>
						  </div>

						  <button type="submit" class="btn btn-primary btn-sm btn-block margin-top-50">Save Change</button>
						</form>
				  
				  </div>
				  <div class="tab-pane" id="advance">
					
						<form role="form">
						<div class="form-group">
							<select class="form-control">
							  <option>Category</option>
							  <option>Education</option>
							  <option>Entertainment</option>
							</select>						  
						  </div>
						
						
						<div class="form-group">
							<select class="form-control">
							  <option>Language</option>
							  <option>English</option>
							  <option>Indonesia</option>
							</select>						  
						  </div>
						
						
						   <div class="form-group">

							<select class="form-control">
							  <option> Which Creative Commons license for your videos?</option>
							  <option> Video+ License</option>
							  <option> No Creative Commons License</option>
							  <option>Attribution</option>
							  <option>Attribution Share Alike</option>
							  <option>Attribution No Derivatives </option>
							  <option>Attribution Non-Commercial Share Alike </option>
							  <option>Attribution Non-Commercial Share Alike</option>
							  <option>Public Domain Dedication </option>
							</select>						  
						  </div>
						  
						  <div class="form-group">

							<select class="form-control">
							  <option> What is the content rating of your videos?</option>
							  <option> Video+ License</option>
							  <option> No Creative Commons License</option>
							  <option>Attribution</option>
							  <option>Attribution Share Alike</option>
							  <option>Attribution No Derivatives </option>
							  <option>Attribution Non-Commercial Share Alike </option>
							  <option>Attribution Non-Commercial Share Alike</option>
							  <option>Public Domain Dedication </option>
							</select>						  
						  </div>
						
						
						  <button type="submit" class="btn btn-primary btn-sm btn-block margin-top-50">Save Change</button>
						</form>
				  </div>
				  
				 
				  
				   <div class="tab-pane" id="privacy">
					
						<form role="form">
						<div class="form-group">
							<select class="form-control">
							  <option>Who can watch this videos?</option>
							  <option>Anyone</option>
							  <option>Only me</option>
							  <option>Only People who subscribe me</option>
							  <option>Only People i choose</option>
							  <option>Only People with password</option>

							</select>						  
						  </div>
						  
						   <div class="form-group">
							<select class="form-control">
							  <option>People could download the video?</option>
							  <option>Yes</option>
							  <option>No</option>
							</select>						  
						  </div>
						  
						  <div class="form-group">
							<select class="form-control">
							  <option>Available to comment?</option>
							  <option>Yes</option>
							  <option>No</option>
							</select>						  
						  </div>
						
						  <button type="submit" class="btn btn-primary btn-sm btn-block margin-top-50">Save Change</button>
						</form>
						
						
				  
				  </div>
				 
				</div>
				
				
		 </div>
        </div> <!-- /row -->
      </div> <!-- /container -->
    </div> <!-- /about -->

 <script type="text/javascript">

 	/** 
 	 * Chucked File Upload
 	 */

 	var r = new Resumable({
            target:'uploadfile',
            chunkSize:1*1024*1024,
            simultaneousUploads:4,
            testChunks:true,
            throttleProgressCallbacks:1,
            maxFiles: 1,
            /*
            query: {
                some_parameter: 999 //Just an example on how to add more parameters! We don't use it in this example.
            }
            */
        });
        // Resumable.js isn't supported, fall back on a different method
        if(!r.support) {
        	$('.resumable-error').show();
        } else {
          // Show a place for dropping/selecting files
          	$('.resumable-drop').show();
          	r.assignDrop($('.resumable-drop')[0]);
          	r.assignBrowse($('.resumable-browse')[0]);

          // Handle file add event
          	r.on('fileAdded', function(file){
          		
              // Show progress pabr
              	$('.resumable-progress, .resumable-list').show();
              // Show pause, hide resume
              	$('.resumable-progress .progress-resume-link').hide();
              	$('.resumable-progress .progress-pause-link').show();
              // Add the file to the list
              	$('.resumable-list').append('<li class="resumable-file-'+file.uniqueIdentifier+'">Uploading <span class="resumable-file-name"></span> <span class="resumable-file-progress"></span>');
              	$('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-name').html(file.fileName);
              	$('#upload-place').hide();
              	
              // Actually start the upload
              	r.upload();
            });
          	
          	r.on('pause', function(){
              // Show resume, hide pause
              	$('.resumable-progress .progress-resume-link').show();
              	$('.resumable-progress .progress-pause-link').hide();
            });
          	r.on('complete', function(){
              // Hide pause/resume when the upload has completed
              	$('#upload-place').show();
              	$('.resumable-progress .progress-resume-link, .resumable-progress .progress-pause-link').hide();
            });
          	r.on('fileSuccess', function(file,message){
              // Reflect that the file upload has completed
              	$('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-progress').html('(completed)');
              console.log(file);
              
              //document.location.href='{{ URL::to('download') }}?file='+file.fileName;

            });
          	r.on('fileError', function(file, message){
              // Reflect that the file upload has resulted in error
              	$('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-progress').html('(file could not be uploaded: '+message+')');
            });
          	r.on('fileProgress', function(file){
              // Handle progress for both the file and the overall upload
             	$('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-progress').html(Math.floor(file.progress()*100) + '%');
              	$('.progress-bar').css({width:Math.floor(r.progress()*100) + '%'});
            });
          	r.on('cancel', function(){
          		$('#upload-place').show();
            	$('.resumable-file-progress').html('canceled');
          	});
          	r.on('uploadStart', function(){
              // Show pause, hide resume
              	$('.resumable-progress .progress-resume-link').hide();
              	$('.resumable-progress .progress-pause-link').show();
          	});
        }



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