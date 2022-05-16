<?php if(!session()->has('letstalk')){ ?>
<script>
   $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });   
</script>
<?php } ?>