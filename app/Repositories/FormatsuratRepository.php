<?php
  namespace App\Repositories;

  use App\Formatsurat;

  class FormatsuratRepository{

    public function findAllFormatsurat(){
      $formatsurats = Formatsurat::all();
      return $formatsurats;
    }
    public function findFormatsuratByIdFormatSurat($idFormatSurat){
      $formatsurats = Formatsurat::where('idFormatSurat', $idFormatSurat)->get();
      return $formatsurats;
    }
    public function findFormatsuratByJenisSurat($jenis_surat){
      $formatsurats = Formatsurat::where('jenis_surat', $jenis_surat)->get();
      return $formatsurats;
    }
    public function findFormatsuratByKeteranganSurat($keterangan){
      $formatsurats = Formatsurat::where('keterangan', $keterangan)->get();
      return $formatsurats;
    }
    public function findFormatsuratByLinkSurat($link_format_surat){
      $formatsurats = Formatsurat::where('link_format_surat', $link_format_surat)->get();
      return $formatsurats;
    }
    public function findById($id){
      $formatsurat = Formatsurat::where('id', $id)->first();
      return $formatsurat;
    }
  }

 ?>
