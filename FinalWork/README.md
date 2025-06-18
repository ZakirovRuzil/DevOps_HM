# Приложение для заметок

Этот проект представляет собой простое веб-приложение для создания заметок, реализованное с использованием PHP-FPM и Nginx. Включает логирования с использованием Elasticsearch и Grafana.

## Структура проекта

- `app/`: Содержит код PHP-приложения.
  - `index.php`: Главная страница для отображения и добавления заметок.
  - `operations/`: Директория для PHP-скриптов, выполняющих операции.
    - `getNotes.php`: Скрипт для получения заметок.
    - `writeNote.php`: Скрипт для добавления новой заметки.
  - `notes.txt`: Файл для заметок
- `logs/nginx/`: Файлы логов Nginx.
   - `access.log`
   - `error.log`
- `scripts`
  - `build.sh`: Скрипт для сборки Docker-образов.
  - `deploy.sh`: Скрипт для запуска Docker-контейнеров.
- `nginx.conf`: Конфигурационный файл для Nginx.
- `filebeat.yml`: Конфигурационный файл для Filebeat для отправки логов в Elasticsearch.
- `Dockerfile_php-fpm`: Dockerfile для сборки контейнера PHP-FPM.
- `Dockerfile_nginx`: Dockerfile для сборки контейнера Nginx.
- `Dockerfile_filebeat`: Dockerfile для сборки контейнера Filebeat.
- `docker-compose.yml`: Файл Docker Compose для определения и запуска многоконтейнерного Docker-приложения.

## Запуск
1) .\scripts\build.sh -t v1 
2) .\scripts\deploy.sh -t v1
   
### Приложение
<img width="922" alt="Снимок экрана 2024-05-20 193909" src="https://github.com/Zinnur41/DevOps_HM/assets/89980369/772169a7-5976-404d-8527-9f349487fd64">

### Логи
<img width="940" alt="Screenshot_16" src="https://github.com/Zinnur41/DevOps_HM/assets/89980369/56972636-61fe-4c85-bdb5-179da8b42044">
<img width="914" alt="Screenshot_14" src="https://github.com/Zinnur41/DevOps_HM/assets/89980369/45de9b5e-beac-468d-a14d-44fe59ac3944">
<img width="907" alt="Screenshot_15" src="https://github.com/Zinnur41/DevOps_HM/assets/89980369/5780dc14-8d9c-4fe4-9d83-f827ec6dd747">
<img width="691" alt="Screenshot_13" src="https://github.com/Zinnur41/DevOps_HM/assets/89980369/a6e24520-d168-44d7-9f57-165e1c70feca">

### Контейнеры
<img width="923" alt="Screenshot_17" src="https://github.com/Zinnur41/DevOps_HM/assets/89980369/eec021f4-6700-4d76-8660-8141f054e3f6">

