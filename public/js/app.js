var taskId_module = 0;
var taskStatus = null;
var taskDesc = null;
var taskbodyElement = null;

$('.panel-body').find('.table-text').find('.edit').on('click', function(event) {
    event.preventDefault();
    tinyMCE.activeEditor.setContent('');
    taskbodyElement = event.target;
    var taskName = taskbodyElement.textContent;
    taskId_module = taskbodyElement.dataset['taskid'];
    taskStatus = taskbodyElement.dataset['taskstatus'];
    taskDesc = taskbodyElement.dataset['taskdesc'];
    
    $('#task-name-modal').val(taskName);

    tinymce.get("task-desc-modal").execCommand('mceInsertContent', false, taskDesc);

    if(taskStatus==1)
    $('#task-status-modal').bootstrapSwitch('state', true);
            else
        $('#task-status-modal').bootstrapSwitch('state', false);

    $('#edit-modal').modal();
});

$('#modal-update').on('click', function () {

    if ($("#task-status-modal").is(":checked") == true)
        taskStatus = 1;
    else
        taskStatus = 0;
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {name: $('#task-name-modal').val(), desc: tinymce.activeEditor.getContent(),status: taskStatus, taskId: taskId_module, _token: token}
    })
        .done(function () {
            $('#edit-modal').modal('hide');
            location.reload();
        });
});
$('#modal-close').on('click', function () {
    $('#edit-modal').modal('hide');
});
$('#modal-delete').on('click', function () {
    $.ajax({
        method: "DELETE",
        url: urlDelete,
        data: { taskId: taskId_module, _token: token }
    }).done(function() {
        $('#edit-modal').modal('hide');
        location.reload();
    });

});
$('#confirmDelete').find('#modal-delete').on('click', function () {
    event.preventDefault();
    taskbodyElement = event.target;
    taskId_module = taskbodyElement.dataset['taskid'];
    console.log('ID:',taskId_module);
    $.ajax({
        method: "DELETE",
        url: urlDelete,
        data: { taskId: taskId_module, _token: token }
    }).done(function() {
        $('#edit-modal').modal('hide');
        location.reload();
    });
});
$('#modal-delete-confirm').on('click', function(event) {
    event.preventDefault();
    taskId_module = event.target.dataset['id'];
    console.log('ID', taskId_module);
});

$("[name='my-checkbox']").bootstrapSwitch();
$("[name='refresh']").on('click',function (){
    location.reload();
});
!function ($) {

    $(function(){

        $('[data-toggle="confirmation"]').confirmation();
        $('[data-toggle="confirmation-singleton"]').confirmation({singleton:true});
        $('[data-toggle="confirmation-popout"]').confirmation({popout: true});

    })

}(window.jQuery)
