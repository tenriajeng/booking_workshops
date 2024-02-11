<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script type="module">
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyDZSfIwc_uJ4ZxOPnSRykFhl-sI9A3-4Ik",
        authDomain: "workshop-60fd9.firebaseapp.com",
        databaseURL: "https://workshop-60fd9-default-rtdb.firebaseio.com",
        projectId: "workshop-60fd9",
        storageBucket: "workshop-60fd9.appspot.com",
        messagingSenderId: "711544889573",
        appId: "1:711544889573:web:a287539941b6c30d69f40c",
        measurementId: "G-VCSN55X4TZ"
    };

    // Initialize Firebase 
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    $(window).on('load', function() {
        messaging
            .requestPermission()
            .then(function() {
                return messaging.getToken()
            })
            .then(function(response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('store.token') }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log('Token stored.');
                    },
                    error: function(error) {
                        console.log(error);
                    },
                });

            }).catch(function(error) {
                console.log(error);
            });
    });

    messaging.onMessage(function(payload) {
        console.log("ok ");
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });
</script>
{{-- <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyDZSfIwc_uJ4ZxOPnSRykFhl-sI9A3-4Ik",
        authDomain: "workshop-60fd9.firebaseapp.com",
        databaseURL: "https://XXXX.firebaseio.com",
        projectId: "workshop-60fd9",
        storageBucket: "XXXX",
        messagingSenderId: "XXXX",
        appId: "XXXX",
        measurementId: "XXX"
    };
      
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
  
    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);
   
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
  
                $.ajax({
                    url: '{{ route("save-token") }}',
type: 'POST',
data: {
token: token
},
dataType: 'JSON',
success: function (response) {
alert('Token saved successfully.');
},
error: function (err) {
console.log('User Chat Token Error'+ err);
},
});

}).catch(function (err) {
console.log('User Chat Token Error'+ err);
});
}

messaging.onMessage(function(payload) {
const noteTitle = payload.notification.title;
const noteOptions = {
body: payload.notification.body,
icon: payload.notification.icon,
};
new Notification(noteTitle, noteOptions);
});

</script> --}}
