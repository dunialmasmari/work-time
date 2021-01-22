@include('admin.controlpanel.top')
@include('admin.controlpanel.sidebar')
@include('admin.controlpanel.header')
<button  id="showtender">tender major </button>
<button  id="showjob">job major </button>

<div id="tender">
    <div class="contant">
        <div class="title">       
          <h3>tender major</h3>
        </div>
        <div class="button">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tenderModal">
            Add new tender major
            </button>
            <!-- Modal -->
            <div class="modal fade" id="tenderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title" id="exampleModalLabel">add tender major</h5>
                  </div>
                  <div class="modal-body">
                  <p id="message" class="text-dark"></p>
                  <p id="msg"></p>
                    <form id="add-major-form" action="/controlpanel/major" method="post" >
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                          <input type="hidden" name="active" class="form-control" value="1">
                          <input type="hidden" name="type" class="form-control" value="1">
                            <label>tender major Name</label>
                            <input type="text" name="major_name" class="form-control" placeholder="Enter major Name" id="major_name">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <!--<label>type </label>
                            <select class="form-control type" name="type" id="type">
                            <option value=1>tender</opiton>
                            <option value=0>jobs</option>
                            </select>-->
                          </div>
                          
                    
                    </form>
                  </div>
                  <br>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add tender major</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="show-data">
            <table id="table" class="table table-hover" >
              <thead>
                <tr>
                  <th >major Name</th>
              
                  <th > statue </th>
                  <th > action </th>
                </tr>
              </thead>
              <tbody>
              @foreach ($majors as $major) 
              @if($major->type == 1)
                <tr>
                  <td> {{ $major->major_name}}  </td>
                  @if($major->active == 1)
                    <td> active </td>
                    <td><a href="{{  url('/controlpanel/majoractivation/'.$major->major_id) }}" class="btn ">الغاء التفعيل</a>
                    <a href="{{  url('/controlpanel/major/'.$major->major_id) }}" class="btn ">edit </a></td>
                  @else 
                    <td> not active </td>
                    <td>
                    <a href="{{  url('/controlpanel/majoractivation/'.$major->major_id) }}" class="btn ">تفعيل</a>
                    <a href="{{  url('/controlpanel/major/'.$major->major_id) }}" class="btn ">edit </a>
                  </td>
                  @endif  
                </tr>
                @endif 
                @endforeach
              </tbody>
        </table>
    </div>
</dive>

<div id="job">
    <div class="contant">
    <h3>Jobs major</h3>
        <div class="title">       
          <h3></h3>
        </div>
        <div class="button">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#jobModal">
            Add new Job major
            </button>
            <!-- Modal -->
            <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title" id="exampleModalLabel">add Job major</h5>
                  </div>
                  <div class="modal-body">
                  <p id="message" class="text-dark"></p>
                  <p id="msg"></p>
                    <form id="add-major-form" action="/controlpanel/major" method="post" >
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                          <input type="hidden" name="active" class="form-control" value="1">
                          <input type="hidden" name="type" class="form-control" value="0">
                            <label>Job major Name</label>
                            <input type="text" name="major_name" class="form-control" placeholder="Enter major Name" id="major_name">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <!--<label>type </label>
                            <select class="form-control type" name="type" id="type">
                            <option value=1>tender</opiton>
                            <option value=0>jobs</option>
                            </select>-->
                          </div>
                          
                    
                    </form>
                  </div>
                  <br>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Job major</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="show-data">
            <table id="table" class="table table-hover" >
              <thead>
                <tr>
                  <th >major Name</th>
                  <th > statue </th>
                  <th > action </th>
                </tr>
              </thead>
              <tbody>
              @foreach ($majors as $major) 
              @if($major->type == 0)
                <tr>
                  <td> {{ $major->major_name}}  </td>
                  @if($major->active == 1)
                    <td> active </td>
                    <td><a href="{{  url('/controlpanel/majoractivation/'.$major->major_id) }}" class="btn ">الغاء التفعيل</a>
                    <a href="{{  url('/controlpanel/major/'.$major->major_id) }}" class="btn ">edit </a></td>
                  @else 
                    <td> not active </td>
                    <td>
                    <a href="{{  url('/controlpanel/majoractivation/'.$major->major_id) }}" class="btn ">تفعيل</a>
                    <a href="{{  url('/controlpanel/major/'.$major->major_id) }}" class="btn ">edit </a>
                  </td>
                  @endif  
                </tr>
                @endif 
                @endforeach
              </tbody>
        </table>
    </div>
</div>

<script>  

document.getElementById("showjob").onclick = function() { 
 
document.getElementById("job").style.display = "block"; 
document.getElementById("tender").style.display = "none";

}
		document.getElementById("showtender").onclick = function() { 

document.getElementById("job").style.display = "none"; 
document.getElementById("tender").style.display = "block";

}

/*
function showtender() {
  var tender = document.getElementById("tender");
  var job = document.getElementById("job");
      tender.style.display = "block";
      job.style.display = "none";
}

function showjob() {
  var tender = document.getElementById("tender");
  var job = document.getElementById("job");
      tender.style.display = "none";
      job.style.display = "block";
}*/
</script>
@include('admin.controlpanel.footer')

<!--
<html> 
<head> 

	<title>Javascript</title> 

	<style type="text/css"> 
		.circle { 
			width: 130px; 
			height: 130px; 
			border-radius: 50%; 
			float: left; 
			margin-right: 50px; 
		} 
		
		.rounded { 
			width: 130px; 
			height: 130px; 
			border-radius: 25%; 
			float: left; 
			margin-right: 50px; 
		} 
		
		.square { 
			width: 130px; 
			height: 130px; 
			border-radius: 0%; 
			float: left; 
			margin-right: 50px; 
		} 
		
		#circle { 
			background-color: #196F3D; 
		} 
		
		#rounded { 
			background-color: #5DADE2; 
		} 
		
		#square { 
			background-color: #58D68D; 
		} 
	</style> 

</head> 

<body> 

	<div class="circle" id="circle"></div> 

	<div class="rounded" id="rounded"></div> 

	<div class="square" id="square"></div> 

	<script type="text/javascript"> 
		document.getElementById("circle").onclick = function() { 

			document.getElementById("circle").style.display = "none"; 

		} 

		document.getElementById("rounded").onclick = function() { 

			document.getElementById("rounded").style.display = "none"; 

		} 

		document.getElementById("square").onclick = function() { 

			document.getElementById("square").style.display = "none"; 

		} 
	</script> 

</body> 

</html> -->
