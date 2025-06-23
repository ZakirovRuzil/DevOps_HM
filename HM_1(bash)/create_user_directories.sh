#!/bin/bash

log() {
    echo "$(date +'%Y-%m-%d %H:%M:%S') $1"
    echo "$(date +'%Y-%m-%d %H:%M:%S') $1" >> log/log_file.log
}

create_user_directory() {
    local username=$1
    local directory=$2
    local groupname=$(id -gn "$username")
    mkdir -p "$directory/${username}_workdir" && chmod 660 "$directory/${username}_workdir" && chown "$username:$groupname" "$directory/${username}_workdir"
    if [ -d "$directory/${username}_workdir" ]; then
        log "create directory $directory/${username}_workdir and add 660 root ($username:$groupname)"
        setfacl -m g:dev:r "$directory/${username}_workdir"
        log "set read permission for dev group on $directory/${username}_workdir"
    else
        log "Error: Failed to create directory $directory/${username}_workdir"
    fi
}

if ! command -v setfacl &> /dev/null; then
    log "Error: setfacl not found. Please install the acl package."
    exit 1
fi

if ! getent group dev > /dev/null; then
    groupadd dev
    log "group dev created"
else
    log "group dev already exists"
fi

if [ ! -f /etc/sudoers.d/dev_nopasswd ]; then
    echo "%dev ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers.d/dev_nopasswd
    chmod 440 /etc/sudoers.d/dev_nopasswd
    log "sudo privileges without password added for group dev"
else
    log "sudo privileges already set for group dev"
fi

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
while IFS=: read -r username _ uid _ gid _ home shell; do
    if [ "$uid" -ge 1000 ] && [ "$username" != "nobody" ]; then
        usermod -aG dev "$username"
        log "added $username to dev group"
        create_user_directory "$username" "$root_directory"
    fi
done < /etc/passwd
log "creating directories completed"
