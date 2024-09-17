#!/bin/bash

tar -cf Backup.tar /home/gonzalopcubuntu/Escritorio/Backup-"$(date '+%Y-%m-%d %H:%M')"
rm -r /home/gonzalopcubuntu/Escritorio/Backup-"$(date '+%Y-%m-%d %H:%M')"
