# Zeald-PHP-Tests

This is a programmer job  test from Dash10.


## Question: 10 different areas where the original-code has problems:

1. Poor Database schema, should use primary keys generated.
2. No Migration (must use sql dump).
3. No Model implemetation (i have to implement the solution as well  without model due to no migration to save time, i could have used Talend ETL for transfer to proper database schema).
4. No Tests (its so small it may be ok tho).
5. No Views/template (inlining html in return).
6. No use of QRM, hard coded credentials.
7. No sanitation.
8. Poor Reuse due to missing MVC/laravel? framework.
9. No adhering to S.O.L.I.D. principles.
10. No routing, API url not friendly.


## DB Installation

```bash
mysql -u root -h 127.0.0.1 < archive/database/nba2019.sql
```

## Server start

```bash
php "test-app/artisan" serve --host='localhost' --port='8000'
```


## Examples Export

```
http://localhost:8000/
http://localhost:8000/export/playerstats/byteam/TOR
http://localhost:8000/export/playerstats/byposition/C
http://localhost:8000/export/playerstats/byplayer/Steven%20Adams/xml
http://localhost:8000/export/players/byplayer/Steven%20Adams/json
http://localhost:8000/export/players/byteam/HOU/xml

```