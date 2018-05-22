### FCM - Notification

I have made a simple message system in which people can send message to other users knowing their username to check if Firebase works. It will run on any server inc localhost.

Basic idea:
- Eachtime an user logs in, his device token will be added to an array in the database with his username.
- When he logs out, the current token will be removed from the array.
- Eachtime an user does something, the tokens of the respective users will be call and a request will be made using FCM API.
- The data message is displayed using [Firebase events](https://firebase.google.com/docs/cloud-messaging/js/receive). When the app is in the background, I use the [Service Worker API](https://developer.mozilla.org/en-US/docs/Web/API/Service_Worker_API) to display received messages.

I used my PHP Middleware from last time to trigger and control message flows. That can also be done with go (or some other languages).

The idea is the same with our application, since it is also basically a web app.
