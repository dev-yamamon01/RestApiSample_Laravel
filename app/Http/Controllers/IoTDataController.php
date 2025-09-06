<?php

namespace App\Http\Controllers;

use App\Models\IoTData;
use Illuminate\Http\Request;

class IoTDataController extends Controller
{
    /**
     * IoTデータの履歴を表示
     */
    public function index()
    {
        $data = IoTData::orderBy('detected_at', 'desc')->paginate(20);
        return view('iot-data.index', compact('data'));
    }
}
