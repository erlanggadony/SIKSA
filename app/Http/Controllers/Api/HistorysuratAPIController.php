<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Historysurat;
use App\Repositories\HistorysuratRepository;

class HistorysuratAPIController extends Controller{

    protected $historysuratRepo;

    public function __construct(HistorysuratRepository $historysuratRepo){
      // dd($formatsuratRepo);
        $this->historysuratRepo = $historysuratRepo;
    }

    public function ubahStatusPenandatanganan(Request $request){
      $history = $this->historysuratRepo->findHistoryById($request->id);
      $histor->penandatanganan = true;
      $history->save();
    }

    public function ubahStatusPengambilan(Request $request){
      $history = $this->historysuratRepo->findHistoryById($request->id);
      $history->save();
      $history->pengambilan = true;
    }
}
