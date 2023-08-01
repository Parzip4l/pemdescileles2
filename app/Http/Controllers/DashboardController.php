<?php

namespace App\Http\Controllers;

use App\Remaja;
use App\Bumil;
use App\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remaja = Remaja::all()->count();
        $bumil = Bumil::all()->count();
        $warga = Warga::all()->count();

        $dataremaja1 = Remaja::select('rw', 'jenis_kelamin', \DB::raw('count(*) as total_count'))
            ->groupBy('rw', 'jenis_kelamin')
            ->get();
            $labels = $dataremaja1->pluck('rw')->toArray();
            $lakiData = array_fill(0, count($labels), 0);
            $perempuanData = array_fill(0, count($labels), 0);
            
            // Fill the actual counts based on the query results
            foreach ($dataremaja1 as $data) {
                $index = array_search($data->rw, $labels); // Find the index of RW in the labels array
                if ($data->jenis_kelamin === 'LAKI-LAKI') {
                    $lakiData[$index] = $data->total_count; // Fill LAKI-LAKI counts
                } elseif ($data->jenis_kelamin === 'PEREMPUAN') {
                    $perempuanData[$index] = $data->total_count; // Fill PEREMPUAN counts
                }
            }
            
            // Prepare datasets for Chart.js
            $datasets = [
                [
                    'label' => 'LAKI-LAKI',
                    'backgroundColor' => '#6571ff',
                    'data' => $lakiData,
                ],
                [
                    'label' => 'PEREMPUAN',
                    'backgroundColor' => '#ff3366',
                    'data' => $perempuanData,
                ],
            ];
            
            // Combine labels and datasets into a single array for use in the chart
            $dataremaja = [
                'labels' => $labels,
                'datasets' => $datasets,
            ];
            
        // Data Bumil
        $countsByRWbumil = Bumil::select('rw', \DB::raw('count(*) as count'))
                    ->groupBy('rw')
                    ->orderBy('rw')
                    ->get();
        
        $labels = $countsByRWbumil->pluck('rw')->toArray();
        $data = $countsByRWbumil->pluck('count')->toArray();
        
        $databumil = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Ibu Hamil',
                    'backgroundColor' => '#6571ff',
                    'data' => $data,
                ],
            ],
        ];

        return view('dashboard',
        compact(
            'remaja',
            'bumil',
            'dataremaja',
            'databumil',
            'warga'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
