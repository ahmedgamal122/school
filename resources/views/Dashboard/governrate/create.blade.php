@extends('Dashboard.layouts.master')
@section('title')
@lang('lang.Adds_gov')
@endsection

@section('page-header')
				 <!-- breadcrumb -->
                 <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.gov')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                @lang('lang.Adds_gov') </span>
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
                        <h4 class="mt-0 mb-0 header-title align-self-center text-capitalize">@lang('lang.Adds_gov')</h4>
                        <div class="buttons">
                            <a href="{{ route('governorates.index') }}" class="mr-2">
                                <button class="btn btn-new"><i class="fa fa-list"></i>
                                @lang('lang.List_gov')</button>
                            </a>
                            <button class="btn btn-primary" onclick="window.history.back()">
                                <i class="fa fa-angle-left"></i>
                                @lang('lang.Back')
                            </button>
                        </div>
                    </div>
                    <hr>
                    <form enctype="multipart/form-data" action="{{ route('governorates.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                            <label class="text-capitalize">@lang('lang.English Name') <i title="Required" class="mdi mdi-18px mdi-alert-octagon text-danger"></i></label>
                            <input class="form-control" type="text" name="name_english">
                            @error('name_english')
                            <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="text-capitalize"> @lang('lang.Arabic Name') <i title="Required" class="mdi mdi-18px mdi-alert-octagon text-danger"></i></label>
                            <input class="form-control" type="text" name="name_arabic">
                            @error('name_arabic')
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