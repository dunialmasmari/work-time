@extends('HR.layouts.master')
@section('content')
    <div class='container-fluid colors-logo'>
        <div class="color-logo">
            <div class="card-body text-center " style="padding:100px;">
                <h2>{{ __('fields_web.Tenders.Title') }}</h2>
                <img src="{{ URL::asset('assets/images/hrlogo2.png') }}" class='mx-5 pageheaderlogo' alt="" width="120"
                    height="auto">

            </div>
        </div>
    </div>

    <div class="container-fluid bg-light" style="overflow-x:hidden">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class='col-12 my-4'>
                        <form action="{{ route('tenders') }}" method="get">
                            <div class="row">
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">
                                        <label>{{ __('fields_web.Tenders.major') }} :</label>
                                        <select class="select2" multiple="multiple" name="major_id[]" style="width: 100%;">
                                            @foreach ($majors as $major)
                                                @if ($major_id)
                                                    <option value="{{ $major['id'] }}" @if (in_array($major['id'], $major_id)) selected @endif>{{ $major['name'] }}</option>
                                                @endif
                                                @if (!$major_id)
                                                    <option value="{{ $major['id'] }}">{{ $major['name'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">
                                        <label>{{ __('fields_web.Tenders.company') }} :</label>
                                        <select class="select2" multiple="multiple" name="company[]" style="width: 100%;">
                                            @foreach ($companies as $comp)
                                                @if ($company)
                                                    <option value="{{ $comp }}" @if (in_array($comp, $company)) selected @endif>{{ $comp }}</option>
                                                @endif
                                                @if (!$company)
                                                    <option value="{{ $comp }}">{{ $comp }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">
                                        <label>{{ __('fields_web.Tenders.location') }} :</label>
                                        <select class="select2" multiple="multiple" name="location[]" style="width: 100%;">
                                            @foreach ($locations as $loc)
                                                @if ($location)
                                                    <option value="{{ $loc }}" @if (in_array($loc, $location)) selected @endif>{{ $loc }}</option>
                                                @endif
                                                @if (!$location)
                                                    <option value="{{ $loc }}">{{ $loc }}</option>
                                                @endif
                                                {{-- @if (in_array($loc, $location))selected  @endif --}}
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1 mt-auto mb-1 mx-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary">{{ __('fields_web.Tenders.filter') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <hr> <br>
                        <div class="container-fluid cards bg-light">
                            <div class="container-fluid ">
                                <div class="row">


                                    @foreach ($tenders as $tender)

                                        <div class="mx-auto">
                                            <a href='tender/{{ $tender->tender_id }}'
                                                style="text-decoration: none; color:#000">
                                                <div class="card" style="width:260px; height:430px;">
                                                    <img src="{{ URL::asset('assets/uploads/tenders/images/' . $tender->image) }}"
                                                        style=" height:180px; width:100%;" />
                                                    <div class="card-body">
                                                        <h5 style=" height: 70px; ">
                                                            {{ \Illuminate\Support\Str::limit($tender->title, $limit = 60, $end = '...') }}
                                                        </h5>
                                                        <hr style='background-color:rgb(79, 157, 213); height:1px;'>
                                                        <span class="card-text"
                                                            style="color:rgba(48, 48, 48, 0.8); font-weight:bold; ">
                                                            <i class='fa fa-home' style="width: 20px;"> </i>
                                                            <span>
                                                                {{ \Illuminate\Support\Str::limit($tender->company, $limit = 20, $end = '...') }}
                                                            </span>
                                                        </span>
                                                        <br>
                                                        <span class="card-text"
                                                            style="color:rgba(48, 48, 48, 0.8); font-weight:bold;">
                                                            <i class="fa fa-map-marker" style="width: 20px;"> </i>
                                                            <span>
                                                                {{ \Illuminate\Support\Str::limit($tender->location, $limit = 20, $end = '...') }}
                                                            </span>
                                                        </span>
                                                        <br>
                                                        <span class="card-text"
                                                            style="color:#e5383b; font-weight:bold; width: 20px;"><i
                                                                class="far fa-calendar-times"> &nbsp;
                                                            </i>{{ __('fields_web.Tenders.Deadline') }} :
                                                            {{ $tender->deadline }}</span>
                                                        <a href='tender/{{ $tender->tender_id }}'> <button
                                                                class="btn btn-primary btn-sm my-2">{{ __('fields_web.Tenders.more') }}</button></a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                    {{-- <div class="col-lg-3 col-md-6 ">
                      <div class="card"> <br>
                           <div class='card-image'>
                             <img class="card-img-top img-fluid " src="{{URL::asset('assets/images/hrlogo.png')}}" alt="image" />
                           </div>
                           <div class="card-body">
                               <h3 class="card-title"> اسم المناقصة</h3> 
                               <hr class='btn-primary'>
                                   <p class="card-text">اسم الشركة </p>
                                   <p class="card-text" style="color:red">{{__('fields_web.Tenders.Deadline')}}</p>
                                   <a href= ''> <button class="btn btn-primary">{{__('fields_web.Tenders.more')}}</button></a>
                             </div>
                        </div>
                   </div> --}}





                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pagination pagination-md justify-content-center" style="margin:20px;padding:5px ">
                        {!! $tenders->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
       //Initialize Select2 Elements
       $('.select2').select2()
   
       //Initialize Select2 Elements
       $('.select2bs4').select2({
         theme: 'bootstrap4'
       })
        })
 </script>
@stop
