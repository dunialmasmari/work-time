@include('admin.controlpanel.top')

@include('admin.controlpanel.header')
<div class="contant">
    <div class="title">
       <h3>tender</h3>
    </div>
    <div class="button">
        <a href="{{ url('/addtender') }}"  class="btn btn-primary" > 
        Add new tender
        </a>
    </div>
</div>
<div class="show-data">
        <table class="table table-hover" id="table" >
          <thead>
            <tr>
              <th >tenders title</th>
              <th>major</th>
              <th > location </th>
              <th > company </th>
              <th > deadline </th>
              <th > الحالة </th>
              <th> الحدث </th>
              
            </tr>
          </thead>
          <tbody>
          @foreach ($tenders  as $tender)
            <tr> 	   
              <td> {{ $tender->title}} </td>
              <td> {{ $tender->major_name}} </td>
              <td> {{ $tender->location}} </td>
              <td> {{ $tender->company}} </td>
              <td> {{ $tender->deadline}} </td>
              @if($tender->active == 1)
                <td> active </td>
                <td>
                <a href="{{  url('tender/'.$tender->tender_id) }}"class="btn"> تعديل</a>
                <a href="" class="btn"> عرض التفاصيل</a>
                <a href="{{  url('activation/'.$tender->tender_id) }}" class="btn">الغاء التفعيل</a></td>
              @else 
                <td> not active </td>
                <td><!-- {{  url('addtender/'.$tender->tender_id) }}-->
                <a href="{{  url('tender/'.$tender->tender_id) }}" class="btn"> تعديل</a>
                <a href="" class="btn"> عرض التفاصيل</a>
                <a href="{{  url('activation/'.$tender->tender_id) }}" class="btn">تفعيل</a></td>
              @endif  
            </tr>
            @endforeach
          </tbody>
    </table>
</div>
@include('admin.controlpanel.footer')