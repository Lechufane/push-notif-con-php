navigator.serviceWorker.register("/sw.js");

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
              "BNFqRLZDs3ewl8OXOSpN46_R2e1NewbsB-uRAodaJftqwy5FomdoSEJ8a-2B11yotYZsC-9Auux7aoe3uyhMnoI", //to add public key we need to
          })
          .then((subscription) => {
            console.log(JSON.stringify(subscription));
          });
      });
    }
  });
}
