/* cd ../../../ */
/* d: */
/* cd envato/redknee */
SET /A RAND=8182
/* %RANDOM% */
start firefox localhost:%RAND%
start cmd
php -S localhost:%RAND%