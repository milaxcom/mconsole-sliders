@extends('mconsole::app')

@section('content')

    @if (isset($item))
        {!! Form::model($item, ['method' => 'PUT', 'route' => ['mconsole.sliders.update', $item->id]]) !!}
    @else
        {!! Form::open(['method' => 'POST', 'url' => '/mconsole/sliders']) !!}
    @endif
    <div class="row">
    	<div class="col-lg-7 col-md-6">
            <div class="portlet light">
                @if (isset($item))
                    @include('mconsole::partials.note', [
                        'back' => '/mconsole/sliders',
                        'title' => trans('mconsole::sliders.form.info.title'),
                        'text' => trans('mconsole::sliders.form.info.text'),
                    ])
                @endif
                
                @include('mconsole::partials.portlet-title', [
                    'title' => trans('mconsole::sliders.form.main'),
                    'fullscreen' => true,
                ])
                <div class="portlet-body form">
        			<div class="form-body">
        				@include('mconsole::forms.text', [
        					'label' => trans('mconsole::sliders.form.slug'),
        					'name' => 'slug',
        				])
        				@include('mconsole::forms.text', [
        					'label' => trans('mconsole::sliders.form.title'),
        					'name' => 'title',
        				])
        				@include('mconsole::forms.textarea', [
        					'label' => trans('mconsole::sliders.form.description'),
        					'name' => 'description',
        				])
        			</div>
                    <div class="form-actions">
                        @include('mconsole::forms.submit')
                    </div>
                </div>
            </div>
    	</div>
        <div class="col-lg-5 col-md-6">
            
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue sbold uppercase">{{ trans('mconsole::sliders.form.gallery') }}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    @include('mconsole::partials.upload', [
                        'multiple' => true,
                        'group' => 'sliders',
                        'preset' => 'gallery',
                        'id' => isset($item) ? $item->id : null,
                        'model' => 'Milax\Mconsole\Sliders\Models\Slider',
                    ])
                </div>
            </div>
            
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-blue sbold uppercase">{{ trans('mconsole::sliders.form.additional') }}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    @include('mconsole::forms.state')
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection