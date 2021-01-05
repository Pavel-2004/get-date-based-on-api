# get-date-based-on-api
$test = new getDays();
echo($test->getDate('2021-01-01', 5)); 

first paramter of the argument takes the date as a string and the second takes the amount of days it will take to complete the order. 

This will return an integer that will either be more by 1 than the initial value given or stay the same. It will be more in the case that the date given happens to be on a public holiday. 
