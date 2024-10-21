<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mq7;
use App\Models\mq135;
use App\Models\hum_data;
use App\Models\temp_data;

use Illuminate\Support\Facades\DB;
class apiController extends Controller
{
    public function __construct()
    {
        $this->mq7 = new mq7();
        $this->mq135 = new mq135();
        $this->temp_data = new temp_data();
    }

    public function apiMQ135()
    {
        $blocks = DB::table('mq135')
            ->select('value')
            ->latest('datetime')
            ->limit(1)
            ->pluck('value');

        return compact('blocks');
    }

    public function apiMQ7()
    {
        $blocks = DB::table('mq7')
            ->select('value')
            ->latest('datetime')
            ->limit(1)
            ->pluck('value');

        return compact('blocks');
    }

    public function apiTemp()
    {
        $blocks = DB::table('temp_data')
            ->select('value')
            ->latest('datetime')
            ->limit(1)
            ->pluck('value');

        return compact('blocks');
    }
}
