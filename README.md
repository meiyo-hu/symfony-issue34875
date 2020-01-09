# symfony-issue34875

https://github.com/symfony/symfony/issues/34875

Configured 2 routes (a, b) and 2 guards for each route (a -> Guard1, Guard2, b-> Guard1, Guard3).
All guards supports all requests that don't have a specific attribute (role).

- Guard1: always successfully authenticates the request and sets role = ROLE_1.
- Guard2: always successfully authenticates the request and sets role = ROLE_2.
- Guard3: failes to authenticate the request and throw an exception.

## Usage:

- Start web server:
  - ```cd <project dir>/public/```
  - ```php -S localhost:8000```

- Explore outputs in browser:
  - http://localhost:8000/a?v=4.4.0	-> ROLE_1
  - http://localhost:8000/b?v=4.4.0	-> ROLE_1
  - http://localhost:8000/a?v=4.4.1	-> ROLE_2
  - http://localhost:8000/b?v=4.4.1	-> Forbidden
