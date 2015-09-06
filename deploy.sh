#!/bin/bash

# This file is part of Translate-WebApps.
# Translate-WebApp is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License version 3
# as published by the Free Software Foundation.
#
# Translate-WebApps is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.  <http://www.gnu.org/licenses/>
#
# Author(s):
# © 2015 Kasra Madadipouya <kasra@madadipouya.com>


CURRENT_PATH=`pwd`;
HARD_PATH="/var/www/";
DIRECTORY_NAME="Translate";
if [ -z "$1" ]; then
	HARD_PATH=$HARD_PATH;
else
	HARD_PATH=$1;
fi
#OVERWRITES IF CONTENTS EXIST OR CREATE A NEW FOLDER IF NOT EXITS
#mkdir -p $HARD_PATH$DIRECTORY_NAME;
#cp -r * $HARD_PATH$DIRECTORY_NAME;
#REPLACE WITH RSYNC
rsync -av $CURRENT_PATH $HARD_PATH;
#GET CP RETURN VALUE, WHICH HOLDS IN LAST VARIABLE, THE COMMAND SHOWS GET LAST VARIABLE IN BASH
#echo $?; 
if [ $? -eq 0 ]; then
	echo "Deployed successfully!";
else
	echo "Deployed failed, try with root user!"
fi

