# Starwars

## Tabla de Contenidos

* [Descripción](#descripción)
* [Características](#características)
* [Instalación](#instalación)

## Descripción

Este add-on de Magento 2 crea una tabla en la base de datos para almacenar personajes y muestra su contenido en una página del front-end. Además, consume una API externa para mostrar personajes de Star Wars. Creado como prueba para una consultoría, cumple con los requerimientos solicitados.

## Características

Este add-on para Magento 2 demuestra las siguientes capacidades y buenas prácticas de desarrollo:

* **Modificación de la base de datos:** Se incluye la creación de una tabla personalizada para el almacenamiento de datos.
* **Buenas prácticas de Magento:** Se siguen las recomendaciones de Magento para la creación y el consumo de tablas en la base de datos.
* **Creación de controladores:** Se implementan controladores para la gestión de una página en el front-end.
* **Plugin para la barra de categorías:** Se desarrolla un plugin para añadir un botón personalizado en la barra de categorías.
* **Creación de APIs:** Se exponen funcionalidades a través de APIs REST y GraphQL.
* **Consumo de APIs de terceros:** Se integra el consumo de APIs externas para obtener datos y funcionalidades adicionales.
* **Carga de datos inicial:** Se incluyen datos iniciales en la tabla creada para facilitar las pruebas.
* **Unit testing:** Se han implementado pruebas unitarias para asegurar la calidad del código.

## Instalación
* Descarga o clona el repositorio y luego ejecuta los siguientes comandos:
```bash
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
```