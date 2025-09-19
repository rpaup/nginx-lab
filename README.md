# Лабораторная работа №1: Nginx + Docker

## 👩‍💻 Автор
ФИО: Товмасян Грайр Артурович  
Группа: 3МО-2

---

## 📌 Описание задания
Создать веб-сервер в Docker с использованием Nginx и подключить HTML-страницу.  
Результат доступен по адресу [http://localhost:3000](http://localhost:3000).

---

## ⚙️ Как запустить проект

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/rpaup/nginx-lab.git
   cd nginx-lab
Запустить контейнеры:
```bash
docker-compose up -d --build
```
Открыть в браузере:
```http://localhost:3000```
📂 Содержимое проекта

```docker-compose.yml``` — описание сервиса Nginx

```code/index.html``` — главная HTML-страница

```screenshots/``` — все скриншоты

📸 Скриншоты работы

1. Проверка установки Docker

![Проверка Docker](screenshots/01-docker-version.png)

2. Стартовая страница Nginx (порт 8080)

![Стартовая страница Nginx](screenshots/02-nginx-welcome-page.png)

3. Отображение кастомной страницы `index.html`

![Кастомная страница](screenshots/03-custom-page.png)

4. Изменение текста на главной странице

![Изменение текста](screenshots/04-text-update.png)

5. Добавление страницы `about.html`

![Страница About](screenshots/05-about-page.png)

6. Сайт на новом порту (3000)

![Сайт на порту 3000](screenshots/06-port-3000.png)

✅ Результат
Сервер в Docker успешно запущен, Nginx отдаёт мою HTML-страницу.
