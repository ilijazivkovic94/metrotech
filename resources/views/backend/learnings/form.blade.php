<div class="box-body">
<div class="form-group">
                    {{ Form::label('title', trans('validation.attributes.backend.pages.title'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.title'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
               
                <div class="form-group">
                    {{ Form::label('Button Name', trans('Button Name'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('button_text', null, ['class' => 'form-control box-size', 'placeholder' => trans('Button Name'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->  
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('Button Link', trans('Button Link'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('button_link', null, ['class' => 'form-control box-size', 'placeholder' => trans('Slider Link'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('Indicator Name', trans('Indicator Name'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('indicator_text', null, ['class' => 'form-control box-size', 'placeholder' => trans('Indicator Name'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
                    {{ Form::label('Order', trans('Order'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('order', null, ['class' => 'form-control box-size', 'placeholder' => trans('Slider Order'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                <div class="form-group">
					{{ Form::label('image_link', trans('Upload Image'), ['class' => 'col-lg-2 control-label']) }}

					<div class="col-lg-10">

						<div class="custom-file-input">
							{!! Form::file('image_link', array('class'=>'form-control inputfile inputfile-1' )) !!}
							<label for="image_link">
								<i class="fa fa-upload"></i>
								<span>Choose a file</span>
							</label>
						</div>
                        <div class="img-remove-logo">
							@if(@$learnings->image_link)
							<img height="50%" width="50%" src="{{ ('/storage/img/learning/' . $learnings->image_link) }}">
							<!-- <i id="remove-logo-img" class="fa fa-times remove-logo" data-id="logo" aria-hidden="true"></i> -->
							@endif
						</div>					
					</div>
					<!--col-lg-10-->
				</div>
				<!--form control-->

               

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.pages.is_active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <div class="control-group">
                            <label class="control control--checkbox">
                                {{ Form::checkbox('status', @$learnings->status, @$learnings->status) }}
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
