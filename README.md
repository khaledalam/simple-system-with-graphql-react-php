### Task-php-symfony-graphql-react

Tools used:  PHP v7.3^ ,  Symfony 4.4^ ,  React 16^ , SQL , Docker , overblog/GraphQLBundle

##### Preview:
as [gif](preview.gif) - ~[video](https://youtu.be/lETcXJiwCh0)~
<img src="preview.gif">
- GraphiQL: URL:85/graphiql
- GraphQL: URL:85/graphql/?query=query{buyers{id,name}}
- UI: URL:85

##### GraphiQL:
- Example Query:
    ```
    query {
      buyer(id: 20){
        id,
        name,
        authToken
      },
      products{
        id,
        name
      },
      buyers{
        name
      }
    }
    ```
- Example Mutation:
  ***Note:*** entered `buyerID` and `productsIDs` must be existed to create order!
    ```
    mutation {
      createOrder(buyerID: "20", productsIDs: ["26", "24"]){
        id,
        buyer{
          name
        },
        products{
          name,
          id
        }
      }
    }
    ```


##### Install & run:
- ```
  $ git clone git@github.com:khaledalam/task-php-symfony-graphql-react.git
  $ cd task-php-symfony-graphql-react
  ```
-  Update DB info in .env file:
   ```
   DATABASE_URL=mysql://USERNAME:PASSWORD@127.0.0.1:PORT/DB_NAME
   ```
- ```
  $ composer install   # press (a) to accept all recipes
  $ yarn install
  $ yarn encore dev
  $ php bin/console doctrine:database:create
  $ php bin/console doctrine:schema:update --force -n
  $ php bin/console doctrine:fixtures:load -n  # add dummy buyers&products
  ```
- ```
   $ php bin/console server:start
   ```
