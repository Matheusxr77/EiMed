<?php
//message
if(isset($_SESSION['message-news'])):
?>

<script>
    //message news
    window.onload = function() {
        M.toast({html: '<?php echo $_SESSION['message-news']; ?>'});
    };
</script>

<?php
endif;
session_unset();
?>