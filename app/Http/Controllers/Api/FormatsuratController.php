<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FormatsuratRepository;
use App\Formatsurat;

class FormatsuratController extends Controller
{
    //
    protected $formatsuratRepo;

    public function tampilkanFormat(Request $request){
        $format;
        if($request->showFormatID == "1"){
            $filename = 'format_surat_latex/surat_keterangan_beasiswa.tex';
            $data = file($filename);
            $string ="";
            foreach ($data as $line_num=>$line){
                $string .= $line.'<br/>';
                // echo $line.'<br/>';
            }
            dd($string);
            // return view('TU.format_surat', [
            //   'string' => $string,
            //   'formatsurats' => null
            // ]);
        }
        else if($request->showFormatID == "2"){

        }
        else if($request->showFormatID == "3"){

        }
        else if($request->showFormatID == "4"){

        }
        else if($request->showFormatID == "5"){

        }
        else if($request->showFormatID == "6"){

        }
        else if($request->showFormatID == "7"){

        }
        else if($request->showFormatID == "8"){
            //
        }
    }
}
