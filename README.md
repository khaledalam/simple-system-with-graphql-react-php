### simple system with GraphQL, Reactjs, PHP

Tools used:  PHP v7.3^ ,  Symfony 4.4^ ,  React 16^ , SQL , Docker , overblog/GraphQLBundle

##### Preview:
as [gif](preview.gif) - [video](https://youtu.be/lETcXJiwCh0)
<img src="preview.gif">
- UI: [https://s1mplesys.000webhostapp.com/public](https://s1mplesys.000webhostapp.com/public)
- GraphiQL: [https://s1mplesys.000webhostapp.com/public/graphiql](https://s1mplesys.000webhostapp.com/public/graphiql)
- GraphQL: [https://s1mplesys.000webhostapp.com/public/graphql/?query=query{buyers{id,name}}](https://s1mplesys.000webhostapp.com/public/graphql/?query=query{buyers{id,name}})


note: this is my first time to use GraphQL & Reactjs
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
  $ git clone git@github.com:khaledalam/simple-system-with-graphql-react-php.git
  $ cd simple-system-with-graphql-react-php
  ```
-  Update DB info in .env file:
   ```
   DATABASE_URL=mysql://USERNAME:PASSWORD@127.0.0.1:PORT/DB_NAME
   ```
- ```
  $ composer install   # press (a) to accept all recipes
  $ yarn install
  $ php bin/console doctrine:database:create
  $ php bin/console doctrine:schema:update --force -n
  $ php bin/console doctrine:fixtures:load -n  # add dummy buyers&products
  ```
- ```
   $ php bin/console server:start
   ```
##### Assumptions:
- I assume order can contain multi-products instead of a single product.
- I assume we can use any ready jwt sandbox app (ex. example)
host jwt sandbox on any server
inject it throw register, login and retrieving buyer's orders processes via HTTPexample: - curl -H "Authorization: jwt+[TOKEN]" http://jwt_server/getBuyerIdOfThisToken - compare returnedId with current buyer id - if equal then fetch all current buyer's orders
- I assume all current urls available only for admins
- I assume validations are very basic annotation constraints
- I assume we use symfony environment (ex. this docker-symfony)
- I assume more improvements will be done (ex. decrease redundant codes, reducing repetition logic)
- I assume using another toolkit that supports editing HTTP headers for graphql instead of playground(since I used symfony not laravel and no stable symfony bundle similar to mll-lab/laravel-graphql-playground)

