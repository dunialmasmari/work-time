@include('admin.controlpanel.top')
@include('admin.controlpanel.sidebar')
@include('admin.controlpanel.header')
 	    	    
<div class="container">
		<div >
			<div class="col-sm-8 offset-sm-2">
				  
				<div class="card">
					
					<div class="card-body">
            <form class="form-horizontal" action="tender" method="post" enctype="multipart/form-data">
            @foreach ($tenders as $tender)
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