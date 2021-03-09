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


                        <hr> <br>
                        <div class="container-fluid cards bg-light">
                            <div class="container-fluid ">
                                <div class="row">


                                    @foreach ($tenders as $tender)

                                    <div class="mx-auto">
                                        <a  href='tender/{{ $tender->tender_id }}' style="text-decoration: none; color:#000">
                                            <div class="card" style="width:260px; height:430px;"> 
                                                <img   src="{{ URL::asset('assets/uploads/tenders/images/' . $tender->image) }}"
                                                style=" height:180px; width:100%;" />
                                                <div class="card-body">
                                                    <h5  style=" height: 70px; ">
                                                        {{ \Illuminate\Support\Str::limit( $tender->title, $limit = 60, $end = '...') }}
                                                    </h5>
                                                    <hr  style='background-color:rgb(79, 157, 213); height:1px;'>
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

@stop
