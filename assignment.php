

<?php
/*1. Write a program to print short form on english year.
Example: January to Jan, February to Feb and so on ?*/

echo "<hr>";
//2. Write a program to reverse a string.
$string = "PONDIT";
$length = strlen($string);
for ($i = ($length - 1); $i >= 0; $i--) {
    echo $string[$i];
}
echo "<hr>";
// 3. Write a program to find the length of a string.
$string = "PONDIT";
$length = strlen($string);
echo "</hr>";
//4. Write a program that prints the middle character of a string.
$country = "BANGLADESH";
echo "string is " . $country . "<br />";
$length = strlen($country);
echo "total length is " . $length . "<br/>";
$length = round($length / 2);
echo "middle string will be no " . $length;
echo $country[$length - 1];
echo "<hr>";
//5. Write a program to reverse a numeric array.
$a = array(1, 2, 3, 4, 5);
$x = array_reverse($a, true);
$y = array_reverse($a);
print_r($x);
echo '</br> ';
print_r($y);
//6. Write a program that prints out the first character of an item of a list.
echo "<hr>";
//7. Write a program that gives you access to a building only if
$wearing_mask = true;
$covid_negative = false;
$temparature = 98;
if (
    $wearing_mask && !$covid_negative && $temparature <= 98
) {
    echo "you can enter";
} else {
    echo "Enter is prohibited";
}
?>
