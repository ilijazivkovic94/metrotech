<div id = "home" class="hidden home">
    <div class="form-group">
        {{ Form::label('slider', trans('Slider Template'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    {{ Form::checkbox('pages_data[slider]', @$page->pages_data->slider, @$page->pages_data->slider) }}
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('learnging description', trans('Learning Description'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('pages_data[learnging_desc]', null,['class' => 'form-control box-size', 'placeholder' => trans('Learning Description')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('learning', trans('Learning Template'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    {{ Form::checkbox('pages_data[learning]', @$page->pages_data->learning, @$page->pages_data->learning) }}
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->
    
    <div class="form-group">
        {{ Form::label('home_video', trans('Home Video Template'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    {{ Form::checkbox('pages_data[home_video]', @$page->pages_data->home_video, @$page->pages_data->home_video) }}
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('team title', trans('Team Title'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('pages_data[team_title]', null, ['class' => 'form-control box-size', 'placeholder' => trans('team_title'), ]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('team description', trans('Team Description'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('pages_data[team_desc]', null,['class' => 'form-control box-size', 'placeholder' => trans('Team Description')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('team button text', trans('Team Button Text '), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('pages_data[team_btn_text]', null, ['class' => 'form-control box-size', 'placeholder' => trans('Team Button Text'), ]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('team button link', trans('Team Button Link'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('pages_data[team_btn_link]', null, ['class' => 'form-control box-size', 'placeholder' => trans('Team Button Link'), ]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('team', trans('Team Template'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    {{ Form::checkbox('pages_data[team]', @$page->pages_data->team, @$page->pages_data->team) }}
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('partner title', trans('Partner Title'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('pages_data[partner_title]', null, ['class' => 'form-control box-size', 'placeholder' => trans('Partner Title'), ]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('partner', trans('Partner Template'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    {{ Form::checkbox('pages_data[partner]', @$page->pages_data->partner, @$page->pages_data->partner) }}
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div><!--form control-->
</div>