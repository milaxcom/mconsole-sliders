<?php

namespace Milax\Mconsole\Sliders\Http\Controllers;

use App\Http\Controllers\Controller;
use Milax\Mconsole\Sliders\Http\Requests\SliderRequest;
use Milax\Mconsole\Sliders\Models\Slider;
use Milax\Mconsole\Models\MconsoleUploadPreset;
use Milax\Mconsole\Models\Language;
use Milax\Mconsole\Contracts\ListRenderer;
use Milax\Mconsole\Contracts\FormRenderer;
use Milax\Mconsole\Contracts\Repository;

/**
 * Sliders module controller file
 */
class SlidersController extends Controller
{
    use \HasRedirects, \DoesNotHaveShow;
    
    protected $redirectTo = '/mconsole/sliders';
    protected $model = 'Milax\Mconsole\Sliders\Models\Slider';
    
    /**
     * Create new class instance
     */
    public function __construct(ListRenderer $list, FormRenderer $form, Repository $repository)
    {
        $this->list = $list;
        $this->form = $form;
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->list->setQuery($this->repository->index())->setAddAction('sliders/create')->render(function ($item) {
            return [
                '#' => $item->id,
                trans('mconsole::sliders.table.updated') => $item->updated_at->format('m.d.Y'),
                trans('mconsole::sliders.table.title') => $item->title,
            ];
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->form->render('mconsole::sliders.form', [
            'presets' => MconsoleUploadPreset::all(),
            'languages' => Language::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = $this->repository->create($request->all());
        
        $this->handleFiles($slider);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->form->render('mconsole::sliders.form', [
            'item' => $this->repository->find($id),
            'presets' => MconsoleUploadPreset::all(),
            'languages' => Language::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = $this->repository->find($id);
        
        $this->handleFiles($slider);
        
        $slider->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
    }
    
    /**
     * Handle images upload
     *
     * @param Milax\Mconsole\Sliders\Models\Sliders $sliders [Sliders object]
     * @return void
     */
    protected function handleFiles($object)
    {
        // Images processing
        app('API')->uploads->handle(function ($files) use (&$object) {
            app('API')->uploads->attach([
                'group' => 'sliders',
                'uploads' => $files,
                'related' => $object,
                'unique' => false,
            ]);
        });
    }
}
