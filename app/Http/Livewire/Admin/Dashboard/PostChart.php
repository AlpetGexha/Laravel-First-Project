<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;

class PostChart extends Component
{
    public function render()
    {

        $posts = Post::select('id', 'created_at')
            ->whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->get();

        $datas = [0, 0, 0, 0, 0, 0, 0];

        foreach ($posts as $post) {

            $datas[$post->created_at->dayOfWeek] = $post->id;
            // array_merge(array_splice($datas, -1), $datas);
        }
        //move firt element to the end of array
        array_push($datas, array_shift($datas));
        // print_r($datas);
        return view('livewire.admin.dashboard.post-chart', [
            'datas' => $datas
        ]);
    }
}
