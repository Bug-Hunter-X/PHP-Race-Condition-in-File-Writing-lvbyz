```php
$date = date('Y-m-d');
$file = fopen("data/data_$date.txt", "a+");
if ($file) {
  if (flock($file, LOCK_EX)) { // Acquire an exclusive lock
    // ... some code to write to file ...
    flock($file, LOCK_UN); // Release the lock
  } else {
    // Handle the case where the lock cannot be acquired
    echo "Could not acquire lock on file.\n";
  }
  fclose($file);
}
```
The solution uses `flock` to obtain an exclusive lock on the file before writing, ensuring that only one process can write at a time. After writing, the lock is released using `LOCK_UN`.  The `if` statement also checks if the file is opened successfully, adding another level of error handling.