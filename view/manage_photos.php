<script>
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
<div id="largef"><H3 align="left" style="text-shadow: 0 0 3px #FF0000; width:100%; max-width:100%;">Simply follow these 5 steps to create your own My Own Memory Lane.</H3>
<div id="mobilediv2">
<form name="register" method="post" enctype="multipart/form-data" >
<table width="100%" id="regtable">
<tr>
<td align="left"><span style="color:#F00" >Step 1:</span> Browse for an image.</td></tr><tr><td align="left"><input id="uploadBtn" name="uploader" type="file" class="add-photo-btn" /></td></tr>
<tr><td align="left">&nbsp;</td></tr><tr><td align="left"><span style="color:#F00" >Step 2:</span> Provide a caption for the selected image.</td></tr><tr><td align="left"><input type="text" class="captionphoto" name="caption" /></td></tr><tr><td align="left">&nbsp;</td></tr><tr><td align="left"><span style="color:#F00" >Step 3:</span> Click Upload.</td></tr><tr><td align="left"><input type="submit" class="photo-btn" value="Upload"  /></td></tr><tr><td align="left">&nbsp;</td></tr><span style="color:#F00" ><?php echo $msg; ?></span><tr><td align="left"><span style="color:#F00" >Step 4:</span> Repeat steps 1-3 until all images have been uploaded. You can always add more later.</td></tr><tr><td align="left">&nbsp;</td></tr><tr><br><td align="left"><span style="color:#F00" >Step 5:</span> When done uploading images, <span align="left" style="text-shadow: 0 0 3px #FF0000;color:#F00"><a href="index.php?page=memorylane"  style="color:#F00">click here to go to My Own Memory Lane.</a></span><br></td></tr><tr><td align="left">&nbsp;</td></tr><tr><br><td align="left">As you add images they appear below where you may edit or delete them. To edit the caption of a photo, click Edit Caption beneath the photo. To delete a photo, click Delete Picture beneath the photo.</td></tr>
</table>
<input type="hidden" name="frmAction"  value="file_upload" />
</form>
</div>

<br />
<!--<span style="color:#F00" ><?php echo $msg; ?></span>-->
<hr />
<br />

<!--  MOBILE -->
<div id="mobilediv2">
<table width="100%" >
<tbody>

<?php
$count=0;
foreach($photos as $photo)
{
	$count=$count+1;
?>
<tr><td align="left" ><?php echo $count; ?>. Uploaded on <?php echo $photo['upload_date']; ?></td></tr><tr><td align="left"><img style="max-width:200px;" id="photimg" src="<?php echo $photo['photo_name']; ?>" /></td></tr><tr><td align="left"><?php echo $photo['photo_caption']; ?></td></tr><tr><td align="left"><a href="?page=update_caption&id=<?php echo $photo['id']; ?>"><img src="images/edit.png" width="25" />  Edit Caption</a>&nbsp;&nbsp;<br /><a href="?frmAction=delete_photo&page=manage_photos&id=<?php echo $photo['id']; ?>" onclick="return confirmMsg()"><img src="images/cross.png" width="25" /> Delete Picture</a></td></tr>
<tr><td colspan="5" height="15"><hr /></td></tr>
<?php
}
?>
</tbody>
</table>
</div>
<!-- END MOBILE -->

</div>