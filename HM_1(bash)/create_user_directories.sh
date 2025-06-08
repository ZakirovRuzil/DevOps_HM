#!/bin/bash

log() {
    echo "$(date +'%Y-%m-%d %H:%M:%S') $1"
    echo "$(date +'%Y-%m-%d %H:%M:%S') $1" >> log/log_file.log
}

create_user_directory() {
    local username=$1
    local directory=$2
    local groupname=$(id -gn "$username")
    mkdir -p "$directory/$username" && chmod 755 "$directory/$username" && chown "$username:$groupname" "$directory/$username"
    if [ -d "$directory/$username" ]; then
        log "create directory $directory/$username and add 755 root ($username:$groupname)"
    else
        log "Error: Failed to create directory $directory/$username"
    fi
}

if [ "$1" == "-d" ]; then
    root_directory="$2"
else
    read -p "enter the path to the root directory: " root_directory
fi

if [ ! -d "$root_directory" ]; then
    log "error: This directory not found"
    exit 1
fi

log "creating user directories"
while IFS=: read -r username _; do
    if [ "$username" != "nobody" ]; then
        create_user_directory "$username" "$root_directory"
    fi

done < /etc/passwd
log "creating directories completed"
