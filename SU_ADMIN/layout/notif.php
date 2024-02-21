<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 10px;text-align:center;">
            <div class="row">
                <button class="btn btn-warning" onclick="notifikasi()">

                    Klik Disini
                </button>
            </div>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <!-- Notifikasi Script -->
        <script>
            $(document).ready(function() {
                  if (Notification.permission !== "granted")
                    Notification.requestPermission();
            });
             
            function notifikasi() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Panti Wilasa Citarum', {
                        icon: 'http://192.168.9.2/E-PWC/images/logo.png',
                        body: "Jangan Lupa Check Pendaftaran Online!",
                    });
                    notifikasi.onclick = function () {
                        window.open("http://pdfpantiwilasacitarum.com/E-PWC/SU_admin/?HLM=LIST_DAFTAR_TODAY");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };
        </script>
</body>
</html>