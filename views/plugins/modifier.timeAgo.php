<?php 
/** 
 * Smarty plugin 
 * @package Smarty 
 * @subpackage plugins 
 */ 


/** 
 * Smarty date modifier plugin 
 * Purpose:  converts unix timestamps or datetime strings to words 
 * Type:     modifier<br> 
 * Name:     timeAgo<br> 
 * @author   Stephan Otto (translated into English by David Megginson)
 * @param string 
 * @return string 
 */ 
function smarty_modifier_timeAgo( $date) 
{ 
    // for using it with preceding 'vor'            index 
      $timeStrings = array(   'just now',            // 0       <- now or future posts :-) 
                        'second ago', 'seconds ago',    // 1,1 
                        'minute ago','minutes ago',      // 3,3 
                        'hour ago', 'hours ago',   // 5,5 
                        'day ago', 'days ago',         // 7,7 
                        'week ago', 'weeks ago',      // 9,9 
                        'month ago', 'months ago',      // 11,12 
                        'year ago','years ago');      // 13,14 
      $debug = false; 
      $sec = time() - (( strtotime($date)) ? strtotime($date) : $date); 
       
      if ( $sec <= 0) return $timeStrings[0]; 
       
      if ( $sec < 2) return $sec." ".$timeStrings[1]; 
      if ( $sec < 60) return $sec." ".$timeStrings[2]; 
       
      $min = $sec / 60; 
      if ( floor($min+0.5) < 2) return floor($min+0.5)." ".$timeStrings[3]; 
      if ( $min < 60) return floor($min+0.5)." ".$timeStrings[4]; 
       
      $hrs = $min / 60; 
      echo ($debug == true) ? "hours: ".floor($hrs+0.5)."<br />" : ''; 
      if ( floor($hrs+0.5) < 2) return floor($hrs+0.5)." ".$timeStrings[5]; 
      if ( $hrs < 24) return floor($hrs+0.5)." ".$timeStrings[6]; 
       
      $days = $hrs / 24; 
      echo ($debug == true) ? "days: ".floor($days+0.5)."<br />" : ''; 
      if ( floor($days+0.5) < 2) return floor($days+0.5)." ".$timeStrings[7]; 
      if ( $days < 7) return floor($days+0.5)." ".$timeStrings[8]; 
       
      $weeks = $days / 7; 
      echo ($debug == true) ? "weeks: ".floor($weeks+0.5)."<br />" : ''; 
      if ( floor($weeks+0.5) < 2) return floor($weeks+0.5)." ".$timeStrings[9]; 
      if ( $weeks < 4) return floor($weeks+0.5)." ".$timeStrings[10]; 
       
      $months = $weeks / 4; 
      if ( floor($months+0.5) < 2) return floor($months+0.5)." ".$timeStrings[11]; 
      if ( $months < 12) return floor($months+0.5)." ".$timeStrings[12]; 
       
      $years = $weeks / 51; 
      if ( floor($years+0.5) < 2) return floor($years+0.5)." ".$timeStrings[13]; 
      return floor($years+0.5)." ".$timeStrings[14]; 
} 
