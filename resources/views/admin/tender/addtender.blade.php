@include('admin.controlpanel.top')
@include('admin.controlpanel.sidebar')
@include('admin.controlpanel.header')
<div class="contant"> 	    	    
<div class="title">       
       <h3>add tender</h3>
    </div>
</div>
<div class="show-data tender">
	<div class="show-data">
	<section class="get-in-touch">
	<form class="form-horizontal" action="/tender" method="post" enctype="multipart/form-data"> 
		<div class="container">
			<div class="add-form row">
			  <div class="conter">
				<div class="form-filed col-lg-12">
				  <div class="preview">
					<img id="file-ip-1-preview"> 
				  </div>
				  <label for="file-ip-1" class="image-label">Upload Image</label>
				 <input type="file" name="image" id="file-ip-1" class="image" accept="image/*" multiple="false" onchange="showPreview(event);">
				 <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="1">
				 <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="1">  
				</div>
			  </div>
				<div class="form-filed col-lg-6">
				  <input id="name" class="input-text" type="text"  name="title" placeholder="title">
				</div>
				<div class="form-filed col-lg-6">
				  <select class="form-select" aria-label="Default select example" name="major_id">
					<option selected>major</option>
					@foreach ($majors as $major)  
					<option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
					@endforeach
				  </select>
			  </div>
				<div class="form-filed col-lg-6">
				  <select class="form-select" aria-label="Default select example" name="location">
					<option selected>location</option>
					<option value="sana">sana</option>
					<option value="Taze">Taze</option>
					<option value="marib">marib</option>
				  </select>
				</div>
				<div class="form-filed col-lg-6">
				  <input id="company" class="input-text" type="text" name="company" placeholder="company">
				</div>
				<div class="form-filed col-lg-6">
				  <input id="apply_link" class="input-text" type="text" name="apply_link" placeholder="apply_link">
				</div>
				<div class="form-filed col-lg-6">
				  <label>start_date</label>
				  <input id="start_date" class="input-text" type="date" name="start_date" placeholder="start_date">
				</div>
				<div class="form-filed col-lg-6">
				  <label>deadline</label>
				  <input id="deadline" class="input-text" type="date" name="deadline" placeholder="deadline">
				</div>
				<div class="form-filed col-lg-6">
				  <label>posted_date</label>
				  <input id="posted_date" class="input-text" type="date" name="posted_date" placeholder="posted_date">
				</div>
				<div class="file-icon file-field col-lg-6">
				  <input type="file" class="form-control" id="filename" name="filename" placeholder="filename" />
				</div>
				<!--<div class="file-icon file-field col-lg-6">
					  <div class=" " style="font-size: 30px;">
						<i class="bi bi-markdown"></i>
						<input type="file" name="filename" placeholder="filename">
					  </div>
				</div>
				<div class="file-path-wrapper col-lg-6 ">
					<input class="file-path validate" type="text">
				</div>-->
				<div class="form-filed col-lg-12">
				     <textarea cols="80" id="editor3" name="description" rows="2" data-sample-short></textarea>
				</div>
				<div class="form-filed col-lg-12">
				  <input class="submit-btn" type="submit" value="submit" name="">
				</div>
				</form>
			</div>
		</div>
	</section>
	</div>
	<!--
<div class="container">
		<div >
			<div class="col-sm-8 offset-sm-2">
				  
				<div class="card">
					
					<div class="card-body">
						<form class="form-horizontal" action="/tender" method="post" enctype="multipart/form-data">
							<div class="form-group row">
              <div class="preview">
                <img id="file-ip-1-preview">
                
            </div>
								<label class="col-sm-4 col-form-label" for="image">image</label>
								<div class="col-sm-6">
									<input type="file" class="form-control"  name="image" id="file-ip-1" accept="image/*" multiple="false" onchange="showPreview(event);" />
								</div>
							</div>
              
              <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="1">
              <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="1">
              
              <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="title">title</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="title" name="title" placeholder="title" />
								</div>
              </div>
      
              <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="major_name">major_name</label>
								<div class="col-sm-6">
                  <select class="form-select" aria-label="Default select example" name="major_id">
                    <option selected>Open this select menu</option>
                    @foreach ($majors as $major)  
                    <option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                    @endforeach
                  </select>
                </div>
						  </div>

              <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="location">location</label>
								<div class="col-sm-6">
                  <select class="form-select" aria-label="Default select example" name="location">
                    <option selected>Open this select menu</option>
                    <option value="sana">sana</option>
                    <option value="Taze">Taze</option>
                    <option value="marib">marib</option>
                  </select>
                </div>
						  </div>
  
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="company">company</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="company" name="company" placeholder="company" />
								</div>
							</div>
							   
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="apply_link">apply_link</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="apply_link" name="apply_link" placeholder="apply_link" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="start_date">start_date</label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="start_date" name="start_date" placeholder="start_date" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="deadline">deadline </label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="deadline" name="deadline" placeholder="deadline" />
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="posted_date">posted_date </label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="posted_date" name="posted_date" placeholder="posted_date" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="filename">filename </label>
								<div class="col-sm-6">
									<input type="file" class="form-control" id="filename" name="filename" placeholder="filename" />
								</div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" >textarea </label>
                <div class="">
              <textarea cols="80" id="editor3" name="description" rows="2" data-sample-short></textarea>
              </div>
              </div>
							<div class="form-group row">
								<div class="col-sm-9 offset-sm-4">
									<button type="submit" class="btn btn-primary" >Add tendr</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  </div>
</div>

<form id="add-major-form" action="tender" method="post" enctype="multipart/form-data" >
<div class="input-group mb-3">

  <input type="file" class="form-control" name="image" accept="image/*" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
</div>
<input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="1">
<input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="1">
  <input type="text" class="form-control" name="title" placeholder="Server" aria-label="Server">
</div>
<div class="input-group mb-3">
<select class="form-select" aria-label="Default select example" name="major_id">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  <select class="form-select" aria-label="Default select example" name="location">
  <option selected>Open this select menu</option>
  <option value="sana">sana</option>
  <option value="Taze">Taze</option>
  <option value="marib">marib</option>
</select>
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="company" aria-label="company" name="company">
  <input type="text" class="form-control" placeholder="Server" aria-label="Server" name="apply_link">
</div> 
<div class="input-group mb-3">
<input type="date" class="form-control" placeholder="Username" aria-label="Username" name="posted_date">
  <input type="date" class="form-control" placeholder="Username" aria-label="Username" name="start_date">
  <input type="date" class="form-control" placeholder="Server" aria-label="Server" name="deadline">
</div>
<div class="input-group mb-3">
<input type="file" class="form-control" name="filename" accept=".someext/*" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
</div>
<textarea cols="80" id="editor3" name="description" rows="2" data-sample-short></textarea>
</div>
<div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add major</button>
              </div>
</form>-->


@include('admin.controlpanel.footer')