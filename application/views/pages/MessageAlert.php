<?php 
if(!empty($this->session->flashdata('Msg')))
{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="text-center text-danger"><?php echo $this->session->flashdata('Msg'); ?></b>
<?php
}
?>