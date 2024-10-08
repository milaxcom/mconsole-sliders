<form method="POST" action="{{ mconsole_url(isset($item) ? sprintf('sliders/%s', $item->id) : 'sliders') }}" enctype="multipart/form-data">
    @if (isset($item))@method('PUT')@endif
    @csrf

<div class="row">
	<div class="col-lg-7 col-md-6">
        <div class="portlet light">
            @if (isset($item))
                @include('mconsole::partials.note', [
                    'title' => trans('mconsole::sliders.info.title'),
                    'text' => trans('mconsole::sliders.info.text'),
                ])
            @endif
            
            @include('mconsole::partials.portlet-title', [
                'back' => mconsole_url('sliders'),
                'title' => trans('mconsole::sliders.form.main'),
                'fullscreen' => true,
            ])
            <div class="portlet-body form">
    			<div class="form-body">
    				@include('mconsole::forms.text', [
    					'label' => trans('mconsole::sliders.form.title'),
    					'name' => 'title',
                        'value' => $item->title ?? null,
    				])
    				@include('mconsole::forms.textarea', [
    					'label' => trans('mconsole::sliders.form.description'),
    					'name' => 'description',
                        'size' => '50x2',
                        'value' => $item->description ?? null,
    				])
    			</div>
                <div class="row">
                    <div class="col-sm-4">
                    @include('mconsole::forms.text', [
                        'label' => trans('mconsole::sliders.form.duration'),
                        'name' => 'duration',
                        'placeholder' => '5000',
                        'value' => $item->duration ?? null,
                    ])
                    </div>
                    <div class="col-sm-4">
                    @include('mconsole::forms.text', [
                        'label' => trans('mconsole::sliders.form.concurrent'),
                        'name' => 'concurrent',
                        'placeholder' => '0',
                        'value' => $item->concurrent ?? null,
                    ])
                    </div>
                    <div class="col-sm-4">
                    @include('mconsole::forms.select', [
                        'label' => trans('mconsole::sliders.form.shuffle'),
                        'name' => 'shuffle',
                        'options' => [
                            '0' => trans('mconsole::sliders.shuffle.options.order'),
                            '1' => trans('mconsole::sliders.shuffle.options.random'),
                        ],
                        'value' => $item->shuffle ?? null,
                    ])
                    </div>
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
            @include('mconsole::forms.upload', [
                'type' => MconsoleUploadType::Image,
                'multiple' => true,
                'group' => 'sliders',
                'preset' => 'sliders',
                'selector' => app('API')->options->getByKey('sliders_show_presets'),
                'id' => isset($item) ? $item->id : null,
                'model' => 'Milax\Mconsole\Sliders\Models\Slider',
            ])
        </div>
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-blue sbold uppercase">{{ trans('mconsole::sliders.form.additional') }}</span>
                </div>
            </div>
            <div class="portlet-body form">
                @include('mconsole::forms.state', isset($item) ? $item : [])
            </div>
        </div>
        
    </div>
</div>

</form>