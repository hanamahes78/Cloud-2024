#!/bin/sh

apk update && apk add curl jq

URL=https://uselessfacts.jsph.pl/random.json?language=en
LOKASI=/data

echo will run every $DELAY seconds

while true;
do
	date=$(date '+%Y-%m-%d_%H:%M:%S')
	echo processing at $date
	fname="output_$date.txt"
	curl -sL $URL | jq '.text' > $fname 
	sleep $DELAY
done
