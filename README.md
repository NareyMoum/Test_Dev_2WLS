 Test_Dev_2WLS

# Test Dev 2WLS

This is is test dev project for simple managing members App.

```
Requirements: Symfony 5.0.1 , php: 7.2.5 
```

 
 For installation of the project, you can first: 


## Run the project without Docker 

Clone the project: 
```
 git clone https://github.com/NareyMoum/Test_Dev_2WLS.git
```

 Navigate inside the project cloned with : cd Test_Dev_2WLS


 Install dependencies  by running:  ```composer installl```


 change the .env file and add you database config



 Migrate the migration with that command: ```php bin/console doctrine:migrations:migrate```



 Run your local dev server by running that command: ```php -S localhost:8000 -t public/```


Open your browser and navigate to this that url : ```http://127.0.0.1:8000/```

## Run with Docker

To build symfony docker container run that command inside the project root folder

```docker build -t Test_Dev_2WLS```

The next step run the container you have just built using Docker

```docker run -it -p 8000:8000 Test_Dev_2WLS"

