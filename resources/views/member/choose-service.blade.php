@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['url' =>route('choose.service.store'), 'class' => 'form-horizontal']) !!}

                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Select what service you want us to take from us</h3>
                        <!--Checkbox Markup-->

                        @foreach($services as $service)

                            <div class="animated-checkbox">
                                <label>

                                    {{ Form::checkbox('service_id[]',$service->id, false,['class'=>'service','rel'=>$service->slug]) }}<span class="label-text">I want to take service as a <strong> {{$service->title}} </strong></span>
                                </label>
                            </div>
                        @endforeach

                        <h3 class="tile-title">Choose the default service after login.</h3>
                        <!--Checkbox Markup-->

                        @foreach($services as $service)
                            <div class="animated-radio-button">
                                <label>
                                    {{ Form::radio('is_active',$service->id,null,['class'=>'service-active','id'=>$service->slug,'disabled']) }}
                                    <span class="label-text">I would like to open the <strong> {{$service->title}} </strong>after the login</span>
                                </label>
                            </div>
                        @endforeach
                        <br>
                        <br>
                        <button id="service_user" disabled="disabled" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Service Choose</button>
                    </div>
                </div>




            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".service").click(function(){
            var service_slug = $(this).attr("rel");
            if (this.checked == true){
                $( "#"+service_slug ).prop( "disabled", false );
            } else {
                $( "#"+service_slug ).prop( "disabled", true );
            }
        });

        $(".service-active").click(function(){
            //$("input[name='is_active']:checked"). val()
            if (this.checked == true){
                $( "#service_user").prop( "disabled", false );
            }
        });
    });


</script>
    @endpush
