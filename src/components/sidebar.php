<!-- Left_Navigation -->
<div class="fixed sm:block" id="nav-left" style="display:none;">
    <div class="heading">
        <h3 id="menu"></h3>
    </div>
    <div id="link_">
        <ul>
            <a href="dashboard.php">
                <li class="block" style="background-color:transparent;">
                    <img src="assets/img/logo.png" height="60" width="60">
                </li>
            </a>
            <li class="" title="Notifications">
                <a href="#">
                    <img src="assets/icons/notif.png">
                </a>
            </li>
            <li class="" title="Méssagerie">
                <a href="chat.php">
                    <img src="assets/icons/message.png">
                </a>
            </li>
            <li class="" title="Envoyer un mail">
                <a href="send_mail.php">
                    <img src="assets/icons/send_email.png">
                </a>
            </li>
            <li class="" title="Mon profil">
                <a href="account.php">
                    <img src="assets/icons/account.png">
                </a>
            </li>
            <li class="" title="Options">
                <a href="setting.php">
                    <img src="assets/icons/setting.png">
                </a>
            </li>
            <li class="" title="WI-FI">
                <a href="#">
                    <img src="assets/icons/wi-fi_disconnected.png">
                </a>
            </li>
            <li class="" title="Meko Premium">
                <a href="premium.php">
                    <img src="assets/icons/premium.png">
                </a>
            </li>
            <li class="" title="Se déconnecter">
                <a href="log-out.php">
                    <img src="assets/icons/logout.png">
                </a>
            </li>
        </ul>
    </div>
</div>        
<!-- Menu -->
<button class="shadow-lg" id="message_btn" title="Plus d'outils">
    <a href="#">
        <img src="assets/icons/menu.png">
    </a>
</button>
<style>
    #nav-left
    {
        animation: fadeInLeft 0.3s;
    }
</style>
<script src="scripts/app.js"></script>
<script>
    let btn = document.getElementById("message_btn").addEventListener("click", function(){
        let nav = document.getElementById("nav-left").style.display = "block";
    })
</script>