<?php

/**
 * Remove duplicates from a sorted array in-place.
 * Returns the new length of the array after removing duplicates.
 *
 * @param int[] &$nums Sorted array (modified in-place)
 * @return int New length (number of unique elements)
 */
// This function removes duplicate numbers from a list
// The & symbol means we're changing the original list (not making a copy)
function removeDuplicates(array &$nums): int {
    // First, let's count how many numbers are in our list
    $n = count($nums);
    
    // If the list is empty, there's nothing to do - just return 0
    if ($n === 0) {
        return 0;
    }

    // We use two markers: one to read and one to write
    // writeIndex points to where we should place the next unique number
    // We start at position 1 because the first number is always unique
    $writeIndex = 1;

    // Now we go through the list starting from the second number
    // We compare each number with the one before it
    for ($readIndex = 1; $readIndex < $n; $readIndex++) {
        // Check if the current number is different from the previous one
        // If it's different, it means we found a new unique number
        if ($nums[$readIndex] !== $nums[$readIndex - 1]) {
            // Place this unique number in the writeIndex position
            $nums[$writeIndex] = $nums[$readIndex];
            // Move writeIndex forward to prepare for the next unique number
            $writeIndex++;
        }
    }

    // Return the total count of unique numbers we found
    // writeIndex tells us how many unique numbers we have
    return $writeIndex;
}

/**
 * Run a single test and print the output.
 * Shows the unique numbers we found
 */
// This helper function tests our removeDuplicates function and shows the results
function runTest(array $nums): void {
    // Call our function to remove duplicates and get back the count
    $k = removeDuplicates($nums);
    // Take only the unique numbers from our list (the first k numbers)
    $unique = array_slice($nums, 0, $k);
    // Print the results nicely - showing the unique numbers in brackets
    echo 'Output: [' . implode(',', $unique) . "]\n";
}

// --- Let's test our function with different examples ---
// Test 1: Mix of some duplicates
runTest([2,1, 1, 2]);
// Test 2: Lots of repeating numbers
runTest([0, 0, 1, 1, 1, 2, 2, 3, 3, 4]);
// Test 3: Just one number
runTest([1]);
// Test 4: All the same number
runTest([1, 1, 1, 1]);
// Test 5: All different numbers
runTest([1, 2, 3, 4, 5]);
// Test 6: Negative numbers with duplicates
runTest([-3, -1, -1, 0, 0, 2]);