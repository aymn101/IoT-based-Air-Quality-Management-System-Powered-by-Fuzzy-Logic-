<?php

namespace App\Http\Controllers;

use App\Models\mq7;
use App\Models\mq135;
use App\Models\hum_data;
use App\Models\temp_data;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class dbcontroller extends Controller
{
    public function __construct()
    {
        $this->mq7 = new mq7();
        $this->mq135 = new mq135();
        $this->hum_data = new hum_data();
        $this->temp_data = new temp_data();
    }

    public function goToMQ135()
    {
        $blocks = DB::table('mq135')
            ->select('value')
            ->latest('datetime')
            ->limit(10)
            ->pluck('value');

        $blocks2 = DB::table('mq135')
            ->select('value', 'datetime')
            ->latest('datetime')
            ->limit(10)
            ->pluck('datetime');

        return compact('blocks', 'blocks2');
    }

    public function goToMQ7()
    {
        $blocks = DB::table('mq7')
            ->select('value')
            ->latest('datetime')
            ->limit(10)
            ->pluck('value');

        $blocks2 = DB::table('mq7')
            ->select('value', 'datetime')
            ->latest('datetime')
            ->limit(10)
            ->pluck('datetime');

        return compact('blocks', 'blocks2');
    }

    public function goToHumidity()
    {
        $blocks = DB::table('hum_data')
            ->select('value')
            ->latest('datetime')
            ->limit(10)
            ->pluck('value');

        $blocks2 = DB::table('hum_data')
            ->select('value', 'datetime')
            ->latest('datetime')
            ->limit(10)
            ->pluck('datetime');

        return compact('blocks', 'blocks2');
    }

    public function goToTemp()
    {
        $blocks = DB::table('temp_data')
            ->select('value')
            ->latest('datetime')
            ->limit(10)
            ->pluck('value');

        $blocks2 = DB::table('temp_data')
            ->select('value', 'datetime')
            ->latest('datetime')
            ->limit(10)
            ->pluck('datetime');

        return compact('blocks', 'blocks2');
    }

    public function goToTelegram()
    {
        $blocks = DB::table('telegram')
            ->select('value')
            ->latest('datetime')
            ->limit(10)
            ->pluck('value');

        $blocks2 = DB::table('temp_data')
            ->select('value', 'datetime')
            ->latest('datetime')
            ->limit(5)
            ->pluck('datetime');

        return compact('blocks', 'blocks2');
    }
}




