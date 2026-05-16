<?php

/*
 Easy Mode: Two Sum (simple and explained)

 Description:
 - Given an array of integers and a target value, find two distinct
   indices i and j such that numbers[i] + numbers[j] == target.
 - This "easy mode" version uses clear variable names and prints a
   short description before showing results.

 Usage: run `php twosum.php` — it will execute three example tests.
*/

// This function finds two numbers that add up to a target sum
// It returns the positions (indices) of those two numbers
// This is a super fast way using a trick - we remember numbers we've seen
function twoSumEasy(array $numbers, int $target): array {
    // Create a storage area to remember numbers we've already looked at
    // We'll store them like: number => its position
    $seen = [];

    // Go through each number in our list one by one
    // $i is the position, $val is the actual number
    foreach ($numbers as $i => $val) {
        // Calculate what other number we need to reach our target
        // For example, if target is 9 and current number is 2, we need 7
        $need = $target - $val;

        // Check if we've already seen that needed number earlier
        // If yes, that means we found our answer!
        if (isset($seen[$need])) {
            // Return the positions of both numbers that add up
            // First the position of the number we saw before, then current position
            return [$seen[$need], $i];
        }

        // Remember this current number and its position for later
        // Store it in our storage area
        $seen[$val] = $i;
    }

    // If we couldn't find two numbers that add up, return empty (no answer)
    return [];
}

// This helper function displays results nicely
function printEasyResult(array $numbers, int $target): void {
    // Print what this function does
    echo "Easy Mode: Finds two indices whose values sum to the target.\n";
    
    // Show the list of numbers and what we're trying to reach
    echo "Array: [" . implode(', ', $numbers) . "]  Target: $target\n";
    
    // Call our function to find the answer
    $res = twoSumEasy($numbers, $target);
    
    // Print the result nicely
    echo 'Output: [' . implode(',', $res) . "]\n\n";
}

// --- Let's try some examples ---
// Example 1: Find two numbers in [2, 7, 11, 15] that add up to 9
// Answer should be positions 0 and 1 because 2 + 7 = 9
printEasyResult([2, 7, 11, 15], 9);

// Example 2: Find two numbers in [3, 2, 4] that add up to 6
// Answer should be positions 1 and 2 because 2 + 4 = 6
printEasyResult([3, 2, 4], 6);

// Example 3: Find two numbers in [3, 3] that add up to 6
// Answer should be positions 0 and 1 because 3 + 3 = 6
printEasyResult([3, 3], 6);

