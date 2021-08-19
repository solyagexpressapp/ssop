function setUpdateAction() {
document.frmUser.action = "edit_user.php";
document.frmUser.submit();
}
function setDeleteAction() {
if(confirm("Confirma antes de")) {
document.frmUser.action = "delete_user.php";
document.frmUser.submit();
}
}