<?php $this->component('header', array('title' => $this->title)); ?>

<h1 style="color:indianred;">Erro 404</h1>
<h5><?php echo strip_tags($page_data['message']); ?></h5>

<?php $this->component('footer'); ?>
