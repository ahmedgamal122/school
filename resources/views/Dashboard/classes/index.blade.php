@extends('Dashboard.layouts.master')
@section('title')
@lang('lang.List_classes')
@endsection

@section('css')
<!--Internal   Notify -->
<link href="{{URL::asset('Dashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
				 <!-- breadcrumb -->
                 <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('lang.classes')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				@lang('lang.List_classes') </span>
            </div>
        </div>
    </div>


@endsection
@section('content')
@include('Dashboard.includes.messages_alert')


				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<a href=" {{route('classes.create')}}">
							<button type="button" class="btn btn-primary" >
	
							@lang('lang.Adds_Class')
							   </button>
                                </a>  
								</div>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
											<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">@lang('lang.grade_en') </th>
												<th class="wd-15p border-bottom-0">@lang('lang.grade_ar') </th>
												<th class="wd-15p border-bottom-0">@lang('lang.class_en') </th>
												<th class="wd-15p border-bottom-0">@lang('lang.class_ar') </th>
												

												<th class="wd-25p border-bottom-0">@lang('lang.Action') </th>

												
											</tr>
										</thead>
										<tbody>
											
											
										@foreach($Classe as $Classe)

											<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$Classe->grades_en }}</td>
											<td>{{$Classe->grades_ar }}</td>
											<td>{{$Classe->name_english }}</td>
											<td>{{$Classe->name_arabic }}</td>



		
												<td>
												<div class="d-flex justify-content-between">
									<a href=" {{route('classes.edit',$Classe->id)}}">
								<button type="button" class="btn btn-info"  >

								@lang('lang.Edite')
							   </button>
							   </a>
							   <form method="POST"  action="{{route('classes.delete',$Classe->id)}}" class="mr-2">

                                        @csrf
                                        <button type="submit" class="btn btn-danger">
										@lang('lang.Delete')</button>
                                    </form>
                                  
								</div>
													



												</td>
											</tr> 
                             

											@endforeach

											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					

					

				
				
					
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!--Internal  Notify js -->
<script src="{{URL::asset('Dashboard/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Dashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection