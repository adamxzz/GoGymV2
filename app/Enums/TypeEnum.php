<?php
  
namespace App\Enums;
 
enum TypeEnum:string {
    case Liters = 'liters';
    case Duration = 'duration';
    case Calories = 'calories';
    case Quantity = 'quantity';
    case Yes_No = 'yes_no';
}