function setUpdateAction2() {
document.frmUser2.action = "edit_user.php";
document.frmUser2.submit();
}
function setDeleteAction2() {
if(confirm("Confirmar?")) {
document.frmUser2.action = "delete_user2.php";
document.frmUser2.submit();
}
}
