<?php

namespace App\Http\Livewire;

use App\Charts\AnalyticChart;
use App\Client;
use App\Subclient;
use Carbon\Carbon;
use Livewire\Component;
use RezuanKassim\BQAnalytic\Analytic as BQAnalytics;
use RezuanKassim\BQAnalytic\BQAnalytic;

class Analytic extends Component
{
    public $client;
    public $date;
    private $start_date;
    private $end_date;
    public $subclient;

    public function mount(Client $client, $subclient = null)
    {
        $this->client = $client;
        $this->date = Carbon::yesterday()->format('d/m/Y').' - '.Carbon::yesterday()->format('d/m/Y');
        $this->start_date = Carbon::yesterday()->format('Ymd');
        $this->end_date = Carbon::yesterday()->format('Ymd');
        $this->subclient = $subclient;
    }

    public function updatedDate()
    {
        $data = $this->getData(Carbon::createFromFormat('d/m/Y', explode(' - ', $this->date)[0])->format('Ymd'), Carbon::createFromFormat('d/m/Y', explode(' - ', $this->date)[1])->format('Ymd'));

        $this->emit('chartUpdated', json_encode($data));
    }

    public function render()
    {
        return view('livewire.analytic', [
            'activeUsersByPlatformChart' => $this->activeUsersByPlatformChart(),
            'allEventWithEventCountChart' => $this->allEventWithEventCountChart(),
            'user_analytic' => auth()->user()->analytic,
            'analytics' => BQAnalytics::all()
        ]);
    }

    protected function getData($start_date, $end_date)
    {
        $analytic = $this->analytic($start_date, $end_date);

        return $this->formatData($analytic->getAllAnalytics()[$this->client->name]);
    }

    protected function formatData($data)
    {
        return collect($data)->map(function ($d, $key) {
            if ($key == 'activeUsersByPlatform') {
                return collect($d)->merge([
                    'labels' => collect($d)->pluck('date')->toArray(),
                    'ios_platform' => collect($d)->pluck('ios_platform')->toArray(),
                    'android_platform' => collect($d)->pluck('android_platform')->toArray(),
                    'web_platform' => collect($d)->pluck('other_platform')->toArray(),
                    'datasets' => [
                        [
                            'label' => 'IOS Platform',
                            'data' => collect($d)->pluck('ios_platform')->toArray()
                        ],
                        [
                            'label' => 'Android Platform',
                            'data' => collect($d)->pluck('android_platform')->toArray()
                        ],
                        [
                            'label' => 'Web Platform',
                            'data' => collect($d)->pluck('other_platform')->toArray()
                        ]
                    ]
                ])->only([
                    'labels', 'ios_platform', 'android_platform', 'web_platform', 'datasets'
                ])->toArray();
            } elseif ($key == 'allEventWithEventCount') {
                return collect($d)->merge([
                    'labels' => collect($d)->pluck('event_name')->toArray(),
                    'data' => collect($d)->pluck('event_count')->toArray()
                ])->only([
                    'labels', 'data'
                ])->toArray();
            }

            return $d;
        });
    }

    protected function analytic($start_date, $end_date)
    {
        return new BQAnalytic(auth()->user(), $start_date, $end_date, $this->client->name, $this->subclient->app_id ?? '');
    }

    protected function activeUsersByPlatformChart()
    {
        $chart = new AnalyticChart();

        if (isset($this->getData($this->start_date, $this->end_date)['activeUsersByPlatform'])) {
            $data = $this->getData($this->start_date, $this->end_date)['activeUsersByPlatform'];

            $chart->labels($data['labels']);
            $chart->dataset('IOS Platform', 'line', $data['ios_platform'])->color('#68d391')->fill(false)->backgroundColor('#68d391');
            $chart->dataset('Android Platform', 'line', $data['android_platform'])->color('#fc8181')->fill(false)->backgroundColor('#fc8181');
            $chart->dataset('Web Platform', 'line', $data['web_platform'])->color('#f6ad55')->fill(false)->backgroundColor('#f6ad55');
        } else {
            $chart->dataset('', 'line', []);
        }

        $chart->options([
            'scales' => [
                'xAxes' => [
                    [
                        'offset' => true
                    ]
                ]
            ]
        ]);
    
        return $chart;
    }

    protected function allEventWithEventCountChart()
    {
        $chart = new AnalyticChart();

        if (isset($this->getData($this->start_date, $this->end_date)['allEventWithEventCount'])) {
            $data = $this->getData($this->start_date, $this->end_date)['allEventWithEventCount'];

            $chart->labels($data['labels']);
            $chart->dataset('', 'doughnut', $data['data'])->backgroundColor(['#68d391', '#fc8181', '#f6ad55', '#f6e05e', '#4fd1c5', '#63b3ed', '#7f9cf5', '#b794f4', '#f687b3']);
        } else {
            $chart->dataset('', 'line', []);
        }

        $chart->displayAxes(false);
        
        return $chart;
    }
}
