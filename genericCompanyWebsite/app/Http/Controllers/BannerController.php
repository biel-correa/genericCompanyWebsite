<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index() {
        $data = [];
        foreach(Storage::disk('banners')->files() as $key=>$value) {
            array_push(
                $data,
                (object) array(
                    'full_path' => "img/banners/" . $value,
                    'file_name' => $value
                )
            );
        }

        return view('content.banners.index', compact('data'));
    }

    public function show(Request $request, String $file) {
        if (Storage::disk('banners')->exists($file)) {
            $data = (object) array(
                'file_name' => $file,
                'file_path' => "img/banners/" . $file
            );
            return view('content.banners.show', compact('data'));
        }
        return redirect()->route('banners.index');
    }

    public function store(Request $request) {
        dd($request);
    }

    public function create(Request $request) {
        dd($request);
    }

    public function update(Request $request) {
        dd($request);
    }

    public function destroy(Request $request) {
        dd($request);
    }

    public function edit(Request $request) {
        dd($request);
    }
}
