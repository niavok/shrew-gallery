#!/bin/bash
#
# Simple script to produce a C-language structure of whatever
# binary input is sent in.  For example to include a raw image
# directly into the source code of a program.
#

if [ "x$1" = "x" ] ; then set "-"; fi


od -v -tx1 -w8 $1 | awk ' \
   BEGIN	{ } \
   /^[0-9]/ 	{ for (i=2; i<=NF; i++) printf $i ; \
		  } \
   END 		{  } '
