<?php

namespace App\Http\Livewire\Admin\Dashboard\PostView;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Week extends Component
{
    public function render()
    {
        $total = []; //totali per shikimin e dites(by default = null )
        $dates = collect(); //renditja e ditëve

        // Shto ditët e javës në array dhe by default jep vlerën 0
        foreach (range(-6, 0) as $i) {
            $date = Carbon::now()->endOfWeek($i)->format('Y-m-d');
            $dates->put($date, 0);
        }

        //Merr shumen e postimeve per ditët e javës
        $category = Post::where('created_at', '>=', Carbon::now()->format('Y-m-d'))
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE( created_at ) as date'),
                DB::raw('SUM(views) as sum')
            ])
            ->pluck('sum', 'date');

        // Bashko vargjet
        // $dates = $dates->merge($category);
        foreach ($category as $date => $sum) {
            $dates->put($date, (int) $sum);
        }
        // Jep rezultatin final (vlerat)
        foreach ($dates as $date => $sum) {
            $total[] = (int) $sum;
        }
        //Jep ditet e javes
        $data_time = [];
        foreach ($dates as $date => $date) {
            $data_time[] = $date;
        }

        // dd($data_time);
        // dd($posts->views_sum);
        // dd($category);
        // dd($dates);
        // dd($total);
        return view('livewire.admin.dashboard.post-view.week', [
            'datas' => $total,
            'data_time' => $data_time
        ]);
    }
}
