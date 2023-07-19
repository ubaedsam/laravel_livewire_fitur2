<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Analythics extends Component
{
    // Tempat data subscriber
    public $days = [];

    // Data array (Panjang nilai chart)
    public $subscribers = [30, 36, 42, 78, 88, 109, 205, 325, 349, 480, 556];

    // Nilai akhir data
    public $recentSubscribers = 556;


    // Proses menghitung panjang nilai data chart
    // keterangan range 13 sampai dengan 24 adalah panjang nilai index di array subscribers
    public function mount()
    {
        $this->days = collect(range(13, 24))->map(function ($number) {
            return 'Jun' . $number;
        });
    }

    // Proses menampilkan jumlah data dari hasil proses perhitungan
    public function fetchData()
    {
        $subscribers = array_replace($this->subscribers, [10 => $this->recentSubscribers += 10]);

        $this->emit('refreshChart', ['seriesData'=>$subscribers]);
    }

    public function render()
    {
        return view('livewire.analythics')->layout('layouts.realtime');
    }
}
