<?php include('header.php') ?>
<div id="tab">
    <ul class="text-center">
        <?php if(!$detect->isMobile()){
                    ?>
        <li class="item employee">
            <img src="img/employee.png" width="80" alt="User" />
            <h3>User</h3>
        </li>
        <?php } ?>
        <li class="item chemical">
            <img src="img/chemical.png" width="80" alt="Chemical" />
            <h3>Chemical</h3>
        </li>
        <li class="item equipment">
            <img src="img/equipment.png" alt="Equipment" />
            <h3>Equipment</h3>
        </li>
        <li class="item library">
            <img src="img/book.png" alt="Library" />
            <h3>Library</h3>
        </li>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function(){
       //$('.item').each(function(){
       $('#tab').fadeIn();
           $('.chemical').click(function(){
               $('#tab li:not(.chemical)').animate({opacity:'0'},500, function(){
                   location.href = 'quan-ly-hoa-chat.php';
               });
           });
           
           $('.equipment').click(function(){
               $('#tab li:not(.equipment)').animate({opacity:'0'},500, function(){
                   location.href = 'quan-ly-dung-cu.php';
               });
           });
           
           $('.library').click(function(){
               $('#tab li:not(.library)').animate({opacity:'0'},500, function(){
                   location.href = 'thu-vien.php';
               });
           });
           
           $('.employee').click(function(){
               $('#tab li:not(.employee)').animate({opacity:'0'},500, function(){
                   location.href = 'quan-ly-nhan-su.php';
               });
           });
       //});
    });
</script>
<?php include('footer.php'); ?>
