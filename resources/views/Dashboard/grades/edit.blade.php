@extends('Dashboard.layouts.master')
@section('title')
@lang('lang.grades_edite')
@endsection
@section('page-header')
				 <!-- breadcrumb -->
                 <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.Grades')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                @lang('lang.grades_edite') </span>
            </div>
        </div>
    </div>


@endsection
@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">

       
                
        <div class="col-12 mx-auto">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="title d-flex justify-content-between">
                        <h4 class="mt-0 mb-0 header-title align-self-center text-capitalize"> @lang('lang.grades_edite') </h4>
                        <div class="buttons">
                            <a href="{{ route('grades.index') }}" class="mr-2">
                                <button class="btn btn-new"><i class="fa fa-list"></i>
                                @lang('lang.Grades_list')   </button>
                            </a>
                            <button class="btn btn-primary" onclick="window.history.back()">
                                <i class="fa fa-angle-left"></i>
                                @lang('lang.Back')
                            </button>
                        </div>
                    </div>
                    <hr>
                    <form enctype="multipart/form-data" action="{{ route('grades.update' , ['id' => $Grades->id]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                            <label class="text-capitalize"> @lang('lang.English Name') <i title="Required" class="mdi mdi-18px mdi-alert-octagon text-danger"></i></label>
                            <input value="{{$Grades->name_english}}" class="form-control" type="text" name="name_english">
                            @error('name_english')
                            <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label class="text-capitalize"> @lang('lang.Arabic Name') <i title="Required" class="mdi mdi-18px mdi-alert-octagon text-danger"></i></label>
                            <input value="{{$Grades->name_arabic}}" class="form-control" type="text" name="name_arabic">
                            @error('name_arabic')
                            <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        
                       
                        <div class="form-group col-md-6">
                            <label class="text-capitalize">@lang('lang.Schools') <i title="Required" class="mdi mdi-18px mdi-alert-octagon text-danger"></i></label>
                            <select class="custom-select form-control" name="school_id">
                                <option selected disabled value="{{$Grades->school_id}}"> 
                                @if(App::getLocale() == 'en')
                                            {{$Grades->school_en}}
                                        @else
                                            {{$Grades->school_ar}}
                                        @endif
                                        </option>
                                @foreach($School as $School)
                                    <option value="{{$School->id}}">
                                        @if(App::getLocale() == 'en')
                                            {{$School->name_english}}
                                        @else
                                            {{$School->name_arabic}}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('school_id')
                            <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>


                        
                        <hr>
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-dark waves-effect waves-light mr-2">
                                    @lang('lang.submit')
                                </button>
                                <button type="reset" class="btn btn-primary waves-effect m-l-5"
                                    onclick="window.history.back()">
                                    @lang('lang.Cancel')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('/js/dropify.min.js') }}"></script>
<script>
    $('.dropify').dropify();
</script>

@endsection