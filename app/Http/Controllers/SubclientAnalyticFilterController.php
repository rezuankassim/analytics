<?php

namespace App\Http\Controllers;

use App\Client;
use App\Subclient;
use App\User;
use Illuminate\Http\Request;
use RezuanKassim\BQAnalytic\Analytic;

class SubclientAnalyticFilterController extends Controller
{
    public function update(Client $client, Subclient $subclient, Request $request)
    {
        $user = User::find(auth()->user()->id);
        $analytics = Analytic::whereIn('name', collect($request->input())->filter(function ($value) {
            return $value === "1";
        })->map(function ($value, $key) {
            return str_replace('_', ' ', $key);
        })->flatten(1)->toArray())->get();

        foreach($analytics as $analytic) {
            $user->analyticPreferences()->create([
                'analytic_id' => $analytic->id,
                'filterable_type' => get_class($subclient),
                'filterable_id' => $subclient->id
            ]);
        }

        return redirect()->route('subclients_analytics.index', ['client' => $client, 'subclient' => $subclient]);
    }
}
