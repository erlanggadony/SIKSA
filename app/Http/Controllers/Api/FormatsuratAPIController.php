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
            $filename = 'format_surat_latex/surat_keterangan_beasiswa.tex';
            $data = file($filename);
            $stringFormat ="";
            foreach ($data as $line_num=>$line){
                $stringFormat .= $line.'<br/>';
            }
            return response()->json([
                'stringFormat' => $stringFormat
            ]);
        }
        else if($request->id == "2"){
            $filename = 'format_surat_latex/surat_keterangan_mahasiswa_aktif.tex';
            $data = file($filename);
            $stringFormat ="";
            foreach ($data as $line_num=>$line){
                $stringFormat .= $line.'<br/>';
            }
            return response()->json([
                'stringFormat' => $stringFormat
            ]);
        }
        else if($request->id == "3"){
          $filename = 'format_surat_latex/surat_pengantar_pembuatan_visa.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "4"){
          $filename = 'format_surat_latex/surat_pengantar_studi_lapangan_1orang.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "5"){
          $filename = 'format_surat_latex/surat_pengantar_studi_lapangan_2orang.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "6"){
          $filename = 'format_surat_latex/surat_pengantar_studi_lapangan_3orang.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "7"){
          $filename = 'format_surat_latex/surat_pengantar_studi_lapangan_4orang.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "8"){
          $filename = 'format_surat_latex/surat_pengantar_studi_lapangan_5orang.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "9"){
          $filename = 'format_surat_latex/surat_izin_cuti_studi.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "10"){
          $filename = 'format_surat_latex/surat_pengunduran_diri.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "11"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_1mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "12"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_2mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "13"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_3mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "14"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_4mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "15"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_5mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "16"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_6mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "17"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_7mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "18"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_8mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "19"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_9mk.tex';
          $data = file($filename);
          $stringFormat ="";
          foreach ($data as $line_num=>$line){
              $stringFormat .= $line.'<br/>';
          }
          return response()->json([
              'stringFormat' => $stringFormat
          ]);
        }
        else if($request->id == "20"){
          $filename = 'format_surat_latex/surat_perwakilan_perwalian_10mk.tex';
          $data = file($filename);
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
