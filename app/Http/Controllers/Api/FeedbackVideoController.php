<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedBackVideo;
use Exception;

class FeedbackVideoController extends Controller

{
    public function feedbackVideos()
    {
        try {
            $feedbackvideo = FeedBackVideo::paginate(10);

            $videosData = $feedbackvideo->map(function($video) {
                return [
                    'video_url' =>   asset('video/'.$video->video_url), 
                    'category' => $video->category,
                    'meta_tag' => $video->meta_tag,  
                    'meta_description' => $video->meta_description, 
                ];
            });

            return response()->json([
                'status' => $feedbackvideo->isEmpty() ? false : true,
                'videosData' => $videosData,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while fetching feedback videos.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
