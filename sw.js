self.addEventListener("push", (event) => {
  const notification = event.data.json();
  // {"title":"Hi" , "body":"something amazing!" , "url":"./?message=123"}
  event.waitUntil(
    self.registration.showNotification(notification.title, {
      body: notification.body,
      icon: "icon.png",
      data: {
        notifURL: notification.url,
      },
    })
  );
});

self.addEventListener("notificationclick", (event) => {
  event.waitUntil(clients.openWindow(event.notification.data.notifURL));
});

// Inside your service worker script
self.addEventListener("message", function (event) {
  // Handle incoming messages from the main thread
  console.log("Service Worker received message:", event.data);

  // Send a message back to the main thread
  self.clients.matchAll().then(function (clients) {
    clients.forEach(function (client) {
      client.postMessage("Hello from the service worker!");
    });
  });
});
