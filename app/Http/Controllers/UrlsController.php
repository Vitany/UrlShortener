<?php

namespace App\Http\Controllers;

use App\Url;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;
use Woo\GridView\DataProviders\EloquentDataProvider;

class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $url = null;

        if ($request->has('url')) {
            $url = Url::whereKey($request->get('url'))->first();
        }

        return view('url.index', [
            'url' => $url
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function list()
    {
        return view('url.list', [
            'provider' => new EloquentDataProvider(
                Url::query()
            )
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => ['required', 'url', Rule::unique('urls')]
        ]);

        $url = new Url();

        $url->forceFill([
            'url' => $request->get('url'),
            'short_code' => hash('crc32', uniqid(rand(), true)),
            'created_at' => now(),
        ]);

        $url->saveOrFail();
        return redirect()->route('url.index', ['url' => $url])
            ->with('success', 'URL успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param string $code
     * @return RedirectResponse|Redirector
     */
    public function show($code)
    {
        $url = Url::query()->where(['short_code' => $code])->first();

        if (empty($url)) {
            return redirect()->route('url.index')
                ->with('error', 'Проверьте правильность кода');
        }

        Url::where(['short_code' => $code])
            ->update([
                'url' => $url->url,
                'short_code' => $url->short_code,
                'counter' => $url->counter + 1,
                'updated_at' => now(),
            ]);

        return redirect($url->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Url $url
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Url $url)
    {
        $url->delete();

        return redirect()->route('url.list')
            ->with('success', 'Url успешно удалена');
    }
}
