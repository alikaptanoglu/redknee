SET /A RAND=8182
start firefox localhost:%RAND%
start cmd
php -S localhost:%RAND%