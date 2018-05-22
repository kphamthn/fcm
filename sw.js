/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/3.5.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.5.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
  'messagingSenderId': '206031946906'
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background mes2sage ', payload);
  self.clients.matchAll({includeUncontrolled: true}).then(function (clients) {
       console.log(clients); 
       clients.forEach(function(client) {
           client.postMessage('{"text":"'+payload.data.text+'", "title":"'+payload.data.title+'"}');
       });
     });
});

