<?php

declare(strict_types=1);

function getRequestMethod(): ?string {
  return $_SERVER['REQUEST_METHOD'];
}

describe('when the http request method is set', function(string $method) {
  $server = $_SERVER;

  beforeEach(fn() => ($_SERVER['REQUEST_METHOD'] = $method));
  afterEach(fn() => ($_SERVER = $server));

  it('should get the request method', fn() =>
    expect(getRequestMethod())->toBe($method));
})->with([
  'CONNECT',
  'DELETE',
  'GET',
  'HEAD',
  'OPTIONS',
  'PATCH',
  'POST',
  'PUT',
  'TRACE',
]);

describe('when the http request method is not set', function() {
  $server = $_SERVER;

  beforeEach(function() {
    unset($_SERVER['REQUEST_METHOD']);
  });

  afterEach(fn() => ($_SERVER = $server));

  it('should get null', fn() => expect(getRequestMethod())->toBeNull());
});
