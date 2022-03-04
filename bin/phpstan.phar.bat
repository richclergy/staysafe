@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/phpstan/phpstan/phpstan.phar
php "%BIN_TARGET%" %*
