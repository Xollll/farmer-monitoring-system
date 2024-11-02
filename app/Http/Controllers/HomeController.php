<?php

namespace App\Http\Controllers;

use App\Models\PHLevel;
use App\Models\WaterQuality;

use Illuminate\Http\Request;

class HomeController extends Controller
{

   // Method to load the graph page with both moisture and pH level data
public function GraphPage()
    {
    // Fetch moisture data
    $Water_Data = WaterQuality::all();
    $labels = [];
    $data = [];
    foreach ($Water_Data as $value){
           $labels[] = $value['created_at']->format('Y-m-d H:i:s'); // Use timestamps for labels
           $data[] = $value['moisture_level']; // Use moisture_level for the data
    }

    //Fetch the latest PH data
    $latestPHData = PHLevel::latest()->first(); // Get only the most recent entry
    $phLevel = $latestPHData ? $latestPHData->ph_level : 7;  // Default to neutral pH 7 if no data

    // Pass both moisture and pH data to the view
    return view('home')
    ->with('labels', $labels)
    ->with('data', $data)
    ->with('PHData', $phLevel); // Pass the latest pH level to the view
    }

    // Method to return moisture chart data via API for real-time updates (AJAX)
    public function getChartData()
    {
        $Water_Data = WaterQuality::all();
        $labels = [];
        $data = [];
        foreach ($Water_Data as $value){
            $labels[] = $value['created_at']->format('Y-m-d H:i:s'); 
            $data[] = $value['moisture_level']; 
        }

        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    // Method to return pH chart data via API for real-time updates (AJAX)
    public function getPHData()
    {
        $Ph_data = PHLevel::all();
        $PHData = [];
        foreach ($Ph_data as $value){
            $PHData[] = $value['ph_level']; 
        }

        return response()->json(['PHData' => $PHData]);
    }

    public function storeMoistureData(Request $request)
{
    // Validate incoming request
    $request->validate([
        'moisture_level' => 'required|numeric',
    ]);

    // Store the moisture level in the database
    $moistureLevel = new WaterQuality();
    $moistureLevel->moisture_level = $request->moisture_level;
    $moistureLevel->save();

    // Check the count of records and delete the oldest if necessary
    $count = WaterQuality::count();
    if ($count > 15) {
        WaterQuality::orderBy('created_at', 'asc')->first()->delete();
    }

    return response()->json(['success' => true, 'message' => 'Moisture data saved.']);
}


}
