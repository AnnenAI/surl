<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surl;

class SurlController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request){
        $url=Surl::create($request->all());
        $short_url=url()->current() . '/' . $url->id;
        return response()->json($short_url, 201);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function get($id){
        $url=Surl::findOrFail($id);
        return redirect($url->url);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request){
        $url=Surl::findOrFail($id);
        $url->update($request->all());
        return response()->json($url, 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id){
        $url=Surl::findOrFail($id);
        $url->delete();
        return response()->json(null, 204);
    }
}
