@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.homevideos.management') . ' | ' . trans('labels.backend.homevideos.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.homevideos.management') }}
        <small>{{ trans('labels.backend.homevideos.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($homevideos, ['route' => ['admin.homevideos.update', $homevideos], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH','files' => true, 'id' => 'edit-homevideo']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.homevideos.edit') }}</h3>
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.homevideos.form")
                    <div class="col-lg-offset-2 col-lg-10 footer-btn edit-form-btn1">
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
