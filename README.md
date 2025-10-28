# Лабораторная работа №5: Работа с базой данных MySQL

![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![PDO](https://img.shields.io/badge/PDO-PHP-blue?style=for-the-badge)
![Adminer](https://img.shields.io/badge/Adminer-F29D38?style=for-the-badge)
![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)

---

## 👩‍💻 Автор
**ФИО:** Товмасян Грайр Артурович  
**Группа:** 3МО-2

---

## 📌 Описание задания
Целью работы было полное переключение проекта на работу с реляционной базой данных **MySQL**. Реализованы следующие ключевые задачи:

1.  Расширение Docker-конфигурации для включения сервисов **MySQL** и **Adminer**.
2.  Создание PHP-класса для работы с таблицей (`Player.php`).
3.  Сохранение данных формы напрямую в базу данных.
4.  Вывод всех записей из базы данных на главной странице.

---

## ⚙️ Точки доступа

| Сервис        | Адрес                   | Учетные данные (для Adminer) |
| ------------- | ----------------------- | --------------------------- |
| **Сайт**      | [http://localhost:8080] | -                           |
| **Adminer**   | [http://localhost:8081] | Система: `db`, Пользователь: `lab5_user`, Пароль: `lab5_pass`, База данных: `lab5_db` |

---

## 🚀 Как запустить проект

1.  **Клонировать репозиторий:**
    ```bash
    git clone https://github.com/rpaup/nginx-lab.git
    cd nginx-lab
    ```

2.  **Установить PHP-зависимости (Guzzle):**
    ```bash
    docker-compose run --rm php composer install
    ```

3.  **Запустить Docker-окружение (сборка PHP и запуск всех 4-х контейнеров):**
    ```bash
    docker-compose up -d --build
    ```

4.  **Создать таблицу:** После запуска, зайдите в Adminer (http://localhost:8081) и выполните SQL-запрос:
    ```sql
    CREATE TABLE IF NOT EXISTS Players (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        age INT,
        game VARCHAR(100),
        format VARCHAR(50),
        experience TINYINT(1)
    );
    ```

---

## 📸 Скриншоты выполнения

### 1. Подключение к Adminer и структура БД
Подключение к MySQL-серверу через Adminer (порт 8081).

![Подключение к Adminer](screenshots/15-adminer-connect.png)
Созданная таблица `Players` в базе данных `lab5_db`.

![Создание таблицы](screenshots/16-db-table-creation.png)

### 2. Вывод данных из базы данных
Главная страница (index.php) отображает список всех сохраненных записей, извлеченных напрямую из таблицы `Players`.

![Вывод данных из MySQL](screenshots/17-db-data-output.png)

---

## ✅ Результат
Проект успешно переведен на работу с полноценной базой данных. Вся логика сохранения и извлечения данных реализована через **объектно-ориентированный подход** (класс `Player`) с использованием расширения **PDO** для безопасного взаимодействия с MySQL.