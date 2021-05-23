<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Surl;

class SurlController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request){
        $hash = md5($request->get('url'));
        $id = Surl::where('hash', '=', $hash)->first();
        if (is_null($id)) {
            $url = new Surl;
            $url->url = $request->url;
            $url->hash = md5($request->url);
            $url->save();
            $short_url = env('API_APP_URL') . '/' . $url->id;
        }
        else{
            $short_url = env('API_APP_URL') . '/' . $id->id;
        }
        return response()->json($short_url, 201);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function get($id){
        $url=Surl::findOrFail($id);
        return redirect($url->url,301);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request){
        $hash = md5($request->url);
        $exists = Surl::where('hash', '=', $hash)->first();
        if (is_null($exists)) {
            $url=Surl::findOrFail($id);
            $url->url = $request->url;
            $url->hash = $hash;
            $url->save();
            $short_url = env('API_APP_URL') . '/' . $url->id;
        }
        else{
            $short_url = env('API_APP_URL') . '/' . $exists->id;
        }
        return response()->json($short_url, 200);
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
