<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index() {
        $data = [];
        foreach(Storage::disk('banners')->files() as $key=>$value) {
            array_push(
                $data,
                new Banner([
                    'file_path' => "img/banners/" . $value,
                    'file_name' => $value,
                    'id' => substr($value, 0, strrpos($value, "."))
                ])
            );
        }
        return view('content.banners.index', compact('data'));
    }

    public function show(Request $request, String $file) {
        if (Storage::disk('banners')->exists($file)) {
            $data = new Banner([
                'file_name' => $file,
                'file_path' => "img/banners/" . $file,
                'id' => substr($file, 0, strrpos($file, "."))
            ]);
            return view('content.banners.show', compact('data'));
        }
        return redirect()->route('banners.index');
    }

    public function create() {
        return view('content.banners.create');
    }

    public function store(Request $request) {
        $files = Storage::disk('banners')->files();
        $file_type = $request->banner->extension();
        Storage::disk('banners')->put(count($files) + 1 . "." . $file_type, file_get_contents($request->banner->getRealPath()));
        return redirect()->route('banners.index');
    }

    public function edit(String $data) {
        return view('content.banners.edit', compact('data'));
    }

    public function update(Request $request, String $file) {
        $file_name = substr($file, 0, strrpos($file, "."));
        $file_type = $request->banner->extension();
        Storage::disk('banners')->delete($file);
        Storage::disk('banners')->put($file_name . "." . $file_type, file_get_contents($request->banner->getRealPath()));
        return redirect()->route('banners.show', $file_name . "." . $file_type);
    }

    public function destroy(Request $request, String $file) {
        Storage::disk('banners')->delete($file);
        return redirect()->route('banners.index');
    }
}
