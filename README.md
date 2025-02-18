# PHP Race Condition in File Writing

This repository demonstrates a potential race condition in PHP file writing and illustrates how to mitigate it.

The `bug.php` file shows a simple example of writing to a daily data file.  However, this code is vulnerable to race conditions if multiple processes or threads attempt to open and write to the file at the same time.

The `bugSolution.php` file provides a solution using file locking to prevent such race conditions and ensure data integrity.

## How to reproduce the bug

1.  Clone the repository.
2.  Run `bug.php` from multiple terminal instances or processes concurrently.
3.  Examine the `data` directory; the contents of the data file might be incomplete or corrupted.

## Solution

The solution involves using file locking (`flock`) to ensure exclusive access to the file while writing.