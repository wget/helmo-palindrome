<?php

/*
 * isStringPalindrome
 *
 * This functions checks if the string passed as argument is actually
 * a palindrome or not.
 *
 * @param (string) the expression to evaluate
 * @return (bool) is the string a palindrome
 */
function isStringPalindrome($text) {
    if ($text === null) {
        return false;
    }
    $left = 0;
    $right = strlen($text) - 1;
    while ($left < $right) {
        if ($text[$left++] != $text[$right--]) {
            return false;
        }
    }
    return true;
}

/*
 * printPalindromes
 *
 * This functions aims at printing palindromes from an expression removing
 * special characters and numbers. The expression is evaluated as a succession
 * of words.
 *
 * @param (string) the expression to evaluate
 */
function printPalindromes($string) {

    # Remove all characters not a letter and not a space
    $string = preg_replace("/[^A-Za-z ]/", "", $string);

    # Put the string to lowercase, otherwise uppercase letters won't equal
    # lowercase letters
    $string = strtolower($string);

    # Split the string in words (words is now an array)
    $words = explode (" ", $string);

    for ($i = 0; $i < sizeof($words); $i++) {
        if (isStringPalindrome($words[$i])) {
            echo $words[$i] . PHP_EOL;
        }
    }
}

/*
 * printAllPalindromes
 *
 * This functions aims at printing palindromes from an expression removing
 * special characters, numbers and spaces. The expression is evaluated as
 * a succession of letters.
 *
 * Palyndromes of one letter are not displayed.
 *
 * @param (string) the expression to evaluate
 */
function printAllPalindromes($string) {

    # Remove all characters not a letter
    $string = preg_replace("/[^A-Za-z]/", "", $string);

    # Put the string to lowercase, otherwise uppercase letters won't equal
    # lowercase letters
    $string = strtolower($string);

    $stringLength = strlen($string);

    for ($i = 0; $i < $stringLength; $i++) {
        $left = $i;
        $right = $stringLength;
        while ($left < $right) {
            $word = substr($string, $left, $right - $left);
            if (strlen($word) > 1 && isStringPalindrome($word)) {
                echo $word . PHP_EOL;
            }
            $right--;
        }
    }
}


$expression = 'Aujourd\'hui, nous allons faire du kayak sur la Lesse avec Anna.';

$msg = 'Word palindromes: ';
for ($i = 0; $i < strlen($msg); $i++) { echo '-'; }; echo PHP_EOL;
echo $msg . PHP_EOL;
for ($i = 0; $i < strlen($msg); $i++) { echo '-'; }; echo PHP_EOL;
printPalindromes($expression);

echo PHP_EOL;

$msg = 'All palindromes: ';
for ($i = 0; $i < strlen($msg); $i++) { echo '-'; }; echo PHP_EOL;
echo $msg . PHP_EOL;
for ($i = 0; $i < strlen($msg); $i++) { echo '-'; }; echo PHP_EOL;
printAllPalindromes($expression);
