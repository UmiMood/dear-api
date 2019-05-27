# dear-api
[![Build Status](https://travis-ci.com/UmiMood/dear-api.svg?token=4CfuxCuzvs5i12ZugsAZ&branch=2)](https://travis-ci.com/UmiMood/dear-api)

PHP Library for [dear systems](https://dearinventory.docs.apiary.io) API v2.

## Requirements

* PHP 7.1+
* guzzlehttp/guzzle 6.3+
* ext-json extension

## Installation

```bash
```

Otherwise just download the package and add it to the autoloader.

## API Documentation
[docs](https://dearinventory.docs.apiary.io)

## Usage


Create a Dear instance.
```php
$dear = UmiMood\Dear\Dear::create("DEAR-ACCOUNT_ID", "DEAR-APPLICATION-KEY");
```

Get data from API
```php

$products = $dear->product()->get([]);
$accounts = $dear->account()->get([]);
$me = $dear->me()->get([]);

```

Push a new record to the API
```php

$response = $dear->product()->create($params); // see docs for available parameters

```

Update an existing record
```php

$response = $dear->product()->update($guid, $params); // see docs for available parameters

```

Delete a record
```php

$response = $dear->product()->delete($guid, []);

```

## Links ##
 * [License](./LICENSE)