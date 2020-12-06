# Genaral Laravel Test

# Mission 1

Create a Laravel command that will calculate the sum of an array given as input

Example of command usage:

```shell
php artisan run:array_sum [1,2,[3,4,[5,6,[7],8,9],10],11] -> output 66
php artisan run:count_arrays [1,2,[3,4,[5,6,[5]]]] -> output 4
```

# Mission 2

Create a Laravel command to replace strings represented by delimiter with arguments.

The command will take two arguments, 

First: string with elements to replace with its arguments, your have template pattern {} and inside the index of argument 
exp: '{1}_{0}'
Second: list of arguments, exp: {1} {0}

User is not limited by number of arguments.

Examples:

```php
php artisan run:string_replace '{1}_{0}' {1} {0} -> output: {0}_{1}
php artisan run:string_replace '{1}_{0}' hello world -> output: world_hello
php artisan run:string_replace '{1}_hello_{0}' {0} test -> output: test_hello_{0}
php artisan run:string_replace '{1}_{2}_{0}' {0} test {five} tree -> output: test_{five}_{0}
```
