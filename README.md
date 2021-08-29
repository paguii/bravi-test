Olá 

Instruções para verificação:

O exercicio 1 foi realizado em apenas um arquivo e está localizado na seguinte URL:
https://github.com/paguii/bravi-test/blob/master/BraviTest1.php

O exercicio 2 será possivel realizar os testes utilizando a seguinte URL:

Listar todos:
GET
https://paguii-bravi.herokuapp.com/api/people

Salvar
POST
https://paguii-bravi.herokuapp.com/api/people

Exemplo de JSON

```json
{
    "name": "teste",
    "contacts": [
        {
            "contact_type_id": 1,
            "number": "1999821372184"
        },
        {
            "contact_type_id": 2,
            "number": "199982423424432"
        },
        {
            "contact_type_id": 3,
            "email": "a@a.com"
        }
    ]
}
```

Atualizar
PUT
https://paguii-bravi.herokuapp.com/api/people/{id}

Exemplo de JSON
```json
{
    "name": "teste",
    "contacts": [
        {
            "id": 1,
            "contact_type_id": 1,
            "number": "update1"
        },
        {
            "id": 2,
            "contact_type_id": 2,
            "number": "update2"
        },
        {
            "id": 3,
            "contact_type_id": 3,
            "email": "a@a.com2"
        }
    ]
}
```

Deletar
DELETE
https://paguii-bravi.herokuapp.com/api/people/{id}

