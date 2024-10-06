# [Bug]: DescribeCall class is missing with method

https://github.com/pestphp/pest/issues/1010

## Summary

When I use `describe()->with()` in my tests, I get an error:

```plaintext
ArgumentCountError

Too few arguments to function PHPUnit\Runner\TestSuiteLoader::{closure}(),
0 passed in ~/Desktop/my-org/my-app/vendor/pestphp/pest/src/PendingCalls/DescribeCall.php
on line 56 and exactly 1 expected
```

## How to Reproduce

1. Install PHP 8.3.12
2. Install Pest 3.2.5 (`composer install`)
3. Run tests (`composer test`)

Here is the result:

```plaintext
composer test -- --filter=My
> Composer\Config::disableProcessTimeout
> pest '--filter=My'

   ArgumentCountError

  Too few arguments to function PHPUnit\Runner\TestSuiteLoader::{closure}(), 0 passed in ~/Desktop/my-org/my-app/vendor/pestphp/pest/src/PendingCalls/DescribeCall.php on line 56 and exactly 1 expected

  at tests/Unit/MyTest.php:9
      5▕ function getRequestMethod(): ?string {
      6▕   return $_SERVER['REQUEST_METHOD'];
      7▕ }
      8▕
  ➜   9▕ describe('when the http request method is set', function(string $method) {
     10▕   $server = $_SERVER;
     11▕
     12▕   beforeEach(fn() => ($_SERVER['REQUEST_METHOD'] = $method));
     13▕   afterEach(fn() => ($_SERVER = $server));

      +1 vendor frames

  2   tests/Unit/MyTest.php:17
      Pest\PendingCalls\DescribeCall::__destruct()


Script pest handling the test event returned with error code 1
```

## Pest Version

3.2.5

## PHP Version

8.3.12

## Operation System

macOS 14.4.1
