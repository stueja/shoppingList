
<?php
$hash = password_hash("dd", PASSWORD_DEFAULT);

echo 'hellow';


// echo substr_count($text, 'b'); // 2

// the string is reduced to 's is a test', so it prints 1
// echo substr_count($text, 'is', 3);

// // the text is reduced to 's i', so it prints 0
// echo substr_count($text, 'is', 3, 3);

// // generates a warning because 5+10 > 14
// echo substr_count($text, 'is', 5, 10);


// // prints only 1, because it doesn't count overlapped substrings
// $text2 = 'gcdgcdgcd';
// echo substr_count($text2, 'gcdgcd');
?>