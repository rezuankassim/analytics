<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;
use RezuanKassim\BQAnalytic\Analytic;

class ClientAnalyticFilterController extends Controller
{
    public function update(Client $client, Request $request)
    {
        $user = User::find(auth()->user()->id);
        $analytics = Analytic::whereIn('name', collect($request->input())->filter(function ($value) {
            return $value === "1";
        })->map(function ($value, $key) {
            return str_replace('_', ' ', $key);
        })->flatten(1)->toArray())->get();

        $user->analyticPreferences()->where('filterable_type', get_class($client))->where('filterable_id', $client->id)->delete();

        foreach ($analytics as $analytic) {
            $user->analyticPreferences()->create([
                'analytic_id' => $analytic->id,
                'filterable_type' => get_class($client),
                'filterable_id' => $client->id
            ]);
        }

        return redirect()->route('clients_analytics.index', $client->id);
    }
}
