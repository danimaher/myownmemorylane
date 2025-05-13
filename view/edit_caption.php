<script>
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
<div id="largef">
<p align="left" style="text-shadow: 0 0 3px #FF0000; width:100%; max-width:100%;">Please enter a caption in the Caption textbox.</p>
<h3 align="left" style="text-shadow: 0 0 3px #FF0000;color:#F00"><a href="index.php?page=memorylane"  style="color:#F00">Go to My Own Memory Lane.</a></h3><br>
<form name="register" method="post" enctype="multipart/form-data" >
<table width="100%" id="regtable">
<tr><td>Caption</td><td><input type="text" class="captionphoto" width="100%"  style="width:100%" name="caption" required="required" value="<?php echo $caption; ?>" /></td>
<td><input type="submit" class="photo-btn" value="Update"  />
</td></tr>
</table>
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
<input type="hidden" name="frmAction"  value="update_caption" />
</form>
<br />
<span style="color:#FFF" ><?php echo $msg; ?></span>
<hr />
<br />

</div>