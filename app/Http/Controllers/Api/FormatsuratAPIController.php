<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FormatsuratRepository;
use App\Formatsurat;

class FormatsuratAPIController extends Controller
{
    //
    protected $formatsuratRepo;

    public function tampilkanFormat(Request $request){
      // dd("ASDF");
      // return response()->json([
      //     'id' => $request->id,
      //
      // ]);
        $format;
        if($request->id == "1"){
            $data = file('format_surat_latex/surat_keterangan_beasiswa.tex');
            $stringFormat ="";
            foreach ($data as $line_num=>$line){
                $stringFormat .= $line.'<br/>';
            }
            return response()->json([
                'stringFormat' => $stringFormat
            ]);
        }
        else if($request->id == "2"){
            $data = file('format_surat_latex/surat_keterangan_mahasiswa_aktif.tex');
            $stringFormat ="";
            foreach ($data as $line_num=>$line){
                $stringFormat .= $line.'<br/>';
            }
            return response()->json([
                'stringFormat' => $stringFormat
            ]);
        }
        else if($request->id == "3"){
          $data = file('format_surat_latex/surat_pengantar_pembuatan_visa.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "4"){
          $data = file('format_surat_latex/surat_pengantar_studi_lapangan_1orang.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "5"){
          $data = file('format_surat_latex/surat_pengantar_studi_lapangan_2orang.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "6"){
          $data = file('format_surat_latex/surat_pengantar_studi_lapangan_3orang.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "7"){
          $data = file('format_surat_latex/surat_pengantar_studi_lapangan_4orang.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "8"){
          $data = file('format_surat_latex/surat_pengantar_studi_lapangan_5orang.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "9"){
          $data = file('format_surat_latex/surat_izin_cuti_studi.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "10"){
          $data = file('format_surat_latex/surat_pengunduran_diri.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "11"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_1mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "12"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_2mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "13"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_3mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "14"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_4mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "15"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_5mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "16"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_6mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "17"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_7mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "18"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_8mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "19"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_9mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "20"){
          $data = file('format_surat_latex/surat_perwakilan_perwalian_10mk.tex');
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
    }
}
