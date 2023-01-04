<div id = "standard" class="hidden standard">
    <div class="form-group">
        {{ Form::label('title', trans('validation.attributes.backend.pages.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.title'), ]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    
    <div class="form-group">
        {{ Form::label('banner', trans('validation.attributes.backend.pages.banner'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">

            <div class="custom-file-input">
                {!! Form::file('banner', array('class'=>'form-control inputfile inputfile-1' )) !!}
                <label for="banner">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
            <div class="img-remove-logo">
                @if(@$page->banner)
                <img height="50%" width="50%" src="{{ ('/storage/img/banner/' . $page->banner) }}">
                @endif
            </div>	
        </div>
        <!--col-lg-10-->
    </div>

    <div class="form-group">
        {{ Form::label('body', trans('validation.attributes.backend.pages.body'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('body', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.body')]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->

    
    <div class="form-group">
        {{ Form::label('video', trans('validation.attributes.backend.pages.video'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">

            <div class="custom-file-input">
                {!! Form::file('video', array('class'=>'form-control inputfile inputfile-1' )) !!}
                <label for="video">
                    <i class="fa fa-upload"></i>
                    <span>Choose a file</span>
                </label>
            </div>
        </div>
    </div><!--form control-->
    @if(@$page->video)
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-6" style="text-align: center;">
                    <div style="color: white; background-color: black;">
                        <div style="height: 0px;  padding-bottom: 56.7%;">
                            
                                <video tabindex="-1" class="video-stream html5-main-video"  src="{{ ('/storage/img/video/' . $page->video) }}" style="width: calc(100% - 30px);height: 100%;position: absolute;left: 15px;" loop muted  controls autoplay>
                                    <source src="{{ ('/storage/img/video/' . $page->video) }}" type="video/mp4">
                                </video>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="form-group">
        {{ Form::label('schedule', trans('validation.attributes.backend.pages.schedule'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('schedule', null,['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.schedule')]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>