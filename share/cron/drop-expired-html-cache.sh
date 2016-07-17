#!/bin/sh
cd `'dirname' $0`/../..
'find' var/cache -type f -name '*.html' -mmin +0 -delete
