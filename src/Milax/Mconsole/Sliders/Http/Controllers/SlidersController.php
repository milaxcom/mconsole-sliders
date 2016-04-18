<?php

namespace Milax\Mconsole\Sliders\Http\Controllers;

use App\Http\Controllers\Controller;
use Milax\Mconsole\Sliders\Http\Requests\SlidersRequest;
use Milax\Mconsole\Sliders\Models\Slider;
use Milax\Mconsole\Models\MconsoleUploadPreset;
use Milax\Mconsole\Models\Language;

/**
 * Sliders module controller file
 */
class SlidersController extends Controller
{
    use \HasQueryTraits, \HasRedirects, \HasPaginator;
    
    protected $redirectTo = '/mconsole/sliders';
    protected $model = 'Milax\Mconsole\Sliders\Models\Slider';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->setPerPage(20)->run('mconsole::sliders.list', function ($item) {
            return [
                '#' => $item->id,
                trans('mconsole::sliders.table.updated') => $item->updated_at->format('m.d.Y'),
                trans('mconsole::sliders.table.slug') => $item->slug,
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
        return view('mconsole::sliders.form', [
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
    public function store(SlidersRequest $request)
    {
        $slider = Slider::create($request->all());
        
        $this->handleImages($slider);
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
        return view('mconsole::sliders.form', [
            'item' => Slider::find($id),
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
    public function update(SlidersRequest $request, $id)
    {
        $slider = Slider::find($id);
        
        $this->handleImages($slider);
        
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
        Slider::destroy($id);
    }
    
}