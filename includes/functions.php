<?php


const PRESSURE_TO_ATM = array(
  "pascal" => 0.000009869,
  "megapascal" => 9.8692,
  "bar" => 0.9872,
  "mbar" => 0.0009872,
  "atm" => 1,
  "psi" => 0.06805,
  "torr" => 0.0013158,
  "mmtorr" => 0.000001316,
  "kg/cm2" => 0.9678,
);

const FLOWRATE_TO_LITERSEC = array(
  "cubic_feet_per_min" => 0.47195,
  "cubic_meters_per_sec" => 1000,
  "cubic_meters_per_min" => 16.7,
  "cubic_meters_per_hr" => .27778,
  "liters_per_sec" => 1,
  "liters_per_min" => .0166667,
  "liters_per_hr" => .000277778,
  "gallons_per_min" => .0631,    
);  

const LEAKRATE_TO_MBARLSEC = array(
  "mbar_liters/sec" => 1,
  "std_cc/hr" => .000281,
  "std_cc/min" => .0169,
  "std_cc/sec" => 1.013,
  "torr_liters/sec" => 1.33,
  "pascal_liters/sec" => .01,
  "molecules/sec" => 45.24,
); 

const VOLUME_TO_LITER = array(
  "cubic_inches" => 0.0163871,
  "cubic_feet" => 28.3168,
  "cubic_centimeters" => 0.001,
  "cubic_meters" => 1000,
  "imperial_gallons" => 4.54609,
  "imperial_quarts" => 1.13652,
  "imperial_pints" => 0.568261,
  "us_gallons" => 3.78541,
  "us_quarts" => 0.946353,
  "us_pints" => 0.473176,
  "liters" => 1,
  "milliliters" => 0.001,
);  

function optionize($string) {
  return str_replace(' ', '_', strtolower($string));
}

// The function float_to_string formats a float into a string 
// while also avoiding default use of scientific notation.
// Rounds to $precision and trims extra trailing zeros.
function float_to_string($float, $precision=6) {
  // Typecast to insure value is a float
  $float = (float) $float;
  $string = number_format($float, $precision, '.', '');
  $string = rtrim($string, '0');
  $string = rtrim($string, '.');
  return $string;
}


// Flow Rate
function convert_to_litersec($value, $from_unit) {
  if(array_key_exists($from_unit, FLOWRATE_TO_LITERSEC)) {
    return $value * FLOWRATE_TO_LITERSEC[$from_unit];
  } else {
    return "Unsupported unit.";
  }
}
  
function convert_from_litersec($value, $to_unit) {
  if(array_key_exists($to_unit, FLOWRATE_TO_LITERSEC)) {
    return $value / FLOWRATE_TO_LITERSEC[$to_unit];
  } else {
    return "Unsupported unit.";
  }
}

function convert_flowrate($value, $from_unit, $to_unit) {
  $litersec_value = convert_to_litersec($value, $from_unit);
  $new_value = convert_from_litersec($litersec_value, $to_unit);
  return $new_value;
}


//Pressure
function convert_to_atm($value, $from_unit) {
  if(array_key_exists($from_unit, PRESSURE_TO_ATM)) {
    return $value * PRESSURE_TO_ATM[$from_unit];
  } else {
    return "Unsupported unit.";
  }
}
  
function convert_from_atm($value, $to_unit) {
  if(array_key_exists($to_unit, PRESSURE_TO_ATM)) {
    return $value / PRESSURE_TO_ATM[$to_unit];
  } else {
    return "Unsupported unit.";
  }
}

function convert_pressure($value, $from_unit, $to_unit) {
  $atm_value = convert_to_atm($value, $from_unit);
  $new_value = convert_from_atm($atm_value, $to_unit);
  return $new_value;
}

// Volume
function convert_to_liters($value, $from_unit) {
  if(array_key_exists($from_unit, VOLUME_TO_LITER)) {
    return $value * VOLUME_TO_LITER[$from_unit];
  } else {
    return "Unsupported unit.";
  }
}
  
function convert_from_liters($value, $to_unit) {
  if(array_key_exists($to_unit, VOLUME_TO_LITER)) {
    return $value / VOLUME_TO_LITER[$to_unit];
  } else {
    return "Unsupported unit.";
  }
}

function convert_volume($value, $from_unit, $to_unit) {
  $liter_value = convert_to_liters($value, $from_unit);
  $new_value = convert_from_liters($liter_value, $to_unit);
  return $new_value;
}

// Leak Rate
function convert_to_mbarlsec($value, $from_unit) {
  if(array_key_exists($from_unit, LEAKRATE_TO_MBARLSEC)) {
    return $value * LEAKRATE_TO_MBARLSEC[$from_unit];
  } else {
    return "Unsupported unit.";
  }
}
  
function convert_from_mbarlsec($value, $to_unit) {
  if(array_key_exists($to_unit, LEAKRATE_TO_MBARLSEC)) {
    return $value / LEAKRATE_TO_MBARLSEC[$to_unit];
  } else {
    return "Unsupported unit.";
  }
}

function convert_leakrate($value, $from_unit, $to_unit) {
  $mbarlsec_value = convert_to_mbarlsec($value, $from_unit);
  $new_value = convert_from_mbarlsec($mbarlsec_value, $to_unit);
  return $new_value;
}





?>
