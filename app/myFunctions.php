<?php
    function getRating($salonId) {
//      (5*252 + 4*124 + 3*40 + 2*29 + 1*33) / (252+124+40+29+33) = 4.11
        $fiveStarCount = DB::table('comments')->where('salon_id', $salonId)->where('rating', 5)->count();
        $fourStarCount = DB::table('comments')->where('salon_id', $salonId)->where('rating', 4)->count();
        $threeStarCount = DB::table('comments')->where('salon_id', $salonId)->where('rating', 3)->count();
        $twoStarCount = DB::table('comments')->where('salon_id', $salonId)->where('rating', 2)->count();
        $oneStarCount = DB::table('comments')->where('salon_id', $salonId)->where('rating', 1)->count();

        $weightEachRating = $fiveStarCount*5 + $fourStarCount*4 + $threeStarCount*3 + $twoStarCount*2 + $oneStarCount*1;
        $totalRating =  $fiveStarCount + $fourStarCount + $threeStarCount + $twoStarCount + $oneStarCount;

        return $weightEachRating / ($totalRating !== 0 ? $totalRating : 1);
    }
?>
