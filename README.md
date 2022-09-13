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


Open your browser and navigate to this that url to test the api endpoints : ```http://127.0.0.1:8000/api```


## Run with Docker

To build symfony docker container run that command inside the project root folder

```docker build -t Test_Dev_2WLS```

The next step run the container you have just built using Docker

```docker run -it -p 8000:8000 Test_Dev_2WLS```


##Screen Shots:

#API: 

<img width="1193" alt="Capture d’écran 2022-09-13 à 22 49 57" src="https://user-images.githubusercontent.com/33690076/190015657-93c2f852-a90a-462a-ab4a-598583dacc91.png">



#UI Interface:

<img width="1274" alt="Capture d’écran 2022-09-13 à 22 49 02" src="https://user-images.githubusercontent.com/33690076/190015673-d13b234f-4c7b-4c94-b9aa-1e8ba03a652f.png">


