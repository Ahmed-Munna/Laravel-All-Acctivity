<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $data = Seo::find(1);
        return view('admin.settings.seo', compact('data'));
    }

    public function update(Request $request) {

        if ($request->method() == "POST") {

            $data = Seo::findOrFail(1);

            $data->update([
                'meta_title' => $request->title,
                'meta_author' => $request->metaAuthor,
                'meta_tag' => $request->tag,
                'meta_discription' => $request->discription,
                'meta_keyword' => $request->keyword,
                'google_varification' => $request->gverification,
                'google_analytics' => $request->ganalytics,
                'google_adsence' => $request->gadsence,
                'alexa_vatification' => $request->avarification,
            ]);

            return redirect()->back()->with('Updated Information');

        }

    }

}
