@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.pages.management') . ' | ' . trans('labels.backend.pages.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.pages.management') }}
        <small>{{ trans('labels.backend.pages.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($page, ['route' => ['admin.pages.update', $page], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'files' => true, 'id' => 'edit-role']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.pages.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.pages.partials.pages-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
            <div class="form-group">
                    {{ Form::label('page_type', trans('Page Type'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::select('page_type', array('standard' => trans('Standard'), 'home' => trans('Home')), $page->page_type, ['class' => 'form-control select2 box-size']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div id = "page_container">
                    {{-- Including Form blade file --}}
                    @include("backend.pages.forms.standard")
                    @include("backend.pages.forms.home")
                    
                </div>
               

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.pages.is_active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <div class="control-group">
                            <label class="control control--checkbox">
                                {{ Form::checkbox('status', 1, ($page->status == 1) ? true : false ) }}
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div><!--col-lg-3-->
                </div><!--form control-->
                <div class="edit-form-btn">
                    {{ link_to_route('admin.pages.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div>
            </div><!-- /.box-body -->
        </div><!--box-->
    {{ Form::close() }}
@endsection
@section("after-scripts")
    <script type="text/javascript">
        Backend.Pages.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
    </script>
@endsection