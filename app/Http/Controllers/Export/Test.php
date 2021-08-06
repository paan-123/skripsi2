<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class Test extends Controller
{
    public function export()
    {
        $data = DB::table('datainduk')->get();

        return (new FastExcel($data))->download('datainduk.xlsx');
    }
}
