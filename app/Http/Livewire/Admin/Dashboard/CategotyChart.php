<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CategotyChart extends Component
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
        $category = Category::where('created_at', '>=', $dates->keys()->first())
            ->where('is_active', 1)
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE( created_at ) as date'),
                DB::raw('COUNT( * ) as "count"')
            ])
            ->pluck('count', 'date');

        // Bashko vargjet
        $dates = $dates->merge($category);

        // Jep rezultatin final (vlerat)
        foreach ($dates as $date => $count) {
            $total[] = $count;
        }


        return view('livewire.admin.dashboard.categoty-chart', [
            'datas' => $total
        ]);
    }
}
