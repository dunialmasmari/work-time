@include('admin.controlpanel.top')
@include('admin.controlpanel.sidebar')
@include('admin.controlpanel.header')
<div class="contant"> 	    	    
<div class="title">       
       <h3>edite tender</h3>
    </div>
</div>
<div class="show-data tender">
	<div class="show-data">
	<section class="get-in-touch">
	<form class="form-horizontal" action="/controlpanel/updatetender" method="post" enctype="multipart/form-data"> 
     @foreach ($tenders as $tender)
     <input type="hidden" class="form-control" name="tender_id" value="{{ $tender->tender_id }}">
        <div class="container">
			<div class="add-form row">
			  <div class="conter">
				<div class="form-filed col-lg-12">
				  <div class="preview">
					<img id="file-ip-1-preview" src="{{URL::asset('images/tender_img/'.$tender->image)}}"> 
				  </div>
				  <label for="file-ip-1" class="image-label">Upload Image</label>
				 <input type="file" name="image" id="file-ip-1" class="image" accept="image/*" multiple="false" onchange="showPreview(event);">
				 <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="{{ $tender->user_id }}">
				 <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="{{ $tender->active }}">  
				</div>
			  </div>
				<div class="form-filed col-lg-6">
				  <input id="name" class="input-text" type="text"  name="title" placeholder="title" value="{{$tender->title}}">
				</div>
				<div class="form-filed col-lg-6">
				  <select class="form-select" aria-label="Default select example" name="major_id">
                  <option value="{{$tender->major_id}}">{{$tender->major_name}}</option>
					@foreach ($majors as $major) 
                    @if($major->type == 1) 
					<option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                    @endif
					@endforeach
				  </select>
			  </div>
				<div class="form-filed col-lg-6">
				  <select class="form-select" aria-label="Default select example" name="location">
                  <option value="{{$tender->location}}">{{$tender->location}}</option>
					<option value="sana">sana</option>
					<option value="Taze">Taze</option>
					<option value="marib">marib</option>
				  </select>
				</div>
				<div class="form-filed col-lg-6">
				  <input id="company" class="input-text" type="text" name="company" placeholder="company" value="{{$tender->company}}">
				</div>
				<div class="form-filed col-lg-6">
				  <input id="apply_link" class="input-text" type="text" name="apply_link" placeholder="apply_link" value="{{$tender->apply_link}}">
				</div>
				<div class="form-filed col-lg-6">
				  <label>start_date</label>
				  <input id="start_date" class="input-text" type="date" name="start_date" placeholder="start_date" value="{{$tender->start_date}}">
				</div>
				<div class="form-filed col-lg-6">
				  <label>deadline</label>
				  <input id="deadline" class="input-text" type="date" name="deadline" placeholder="deadline" value="{{$tender->deadline}}">
				</div>
				<div class="form-filed col-lg-6">
				  <label>posted_date</label>
				  <input id="posted_date" class="input-text" type="date" name="posted_date" placeholder="posted_date" value="{{$tender->posted_date}}">
				</div>
				<div class="file-icon file-field col-lg-6">
				  <input type="file" class="form-control" id="filename" name="filename" placeholder="filename" src="{{URL::asset('files/tender_file/'.$tender->filename)}}" />
				</div>
				<div class="form-filed col-lg-12">
				     <textarea cols="80" id="editor3" name="description" rows="2" data-sample-short> {{$tender->description}}</textarea>
				</div>
                @endforeach
				<div class="form-filed col-lg-12">
                <button type="submit" class="btn btn-primary" >edit tender</button>
				</div>
				</form>
			</div>
		</div>
	</section>
</div>
@include('admin.controlpanel.footer')







<!--
 	    	    
<div class="container">
		<div >
			<div class="col-sm-8 offset-sm-2">
				  
				<div class="card">
					
		
					<div class="card-body">
					@foreach ($tenders as $tender)
		    <form class="form-horizontal" action="/controlpanel/updatetender" method="post" enctype="multipart/form-data">
           
			<input type="hidden" class="form-control" name="tender_id" value="{{ $tender->tender_id }}">
							<div class="form-group row">
              <div class="preview">
                <img id="file-ip-1-preview" src="NRC.png">
                
            </div>
								<label class="col-sm-4 col-form-label" for="image">image</label>
								<div class="col-sm-6">
									<input type="file" class="form-control" id="image" name="image" id="file-ip-1" accept="image/*" multiple="false" onchange="showPreview(event);" />
								</div>
							</div>
              
              <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="{{ $tender->user_id}}">
              <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="{{ $tender->active}}">
              
              <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="title">title</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{$tender->title}}"/>
								</div>
              </div>
              <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="major_name">major_name</label>
								<div class="col-sm-6">
                  <select class="form-select" aria-label="Default select example" name="major_id">
                    <option value="{{$tender->major_id}}">{{$tender->major_name}}</option>
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
                  <option value="{{$tender->location}}">{{$tender->location}}</option>
                    <option value="sana">sana</option>
                    <option value="Taze">Taze</option>
                    <option value="marib">marib</option>
                  </select>
                </div>
						  </div>
  
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="company">company</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="company" name="company" placeholder="company" value="{{$tender->company}}" />
								</div>
							</div>
							   
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="apply_link">apply_link</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="apply_link" name="apply_link" placeholder="apply_link" value="{{$tender->apply_link}}"/>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="start_date">start_date</label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="start_date" name="start_date" placeholder="start_date" value="{{$tender->start_date}}" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="deadline">deadline </label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="deadline" name="deadline" placeholder="deadline" value="{{$tender->start_date}}" />
								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="posted_date">posted_date </label>
								<div class="col-sm-6">
									<input type="date" class="form-control" id="posted_date" name="posted_date" placeholder="posted_date" value="{{$tender->posted_date}}"/>
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
              <textarea cols="80" id="editor3" name="description" rows="2" data-sample-short> {{$tender->description}}</textarea>
              </div>
              </div>
              @endforeach
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

@include('admin.controlpanel.footer')