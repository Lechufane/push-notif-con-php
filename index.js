//aca se registra el service worker
navigator.serviceWorker.register("/sw.js");

/**
 * This function is called when the user clicks on a button to enable notifications from the app.
 * After the user grants the permission, the service worker is ready and we can subscribe to the push manager.
 * The push manager will return a subscription object that we can use to send notifications to the user.
 *
 * @returns {void}
 */
function enableNotifications() {
  Notification.requestPermission().then((permision) => {
    //if the permision is granted
    if (permision === "granted") {
      //get the service worker
      navigator.serviceWorker.ready.then((sw) => {
        //and then subscribe to the push manager
        sw.pushManager
          .subscribe({
            userVisibleOnly: true,
            applicationServerKey:
              "BGub5LGHjgzuJtjuIaPnGTU7AEfkMfUQDLHX1SjV32bMN4FSUTKFgDMuOukJBroZxDtXE9ecGWsHz8K9I6hB0_8", //to add public key we need to
          })
          .then((subscription) => {
            sub = subscription;
            //send the subscription to the server.
            fetch("http://localhost:3000", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify(subscription),
            });
          });
      });
    }
  });
}
