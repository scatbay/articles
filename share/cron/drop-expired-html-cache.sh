#!/bin/sh
ROOT=var/cache
cd `'dirname' $0`/../..
find "$ROOT" -type f -name '.*.expires' -mmin +0 | while read line; do
  prefix=`dirname "$line"`
  suffix=`basename "$line" .expires`
  bin/cache-purge "$ROOT" "${prefix:10}/${suffix:1}"
done
