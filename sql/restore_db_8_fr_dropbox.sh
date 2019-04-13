#!/usr/bin/env bash
#Restore db from dropbox/project folder

readonly PROJ=fac
cd  /home/tri/Dropbox/projects/${PROJ}/db
readonly file_name="$(ls -Art | tail -n 1)"
#echo ${file_name}
zcat ${file_name} | mysql -uroot -p"rTrapok)1" -h127.0.0.1 -P3307 ${PROJ}