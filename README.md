# Ant colony optimization workshop for solving a travelling salesman probleb

[Русская версия](docs/README_ru.md)

## Table of contents

* [Introdution](#goal)
* [Demo](#demo)
* [Installing ang running on Docker](#docker)
* [Installing ang running on OpenServer](#openserver)
* [Tips](#tips)


---

## Introdution <span id="goal"></span>

This workshop gives you a web-application with user interface to work with [this ACO library](https://github.com/mgrechanik/ant-colony-optimization).

All details about aco algorithm you can find in the docs of that library.

The information about graph comes from image file.

You can set all settings and parameters used by aco algorithm and see the result of calculation.

Данное приложение предназначено для запуска локально, на машине пользователя.
This application is intended to be run locally, on user's PC.

---

## Demo <span id="demo"></span>

![Ant colony optimization workshop](https://raw.githubusercontent.com/mgrechanik/aco-workshop-for-tsp/main/docs/aco_workshop_demo.jpg "Ant colony optimization workshop")



	
---
    
## Installing ang running on Docker <span id="docker"></span>

Если вы используете в своей работе Docker, то приложение готово к запуску на нем.


Скачайте себе файлы приложения с помощью Git
```
git clone git@github.com:mgrechanik/aco-workshop-for-tsp.git
```

Если у вас не установлен Git, скачайте по кнопке (выше на странице) **Code --> Dowload Zip**, и разархивируйте.

Перейдите в каталог с приложением
```
cd aco-workshop-for-tsp
```

Нужно назначить права, единоразово выполните
```
chmod -R o+w ./web/uploads
```

Все, приложение готово к запуску, теперь каждый раз запускайте командой:
```
docker compose up -d
```

И по адресу http://localhost:8000 в браузере увидите страницу приложения.

Когда решаете завершить работу, выполните

```
docker compose down
```


---

## Installing ang running on OpenServer <span id="openserver"></span>

Если вы не знакомы с Docker, то данное приложение является обычным PHP приложением (на Yii2), для запуска которого 
достаточно иметь любой вебсервер, с установленными PHP (версии 8.0 и выше) и Composer.

Для примера, покажу как установить приложение на [OpenServer](https://ospanel.io/)

1) Скачайте и установите себе OpenServer, у меня он установлен в D:\OpenServer

2) В папке D:\OpenServer\domains создайте свою папку, например aco.front.

3) Скачайте по кнопке (выше на странице) **Code --> Dowload Zip**, и разархивируйте в эту папку. У вас в папке ```D:\OpenServer\domains\aco.front``` должно стать так:
```
assets
commands
config
...
```

4) Теперь вам нужно настроить ряд вещей. На картинке показаны шаги.
![установка на OpenServer](https://raw.githubusercontent.com/mgrechanik/aco-workshop-for-tsp/main/docs/os_all.jpg "установка на OpenServer")

5) Переходим в настройки

6) На вкладке модули выбираем чтобы версия PHP была 8.0 и выше

7) На вкладке Домены имя домена указываем наше aco.front, а папку - aco.front/web , жмем кнопку "Добавить"

8) Получаем домен в списке как на картинке, жмем "Сохранить"

9) Идем в настройки PHP

10) И устанавливаем время выполнения вместо 30 (это в секундах), например в 300

11) Запускаем Вебсервер

12) Идем в Консоль

13) В ней выполняем две команды
```
cd domains\aco.front

composer install
```

14) Готово, теперь сайт можно открыть в браузере по адресу
http://aco.front/

---

## Tips <span id="tips"></span>

#### How to create am image with a graph <span id="tips-image-create"></span>

There are two types of strategies how we find nodes of a graph on an image.

The first strategy is this: the color of nodes are different from background color (color of top left pixel )
Take a paintbrush in your image editor with 10px diameter and draw nodes.

The second strategy is when you know the exact color, in RGB format, which is present on the node.
It is handy when you have some others image and draw you nodes on it.

This application comes with two example images who represent each type.