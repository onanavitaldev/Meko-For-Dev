<link rel="stylesheet" href="src/lib/animate.css">
<link rel="stylesheet" href="src/Scss/var.css">
<div class="load fixed top-0">
    <div class="loader">
        <img src="assets/img/logo.png" alt="Meko" height="70" width="70">
    </div>
</div>
<style>
    .load {
        background-color: var(--main-bg-dark);
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0s ease-in 0.9s;
    }

    .load .loader img {
        animation: zoomIn 1s;
    }
</style>
<script>
    setTimeout(() => {
        window.location.href = "dashboard.php";
    }, 2000);
</script>