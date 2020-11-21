# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Netwey-api

## Configuración

1. Primero descargue el proyecto.

```
$ git clone https://github.com/gcupul/netwey.git
$ cd netwey
```

2. Luego cree un archivo **.env** y copie el contenido de **.env.example** y configure su base de datos
3. Corra estos comandos dentro del proyecto

```
$ composer install
$ php artisan migrate //esto para crear las tablas necesarias para el proyecto.
```

## End-Points

| Método        | Función                     | Endpoint                                     |
| ------------- | --------------------------- | -------------------------------------------- |
| **[POST]**    | Registro                    | {url}/api/register                           |
| **[POST]**    | Login                       | {url}/api/login                              |
| **[POST]**    | Nueva Region                | {url}/api/regions                            |
| **[GET]**     | Listar Regiones             | {url}/api/regions                            |
| **[GET]**     | Obtener Region              | {url}/api/regions/{id}                       |
| **[POST]**    | Editar Region               | {url}/api/regions/{id}                       |
| **[DELETE]**  | Editar Region               | {url}/api/regions/{id}                       |
| **[POST]**    | Nueva Communa               | {url}/api/communes                           |
| **[GET]**     | Listar Communa              | {url}/api/communes                           |
| **[GET]**     | Obtener Communa             | {url}/api/communes/{id}                      |
| **[POST]**    | Editar Communa              | {url}/api/communes/{id}                      |
| **[DELETE]**  | Eliminar Communa            | {url}/api/communes/{id}                      |
| **[POST]**    | Nuevo Customer              | {url}/api/customers                          |
| **[GET]**     | Listar Customers            | {url}/api/customers                          |
| **[GET]**     | Obtener Customer por DNI    | {url}/api/customers/{dni}                    |
| **[POST]**    | Obtener Customer por Email  | {url}/api/customers/email                    |
| **[POST]**    | Editar Communa              | {url}/api/customers/{dni}/{id_reg}/{id_com}  |
| **[DELETE]**  | Eliminar Communa            | {url}/api/customers/{dni}/{id_reg}/{id_com}  |

## Registro de usuario [POST] {url}/api/register

**Body**
```JSON
{
    "email": "gcupul@example.com",
    "name": "Gisel Cupul",
    "password": "testApi1234",
    "c_password": "testApi1234"
}
```

**Request**
```JSON
{
    "status": "success",
    "api_key": "WXowYUw2dUxLclY4cXFGNVVFM0lpU0NTVENzTHNaU0NWVHRJQUZvRw=="
}
```

## Login [POST] {url}/api/login

**Body**
```JSON
{
    "email": "gcupul@example.com",
    "password": "testApi1234"
}
```

**Request**
```JSON
{
    "status": "success",
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

## Creación de nueva Region [POST] {url}/api/regions

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Body**
```JSON
{
    "description": "Arica y Parinacota"
}
```

**Request**
```JSON
{
    "success": "true"
}
```



## Listar Regiones [GET] {url}/api/regions

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Request**
```JSON
{
    "success": "true",
    "result": [
        {
            "id_reg": 1,
            "description": "Arica y Parinacota",
            "status": "A"
        },
        {
            "id_reg": 2,
            "description": "Tarapacá",
            "status": "A"
        },
        {
            "id_reg": 3,
            "description": "Antofagasta",
            "status": "A"
        },
        {
            "id_reg": 4,
            "description": "Atacama",
            "status": "A"
        }
    ]
}
```


## Editar Region [POST] {url}/api/regions/{id}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- "id": 1 (int)

**Body**
```JSON
{
    "description": "Arica y Parinacota",
    "status": "A"
}
```

**Request**
```JSON
{
    "success": "true"
}
```

## Obtener Region [GET] {url}/api/regions/{id}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- id: 2 (int)

**Request**
```JSON

[
    {
        "id_reg": 2,
        "description": "Tarapacá",
        "status": "A"
    }
]
```

## Eliminar Region [DELETE] {url}/api/regions/{id}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- id: 4 (int)

**Request**
```JSON
{
    "success": "true"
}
```

## Creación de nueva Communa [POST] {url}/api/communes

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Body**
```JSON
{
    "id_reg": 2,
    "description": "Camiña"
}
```

**Request**
```JSON
{
    "success": "true"
}
```



## Listar Communas [GET] {url}/api/communes

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Request**
```JSON
{
    "success": "true",
    "result": [
        {
            "id_com": 1,
            "id_reg": 1,
            "description": "Arica",
            "status": "A"
        },
        {
            "id_com": 2,
            "id_reg": 1,
            "description": "Camarones",
            "status": "A"
        },
        {
            "id_com": 3,
            "id_reg": 1,
            "description": "General Lagos",
            "status": "A"
        },
        {
            "id_com": 4,
            "id_reg": 1,
            "description": "Putre",
            "status": "A"
        },
        {
            "id_com": 5,
            "id_reg": 2,
            "description": "Alto Hospicio",
            "status": "A"
        },
        {
            "id_com": 6,
            "id_reg": 2,
            "description": "Iquique",
            "status": "A"
        },
        {
            "id_com": 7,
            "id_reg": 2,
            "description": "Camiña",
            "status": "A"
        }
    ]
}
```


## Editar Communa [POST] {url}/api/communes/{id}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- "id": 1 (int)

**Body**
```JSON
{
    "id_reg": 1,
    "description": "Arica",
    "status": "A"
}
```

**Request**
```JSON
{
    "success": "true"
}
```

## Obtener Communa [GET] {url}/api/communes/{id}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- id: 2 (int)

**Request**
```JSON
[
    {
        "id_com": 2,
        "id_reg": 1,
        "description": "Camarones",
        "status": "A"
    }
]
```

## Eliminar Communa [DELETE] {url}/api/communes/{id}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- id: 4 (int)

**Request**
```JSON
{
    "success": "true"
}
```

## Creación de nuevo Customer [POST] {url}/api/customers

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Body**
```JSON
{
    "dni": "dni-test2",
    "id_reg": 1,
    "id_com": 1,
    "name": "Yaneli",
    "last_name": "Segovia",
    "email": "yaneli@test.com"
}
```

**Request**
```JSON
{
    "success": "true"
}
```



## Listar Customers [GET] {url}/api/customers

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Request**
```JSON
{
    "success": "true",
    "result": [
        {
            "dni": "dni-test1",
            "id_reg": 1,
            "id_com": 1,
            "email": "gcupul@test.com",
            "name": "Gisel",
            "last_name": "Cupul",
            "address": null,
            "date_reg": "2020-11-21T16:59:09.000000Z",
            "status": "A"
        },
        {
            "dni": "dni-test2",
            "id_reg": 1,
            "id_com": 1,
            "email": "yaneli@test.com",
            "name": "Yaneli",
            "last_name": "Segovia",
            "address": null,
            "date_reg": "2020-11-21T16:59:47.000000Z",
            "status": "A"
        }
    ]
}
```


## Editar Customer [POST] {url}/api/customers/{dni}/{id_reg}/{id_com}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- dni: "dni-test2" (string)
- id_reg: 1 (int)
- id_com: 1 (int)

**Body**
```JSON
{
    "email": "yaneli@test.com",
    "name": "Yaneli",
    "last_name": "Segovia",
    "address": null,
    "date_reg": "2020-11-21T16:59:47.000000Z",
    "status": "A",
    "address": "test"
}
```

**Request**
```JSON
{
    "success": "true"
}
```

## Obtener Customer por DNI [GET] {url}/api/customers/{dni}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- dni: "dni-test2" (string)

**Request**
```JSON
{
    "success": "true",
    "result": [
        {
            "dni": "dni-test2",
            "id_reg": 1,
            "id_com": 1,
            "email": "yaneli@test.com",
            "name": "Yaneli",
            "last_name": "test change",
            "address": "test",
            "date_reg": "2020-11-21T17:04:12.000000Z",
            "status": "A"
        }
    ]
}
```


## Obtener Customer por Email [POST] {url}/api/customers/email

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Body**
```JSON
{
    "email": "gcupul@test.com"
}
```

**Request**
```JSON
{
    "success": "true",
    "result": [
        {
            "dni": "dni-test1",
            "id_reg": 1,
            "id_com": 1,
            "email": "gcupul@test.com",
            "name": "Gisel",
            "last_name": "Cupul",
            "address": null,
            "date_reg": "2020-11-21T16:59:09.000000Z",
            "status": "A"
        }
    ]
}
```

## Eliminar Customer [DELETE] {url}/api/customers/{dni}/{id_reg}/{id_com}

**Headers**
```JSON
{
    "api_key": "WWM3bVdaeGFMenZPQ1RZTUhDVkc1d1dMMTNqbW1oZGY2bFQyNjBxMw=="
}
```

**Parametros**
- dni: "dni-test2" (string)
- id_reg: 1 (int)
- id_com: 1 (int)

**Request**
```JSON
{
    "success": "true"
}
```
