<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PostChart extends Component
{
    public function render()
    {

        // $posts = Post::select('id', 'created_at')
        //     ->whereBetween(
        //         'created_at',
        //         [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        //     )->get();
        //get post count for each day of the week


        // $datas = [0, 0, 0, 0, 0, 0, 0];
        // //count post per day of week

        // foreach ($posts as $post) {
        //     $datas[$post->created_at->dayOfWeek] = $post->count();
        //     // array_merge(array_splice($datas, -1), $datas);
        // }
        // //move firt element to the end of array
        // array_push($datas, array_shift($datas));
        // print_r($datas);
        // $datas = [];
        // $total = [];
        // $post = Post::select([
        //     DB::raw('Date(created_at) as post_date'),
        //     DB::raw('COUNT(id) as post_count'),
        // ])
        //     ->whereBetween(
        //         'created_at',
        //         [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        //     )
        //     ->groupBy('post_date')
        //     ->get();
        // $post->each(function ($item) use (&$datas) { //each == foreach
        //     $datas[$item->data] = [
        //         // 'counts' => $item->counts,
        //         'post_count' => $item->post_count,
        //         'post_date' => $item->post_date
        //     ];
        //     $total[$item->post_date] = $item->post_count;
        // });

        // // Shikimet
        // $post->each(function ($item) use (&$total) {
        //     $total[] = $item->post_count;
        // });
        // // dd($total);
        $total = []; //totali per shikimin e dites(by default = null )
        $dates = collect(); //renditja e ditëve

        // Shto ditët e javës në array dhe by default jep vlerën 0
        foreach (range(-6, 0) as $i) {
            $date = Carbon::now()->endOfWeek($i)->format('Y-m-d');
            $dates->put($date, 0);
        }

        //Merr shumen e postimeve per ditët e javës
        $posts = Post::where('created_at', '>=', $dates->keys()->first())
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE( created_at ) as date'),
                DB::raw('COUNT( * ) as "count"')
            ])
            ->pluck('count', 'date');

            // Bashko vargjet
        $dates = $dates->merge($posts);

        // Jep rezultatin final (vlerat)
        foreach ($dates as $date => $count) {
            $total[] = $count;
        }


        // dd($posts);
        // dd($dates);
        // dd($total);
        return view('livewire.admin.dashboard.post-chart', [
            'datas' => $total,
        ]);
    }
}
