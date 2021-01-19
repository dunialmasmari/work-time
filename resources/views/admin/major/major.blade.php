@include('admin.controlpanel.top')
@include('admin.controlpanel.sidebar')
@include('admin.controlpanel.header')
<div class="contant">
    <div class="title">       
       <h3>major</h3>
    </div>
    <div class="button">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add new major
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="exampleModalLabel">add major</h5>
              </div>
              <div class="modal-body">
              <p id="message" class="text-dark"></p>
              <p id="msg"></p>
                <form id="add-major-form" action="/major" method="post" >
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                      <input type="hidden" name="active" class="form-control" value="1">
                        <label>major Name</label>
                        <input type="text" name="major_name" class="form-control" placeholder="Enter major Name" id="major_name">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label>type </label>
                        <select class="form-control type" name="type" id="type">
                        <option value=1>tender</opiton>
                        <option value=0>jobs</option>
                        </select>
                      </div>	
                </form>
              </div>
              <br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add major</button>
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
              <th>type</th>
              <th > statue </th>
              <th > action </th>
            </tr>
          </thead>
          <tbody>
          @foreach ($majors as $major) 
            <tr>
              <td> {{ $major->major_name}}  </td>
              @if($major->type == 1)
              <td> tender </td>
              @else
              <td> jobs </td>
              @endif 
              @if($major->active == 1)
                <td> active </td>
                <td><a href="{{  url('majoractivation/'.$major->major_id) }}" class="btn ">الغاء التفعيل</a>
                <a href="{{  url('major/'.$major->major_id) }}" class="btn ">edit </a></td>
              @else 
                <td> not active </td>
                <td>
                <a href="{{  url('majoractivation/'.$major->major_id) }}" class="btn ">تفعيل</a>
                <a href="{{  url('major/'.$major->major_id) }}" class="btn ">edit </a>
              </td>
              @endif  
            </tr>
            @endforeach
          </tbody>
    </table>
</div>
@include('admin.controlpanel.footer')


