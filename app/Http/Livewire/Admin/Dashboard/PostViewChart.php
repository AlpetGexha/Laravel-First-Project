<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PostViewChart extends Component
{
    public function render()
    {
        $datas = [];
        $total = [];
        $mounth = [];
        $postview = Post::select([
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as data"),
            DB::raw('COUNT(id) as post_count'),
            DB::raw('SUM(views) as views_sum')
        ])
            ->groupBy('data')
            ->get();
        $postview->each(function ($item) use (&$datas) { //each == foreach
            $datas[$item->data] = [
                // 'counts' => $item->counts,
                'views' => $item->views_sum,
                'data' => $item->data
            ];
            $total[] = $item->views_sum;
        });

        // Shikimet
        $postview->each(function ($item) use (&$total) {
            $total[] = $item->views_sum;
        });

        // Data
        $postview->each(function ($item) use (&$mounth) {
            $mounth[] = $item->data;
        });
        // dd($total);
        // dd($mounth);
        // dd($mounth);
        return view('livewire.admin.dashboard.post-view-chart', [
            'views' => $total,
            'mounth' => $mounth,
        ]);
    }
}
