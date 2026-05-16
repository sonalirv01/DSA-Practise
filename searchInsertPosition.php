<?php

// This function finds where a number is in a sorted list
// If the number exists, it returns its position
// If it doesn't exist, it tells us where we should insert it
function searchInsertPosition(array $nums, int $target): int {
    // Set up the left boundary - start from the beginning
    $lo = 0;
    
    // Set up the right boundary - start from the end
    // We use count($nums) - 1 because the last position is at (length - 1)
    $hi = count($nums) - 1;
    
    // Keep searching while there are still numbers to check
    // When left > right, we've checked everything
    while ($lo <= $hi) {
        // Find the middle position between left and right
        // intdiv() gives us whole numbers (no decimals)
        $mid = intdiv($lo + $hi, 2);

        // Check if the number at the middle position is what we're looking for
        if ($nums[$mid] === $target) {
            // Perfect! We found it, so return this position
            return $mid;
        } 
        // If the number in the middle is smaller than what we're looking for
        elseif ($nums[$mid] < $target) { 
            // The number we want must be on the right side
            // So move our left boundary to the right of middle
            $lo = $mid + 1;
        } 
        // If the number in the middle is bigger than what we're looking for
        else {
            // The number we want must be on the left side
            // So move our right boundary to the left of middle
            $hi = $mid - 1;
        }
    }

    // If we didn't find the number, return where it should be inserted
    // $lo is now pointing to the exact spot where it belongs
    return $lo;
}

// --- Let's run some tests ---
// Create a list of test cases with the input, target, and what we expect
$tests = [
    // Test 1: The number 5 is at position 2 in this list
    ["nums"=> [1, 3, 5, 6], "target"=> 5,  "expected" => 2],
    
    // Test 2: The number 2 is not in the list, but should go at position 1
    ["nums"=> [1, 3, 5, 6], "target"=> 2,  "expected"=> 1],
    
    // Test 3: The number 7 is bigger than all, so it goes at the end (position 4)
    ["nums"=> [1, 3, 5, 6], "target"=> 7,  "expected"=> 4],
    
    // Test 4: The number 0 is smaller than all, so it goes at the start (position 0)
    ["nums"=> [1, 3, 5, 6], "target"=> 0,  "expected"=> 0],
    
    // Test 5: List has only one number (1), and we're looking for 0 (which is smaller)
    ["nums"=> [1],          "target"=> 0,  "expected"=> 0],
    
    // Test 6: List has only one number (1), and we're looking for that same number
    ["nums"=> [1],          "target"=> 1,  "expected"=> 0],
    
    // Test 7: List has only one number (1), and we're looking for 2 (which is bigger)
    ["nums"=> [1],          "target"=> 2,  "expected"=> 1],
];

// Go through each test one by one
foreach ($tests as $test) {
    // Run our search function with the test data
    $result = searchInsertPosition($test['nums'], $test['target']);
    
    // Check if our answer matches what we expected
    // Show PASS if correct, FAIL if wrong
    $status = $result === $test['expected'] ? '✓ PASS' : '✗ FAIL';
    
    // Format the list as a readable string with square brackets
    $nums   = '[' . implode(',', $test['nums']) . ']';
    
    // Print out the test result in a nice format
    printf("%s | nums=%-14s target=%d → %d\n", $status, $nums, $test['target'], $result);
}