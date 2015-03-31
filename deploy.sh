#!/bin/bash
CURRENT_PATH=`pwd`;
HARD_PATH="/var/www/";
DIRECTORY_NAME="Translate";
if [ -z "$1" ]; then
	HARD_PATH=$HARD_PATH;
else
	HARD_PATH=$1;
fi
#OVERWRITES IF CONTENTS EXIST OR CREATE A NEW FOLDER IF NOT EXITS
mkdir -p $HARD_PATH$DIRECTORY_NAME;
cp -r * $HARD_PATH$DIRECTORY_NAME;
#GET CP RETURN VALUE, WHICH HOLDS IN LAST VARIABLE, THE COMMAND SHOWS GET LAST VARIABLE IN BASH
#echo $?; 
if [ $? -eq 0 ]; then
	echo "Deployed successfully!";
else
	echo "Deployed failed, try with root user!"
fi




