<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileUploadRequest;
use App\Jobs\FileUpload;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{

    public function index()
    {
        return view('index');
    }


    public function upload(FileUploadRequest $request)
    {
        try {
            $file   = $request->file('file_path');
            $data   = file($file);
            $header = str_getcsv(array_shift($data));
            $header_collection = collect($header)->map(function ($item) {
                return Str::snake($item);
            });
            $chunks = array_chunk($data, 1000);
            $batch  = Bus::batch([])->dispatch();

            foreach ($chunks as $chunk) {
                $rows = array_map('str_getcsv', $chunk);
                $data = collect($rows)->map(fn($row) => $header_collection->combine($row));
                $batch->add(new FileUpload($data));
            }
            return back()->with('success_msg', 'The file import was successful');
        } catch (\Exception $e) {
            return back()->with('error_msg', $e->getMessage());
        }
    }
}
