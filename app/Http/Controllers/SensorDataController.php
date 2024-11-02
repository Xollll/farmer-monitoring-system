<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Events\SensorDataReceived;

class SensorDataController extends Controller
{
    public function receiveData(Request $request)
    {
        // Retrieve moisture and pH levels from the request
        $moisture = $request->input('moisture');
        $ph = $request->input('ph');

        // You can perform validation here if needed
        if (is_null($moisture) || is_null($ph)) {
            return response()->json(['error' => 'Invalid data received'], 400);
        }

        // For now, just log the received data
        Log::info('Moisture Level: ' . $moisture . ', pH Level: ' . $ph);

        // Broadcast the data to the front end
    broadcast(new SensorDataReceived($moisture, $ph));

        // Return a response to indicate successful reception
        return response()->json(['status' => 'Data received and broadcasted successfully']);
    }
}
