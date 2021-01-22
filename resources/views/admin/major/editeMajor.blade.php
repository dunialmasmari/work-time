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

@foreach ($majors as $major)
<form id="add-major-form" action="/controlpanel/updatemajor" method="post" >
                <input type="hidden" class="form-control" name="major_id" value="{{ $major->major_id }}">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label>major Name</label>
                        <input type="text" name="major_name" value="{{ $major->major_name}}" class="form-control" placeholder="Enter major Name" id="major_name">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                       <!-- <label>type </label>
                        <select class="form-control type" name="type" id="type">
                        @if($major->type == 1)
                        <option value="{{ $major->type}}">tender</opiton>
                        <option value=0>jobs</option>
                        @else 
                        <option value="{{ $major->type}}">jobs</opiton>
                        <option value=1>tender</opiton>
                        @endif 
                        </select>-->
                      </div>	
                      @endforeach
                    </dive>
                      <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >edit major</button>
              </div>
                </form>
                </div>
</div>
@include('admin.controlpanel.footer')