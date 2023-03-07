<?php
  
namespace App\Enums;
 
enum TypeEnum:string {
    case Bench = 'bench';
    case Squat = 'squat';
    case Deadlift = 'deadlift';
    case ShoulderPress = 'shoulderpress';
    case BicepCurl = 'bicepcurl';
    case TricepPulldown = 'triceppulldown';
    case Treadmill = 'treadmill';
}