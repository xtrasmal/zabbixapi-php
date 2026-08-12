# Development

Run the test suite:

```bash
vendor/bin/phpunit
```

Validate Composer metadata:

```bash
composer validate --strict
```

Check coding style:

```bash
composer cs:check
```

Apply coding style fixes:

```bash
composer cs:fix
```

The php-cs-fixer configuration is committed in `.php-cs-fixer.dist.php`. It covers maintained client, API, JSON-RPC, request infrastructure, test, and example code. Generated request, schema, and enum classes are intentionally excluded to avoid noisy generated-code churn; change the generator when generated formatting needs to change.
