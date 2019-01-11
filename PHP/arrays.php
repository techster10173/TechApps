<?php

/* Write method arraySum that calculates and returns the sum of the
 * entries in a specified one-dimensional array. For example, is this
 * method was passed the array [1, 3, 2, 7, 3] then it would return 16
 */
function arraySum($arr)
{
    $sum = 0;
    foreach($arr as $tempnum){
      $sum += $tempnum;
    }
    return $sum;
}

/* Write method rowSums that calculates the sums of each of the rows
 * in a given two-dimensionalarray. This method returns a 1d array
 * with one entry for each row of arr2D such that each entry is the
 * sum of the corresponding row in arr2D. For example, the following
 * 2D array would reutrn {16, 32, 28, 20}
 *
 *  1   3   2   7   3
 *  10  10  4   6   2
 *  5   3   5   9   6
 *  7   6   4   2   1
 */
function rowSums($arr2D)
{
    $sumArray = array();
    foreach($arr2D as $tempArr){
      $sumArray[] += arraySum($tempArr);
    }
    return $sumArray;
}

/* A 2D array is diverse if no two of its rows have entries that sum
 * to the same value. For example the following array is diverse
 *
 *  1   3   2   7   3   =>  16
 *  10  10  4   6   2   =>  32
 *  5   3   5   9   6   =>  28
 *  7   6   4   2   1   =>  20
 *
 * because the sum of each row is unique. While this array is not diverse
 *
 *  1   1   5   3   4   =>  14*
 *  12  7   6   1   9   =>  35
 *  8   11  10  2   5   =>  36
 *  3   2   3   0   6   =>  14*
 *
 * because two of the rows have the same sum.
 *
 *  Write the method isDiverse that determines whether or not a given 2D
 * array is diverse. This method should return true if all the row sums
 * in the given array are unique; otherwise it should return false.
 */
function isDiverse($arr2D)
{
  $sumArray = rowSums($arr2D);
  foreach($sumArray as $i => $black){
      foreach($sumArray as $j => $white){
          if($i != $j){
              if($white == $black){
                 return false;
              }
          }
      }
  }
  return true;
}

//Write code to call and test your methods below here!
$myArray = array(1,3,2,7,3);
$my2dArray = array(array(1,1,5,3,4),array(12,7,6,1,9),array(8,11,10,2,5),array(3,2,3,0,6));
//echo arraySum($myArray);
//print_r(rowSums($my2dArray));
isDiverse($my2dArray);





?>
