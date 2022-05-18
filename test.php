<h1>Testing for One Signal</h1>

<!-- One Signal -->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "3f0cc56a-2278-4376-a2f0-73f3315d66ed",
    });

    OneSignal.isPushNotificationsEnabled(function(isEnabled) {
      if (isEnabled) {
        OneSignal.getUserId(function(userId) {
          console.log("Player id of subscribed user is : " + userId);
          // isEnabled = false;
          console.log("isEnabled is " + isEnabled);
        });
      }
    });

    // OneSignal.setSubscription(false);
  });
</script>