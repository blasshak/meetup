meetup
=======
Url:

http://localhost:8000/app_dev.php/api/events/41.490047/2.139761

Parameters:
 - lat – Latitude to search
 - long – Longitude to search

Note: There is other option instead of pass lat and long as parameters. it is possible to create a service that makes a request to external service (api) giving ip of the server as parameter, and the api give you the lat an long.

Run the application:
``` bash
php bin/console server:start
```

Note: Take into account that the port can change

Run the tests:
``` bash
php bin/phpunit-5.7.19.phar --group=unit_test
php bin/phpunit-5.7.19.phar --group=integration_test
```

Note:
- All tests have groups.
- One is to indicate which type of tests is (unit_tests, integration_test...)
- The others groups indicate the level of the path

In order to load the information of meetup I used the library "https://github.com/rdohms/meetup-api-client". 

The Idea is to get events from Repository called MeetupReadingRepository. This is responsible for using the library and returning the events. Is important to say that the interface called MeetupReadingRepositoryInterface was created from the client's need and not from what the class MeetupReadingRepository needs (solid dependency inversion).

Depends on the business logic, I should take into account the Interface segregation principle. That means If MeetupReadingRepository gets too big, maybe it would be convenient to create a MeetupApiClient that only handles HTTP calls, being used by MeetupReader by performs some processing on fetched data, and this one will implement the ReaderRepositoryInterface.
