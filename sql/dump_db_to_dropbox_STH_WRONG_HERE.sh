#!/usr/bin/env bash
export PROJECTS="fac"

export NOW="$(date +'%Y%m%d_%H%M')"
export DAYS="2"
export DB_BACKUP_FOLDER="/home/tri/Dropbox/projects/${PROJECTS}/db"
export DB_USER="root"
export DB_HOST="127.0.0.1"
export DB_PORT="3306"
export DB_PASSWD="rTrapok)1"

export MYSQLBIN="/usr/bin/mysql"

echo "MySQL backup started at $(date +'%d-%m-%Y %H:%M:%S')"
echo "Deleting old backup $(date +'%d-%m-%Y %H:%M:%S')"
find $DB_BACKUP_FOLDER -mtime +$DAYS -exec rm -rf {} \;

# Next command take backup compressed with bzip2 save in directory DB_BACKUP
echo "START: Backing up database $(date +'%d-%m-%Y %H:%M:%S')"

for db in ${PROJECTS}; do
	export FILENAME="$db-$NOW".sql.gz # Set own file name
	${MYSQLBIN}mysqldump -h${DB_HOST} --port=${DB_PORT} -u$DB_USER -p$DB_PASSWD $db | gzip > "$DB_BACKUP_FOLDER/$FILENAME"
done

echo "COMPLETE: Operation finished at $(date +'%d-%m-%Y %H:%M:%S')"
echo "Done"

exit 0
