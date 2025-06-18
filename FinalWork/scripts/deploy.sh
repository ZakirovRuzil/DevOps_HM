#!/bin/bash

# Парсим аргументы
while getopts t: flag
do
    case "${flag}" in
        t) TAG=${OPTARG};;
    esac
done

if [ -z "$TAG" ]; then
    exit 1
fi


docker-compose up -d
