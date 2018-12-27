Requirements
-------
- Docker
- Docker Compose
- Nothing should be running in ports: 
  80 | 81 | 8080 | 8081 | 5432 | 443 | 444 | 8443 | 8444 

Install
-------

TL;DR
```bash 
$ sh update-deps.sh && docker-compose up -d 
$ google-chrome http://localhost
```

---
From the homepage you can navigate to API / API Cached / Admin.
There is also a folder postman on the root of this project with the calls.
The API will respond according the Accept Header on the request.

Original information about How to Install
-------

[Read the official "Getting Started" guide](https://api-platform.com/docs/distribution).

Tests
-------
Unit tests with PhpUnit
Integration tests with [postman](http://blog.getpostman.com/2017/10/25/writing-tests-in-postman/)

Credits
-------
API Platform is a next-generation web framework designed to easily create API-first projects without compromising extensibility
and flexibility.
Created by [Kévin Dunglas](https://dunglas.fr).
d