# Test PdPaola

## Iniciar la aplicacion:
* Esta hecho un Makefile que con el comando `make up`
, instalara las dependencias, hara migracion a base de datos, 
y hara un `seed` inicial de los productos-transactions-operations.
* Tambien puede ejecutar estos comando en el orden que se indica:
  * `composer install`
  * `./vendor/bin/sail up`
  * `./vendor/bin/sail artisan migrate:fresh`
  * `./vendor/bin/sail artisan db:seed`

## Especificaciones:
* Segun el documento de la prueba tecnica, era recomendable usar `lumen`.
En mi casa aunque empece con el tuve algunos problemas y revisando la documentacion
esta `deprecated` y recomiendan usar laravel por lo que use este ultimo.
* Esta todo dockerizado mediante `sail` de laravel. Usando Php 8.1 y Mysql 8.0
* He usado phpstan y code sniffer para la revision de codigo y formanteado,
los encontraras para ejecutar scripts dentro del `composer.json` los 
comandos: `"phpsstan"`, `"phpcs"`, `"phpcs-fix"`

## Notas:
* No he podido realizar ningun test unitario, pero se hacerlo con `PhpUnit`
 y usando `Mockery` para mockear mayormente la inversion de dependencias.
* He intentado realizarlo todo siguiente los principios solid y clean code,
una de las cosas mas importantes es la inversion de dependencias. En mi caso
lo realiza mediante implementaciones interfaces haciendo un binding con
la clase que se ejecutara.
* Por el lado de patrones de diseño mayormente factory y command.
* Me he enfocado mas que todo en el backend,
el front esta medianamente funcional, carga los datos,
pagina, carga un producto, pero le falta las interacciones.
Sin embargo, la api del backend esta totalmente operativa
y se puede probar desde postman.
