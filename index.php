<?php

/**
 * [mail_timing_format description]
 * @param   datetime $date_time the input datetime format
 * @return  datetime the expected format based on present time
 * @author Jitin Joseph
 * @created date   2020-04-11
 */
function mail_timings_format($input_date_time=""){

    $output_date_time = "";

    $current_date_time = date('Y-m-d H:i:s');

    if(!empty($input_date_time)){
        $year = date('Y', strtotime($input_date_time));
        $month = date('m', strtotime($input_date_time));
        $day = date('j', strtotime($input_date_time));//in non leading 0 format
        $day_name = date('D', strtotime($input_date_time));
        $month_name = date('M', strtotime($input_date_time));
        $time = date('g:i A', strtotime($input_date_time));
        $input_dmY = date('d-m-Y', strtotime($input_date_time));

        //check if date is today
        //extract day from current time
        $current_day = date('j', strtotime($current_date_time));//in non leading 0 format
        //extract day from current time
        $current_year = date('Y', strtotime($current_date_time));
        //extract d-m-Y from current time
        $current_dmY = date('d-m-Y', strtotime($current_date_time));

        switch (true) {

            case ($year < $current_year):
            $output_date_time = $day."/".$month."/".$year;// in format like 7/12/2020
            break;

            case ($input_dmY < $current_dmY):
            $output_date_time = $month_name." ".$day;// in format like Mar 10
            break;

            case ($day == $current_day):
            $output_date_time = $time;// in format like 6.23 AM
            break;

        }
    }

    return $output_date_time;
}
