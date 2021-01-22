@include('admin.controlpanel.top')
@include('admin.controlpanel.sidebar')
@include('admin.controlpanel.header')
<div class="contant"> 	    	    
<div class="title">       
       <h3>edite job</h3>
    </div>
</div>
<div class="show-data tender">
	<div class="show-data">
	<section class="get-in-touch">
	<form class="form-horizontal" action="/controlpanel/updatejob" method="post" enctype="multipart/form-data"> 
     @foreach ($jobs as $job)
     <input type="hidden" class="form-control" name="job_id" value="{{ $job->job_id }}">
        <div class="container">
			<div class="add-form row">
			  <div class="conter">
				<div class="form-filed col-lg-12">
				  <div class="preview">
					<img id="file-ip-1-preview" src="{{URL::asset('images/job_img/'.$job->image)}}"> 
				  </div>
				  <label for="file-ip-1" class="image-label">Upload Image</label>
				 <input type="file" name="image" id="file-ip-1" class="image" accept="image/*" multiple="false" onchange="showPreview(event);">
				 <input type="hidden" class="form-control" name="user_id" placeholder="Server" aria-label="Server" value="{{ $job->user_id }}">
				 <input type="hidden" class="form-control" name="active" placeholder="Server" aria-label="Server" value="{{ $job->active }}">  
				</div>
			  </div>
				<div class="form-filed col-lg-6">
				  <input id="name" class="input-text" type="text"  name="title" placeholder="title" value="{{$job->title}}">
				</div>
				<div class="form-filed col-lg-6">
				  <select class="form-select" aria-label="Default select example" name="major_id">
                  <option value="{{$job->major_id}}">{{$job->major_name}}</option>
					@foreach ($majors as $major) 
                    @if($major->type == 0) 
					<option value="{{ $major->major_id}} ">{{ $major->major_name}} </option>
                    @endif
					@endforeach
				  </select>
			  </div>
				<div class="form-filed col-lg-6">
				  <select class="form-select" aria-label="Default select example" name="location">
                  <option value="{{$job->location}}">{{$job->location}}</option>
					<option value="sana">sana</option>
					<option value="Taze">Taze</option>
					<option value="marib">marib</option>
				  </select>
				</div>
				<div class="form-filed col-lg-6">
				  <input id="company" class="input-text" type="text" name="company" placeholder="company" value="{{$job->company}}">
				</div>
				<div class="form-filed col-lg-6">
				  <input id="apply_link" class="input-text" type="text" name="apply_link" placeholder="apply_link" value="{{$job->apply_link}}">
				</div>
				<div class="form-filed col-lg-6">
				  <label>start_date</label>
				  <input id="start_date" class="input-text" type="date" name="start_date" placeholder="start_date" value="{{$job->start_date}}">
				</div>
				<div class="form-filed col-lg-6">
				  <label>deadline</label>
				  <input id="deadline" class="input-text" type="date" name="deadline" placeholder="deadline" value="{{$job->deadline}}">
				</div>
				<div class="form-filed col-lg-6">
				  <label>posted_date</label>
				  <input id="posted_date" class="input-text" type="date" name="posted_date" placeholder="posted_date" value="{{$job->posted_date}}">
				</div>
				<div class="form-filed col-lg-12">
				     <textarea cols="80" id="editor3" name="description" rows="2" data-sample-short> {{$job->description}}</textarea>
				</div>
                @endforeach
				<div class="form-filed col-lg-12">
                <button type="submit" class="btn btn-primary" >edit job</button>
				</div>
				</form>
			</div>
		</div>
	</section>
</div>
@include('admin.controlpanel.footer')