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
                        'title' => trans('mconsole::sliders.form.info.title'),
                        'text' => trans('mconsole::sliders.form.info.text'),
                    ])
                @endif
                
                @include('mconsole::partials.portlet-title', [
                    'back' => '/mconsole/sliders',
                    'title' => trans('mconsole::sliders.form.main'),
                    'fullscreen' => true,
                ])
                <div class="portlet-body form">
        			<div class="form-body">
        				@include('mconsole::forms.text', [
        					'label' => trans('mconsole::sliders.form.title'),
        					'name' => 'title',
        				])
        				@include('mconsole::forms.textarea', [
        					'label' => trans('mconsole::sliders.form.description'),
        					'name' => 'description',
                            'size' => '50x2',
        				])
                        @include('mconsole::forms.upload', [
                            'type' => MX_UPLOAD_TYPE_IMAGE,
                            'multiple' => true,
                            'group' => 'sliders',
                            'preset' => 'sliders',
                            'id' => isset($item) ? $item->id : null,
                            'model' => 'Milax\Mconsole\Sliders\Models\Slider',
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
                        <span class="caption-subject font-blue sbold uppercase">{{ trans('mconsole::sliders.form.additional') }}</span>
                    </div>
                </div>
                @include('mconsole::forms.text', [
                    'label' => trans('mconsole::sliders.form.duration'),
                    'name' => 'duration',
                    'placeholder' => '5000',
                ])
                @include('mconsole::forms.text', [
                    'label' => trans('mconsole::sliders.form.concurrent'),
                    'name' => 'concurrent',
                    'placeholder' => '0',
                ])
                @include('mconsole::forms.select', [
                    'label' => trans('mconsole::sliders.form.shuffle.name'),
                    'name' => 'shuffle',
                    'options' => [
                        '0' => trans('mconsole::sliders.form.shuffle.options.order'),
                        '1' => trans('mconsole::sliders.form.shuffle.options.random'),
                    ]
                ])
                <div class="portlet-body form">
                    @include('mconsole::forms.state')
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::close() !!}

@endsection