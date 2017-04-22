<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Formatsurat;
use App\Repositories\FormatsuratRepository;

class FormatsuratAPIController extends Controller{

    protected $formatsuratRepo;

    public function __construct(FormatsuratRepository $formatsuratRepo){
      // dd($formatsuratRepo);
        $this->formatsuratRepo = $formatsuratRepo;
        //dd($this->orders->getAllActive());
    }

    public function tampilkanFormat(Requests $request){
        $format = $this->formatsuratRepo->findById($request->id);
        // dd($format);
        $link = $format->link_format_surat;
        $arr = explode("/", $link);
        $filename = $arr[1] . '/' .$arr[2];
        // dd($filename);
        $data = file($filename);

        $stringFormat = "";
        foreach ($data as $line_num => $line) {
          $stringFormat .= $line .'<br>';
        }
        return response()->json([
          'stringFormat' =>$stringFormat
        ]);

    }
}
