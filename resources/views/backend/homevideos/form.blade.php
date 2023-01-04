<div class="box-body">
<div class="form-group">
                    {{ Form::label('title', trans('validation.attributes.backend.pages.title'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.title'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
               
                
                <div class="form-group">
                    {{ Form::label('Video Link', trans('Video Link'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('video_link', null, ['class' => 'form-control box-size', 'placeholder' => trans('Video Link'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
					{{ Form::label('video_file_link', trans('Upload Video'), ['class' => 'col-lg-2 control-label']) }}

					<div class="col-lg-10">

						<div class="custom-file-input">
							{!! Form::file('video_file_link', array('class'=>'form-control inputfile inputfile-1' )) !!}
							<label for="video_file_link">
								<i class="fa fa-upload"></i>
								<span>Choose a file</span>
							</label>
						</div>
					</div>
					<!--col-lg-10-->
				</div>
				<!--form control-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-6" style="text-align: center;">
                            <div style="color: white; background-color: black;">
                                <div style="height: 0px;  padding-bottom: 56.7%;">
                                    @if(@$homevideos->video_file_link)
                                        <video tabindex="-1" class="video-stream html5-main-video"  src="{{ ('/storage/img/homevideo/' . $homevideos->video_file_link) }}" style="width: calc(100% - 30px);height: 100%;position: absolute;left: 15px;" loop muted  controls autoplay>
                                            <source src="{{ ('/storage/img/homevideo/' . $homevideos->video_file_link) }}" type="video/mp4">
                                        </video>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.pages.is_active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <div class="control-group">
                            <label class="control control--checkbox">
                                {{ Form::checkbox('status', 1, true) }}
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div><!--col-lg-3-->
                </div><!--form control-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
