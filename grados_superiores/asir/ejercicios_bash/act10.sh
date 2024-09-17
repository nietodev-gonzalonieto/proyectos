#!/bin/bash
if test $# -lt 2
then
	Error
elif test -f $1 && (test $2 = "A" || test $2 = "Z")
then
	if test $2 = "A"
	then
		cat $1 | sort -d
	elif test $2 = "Z"
	then
		cat $1 | sort -r
	fi
else
	Error
fi
if test -f $1 && (test $2 = "A" || test $2 = "Z")
then
	if test $2 = "A"
	then
		cat $1 | sort -d
	elif test $2 = "Z"
	then
	cat $1 | sort -r
	fi
fi
