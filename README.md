# Запуск

Запуск приложения в Docker
```sh
docker compose up -d
```
Выполнить миграции
```sh
docker compose exec php php bin/console d:migrations:migrate
```
Наполнить базу фикстурами
```sh
docker compose exec php php bin/console doctrine:fixtures:load
```
Приложение должно быть доступно по `http://localhost/`

# Пояснения
'Appraisal' возможно не лучший перевод для услуги 'оценки'.

Перевод в шаблонах не использовался.
Jquery не срабатывает сразу после редиректа на страницу заказа.
Осталось подкинуть тесты и валидацию формы заказа.

Авторизация и создание заказа рабочие.
