<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function pageViewed(Request $request)
    {
        $data = $request->all();

        $data['ip'] = $request->ip();

        Log::channel('page_events')->info('Page viewed event triggered', $data);
    }

    public function videoWatched(Request $request)
    {
        $data = $request->all();

        $data['ip'] = $request->ip();

        Log::channel('page_events')->info('Video watched event triggered', $data);

        return response()->json([
            'message' => 'Log data fetched successfully',
        ], 200); 
    }

    /**
     * You can use this function to return log data
     * 
     * @return array
     */
    public function getEventLogData(): array
    {
        $logFile = storage_path('logs/page-events.log');
    
        if (!File::exists($logFile)) {
            return response()->json(['message' => 'Log file not found'], 404);
        }
    
        $logs = File::lines($logFile);
        
        $groupedLogs = [];
    
        foreach ($logs as $log) {
            preg_match('/\{.*\}/', $log, $matches);
            
            if (isset($matches[0])) {
                $logData = json_decode($matches[0], true);
                
                $userId = $logData['userId'];
                
                if (isset($groupedLogs[$userId])) {
                    $groupedLogs[$userId]['events'][] = $logData;
                } else {
                    $groupedLogs[$userId] = [
                        'userId' => $userId,
                        'events' => [$logData]
                    ];
                }
            }
        }

        return $groupedLogs;
    }
}
