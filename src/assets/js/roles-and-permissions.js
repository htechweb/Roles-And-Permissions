var RolesAndPermissions = (function(){
  var ui = {};
  const select_all = "select-all";
  const unselect_all = "unselect-all";
  
  var bindUI  = function(){
    var _ui = {};
    _ui.$editRoleButton          = $(".edit-role-btn");
    _ui.$editPermissionButton    = $(".edit-permission-btn");
    _ui.$editRoleModal           = $('#editRoleModal');
    _ui.$editPermissionModal     = $('#editPermissionModal');
    _ui.$bulkActions             = $("#bulkActions");
    _ui.attrRoleName             = "role_name";
    _ui.attrRoleId               = "role_id";
    _ui.attrPermissionName       = "permission_name";
    _ui.attrPermissionId         = "permission_id";
    _ui.dataId                   = "id";
    _ui.dataName                 = "name";
    _ui.$permissionCheckboxes    = $('input[type="checkbox"]');
    _ui.$addRoleModal            = $("#addRoleModal");
    _ui.$addRoleForm             = _ui.$addRoleModal.find('form');
    _ui.$submitBtnAddRoleForm    = _ui.$addRoleModal.find('.submit-btn');

    return _ui;
  };

  var bindEvents = function(){
    ui.$editRoleButton.click(editRole);
    ui.$editPermissionButton.click(editPermission);
    ui.$bulkActions.change(applyBulkActions);

  };

  var editRole = function(event){
      event.preventDefault();
      let role_id   = $(this).data(ui.dataId);
      let role_name = $(this).data(ui.dataName);

      editRolesAndPermissions(role_id,role_name);

  }

  var editPermission = function(event){
    event.preventDefault();
    let permission_id   = $(this).data(ui.dataId);
    let permission_name = $(this).data(ui.dataName);

     editRolesAndPermissions(permission_id,permission_name,false);
  }

  var editRolesAndPermissions = function(id,name,isRole = true){
    var modal     = isRole ? ui.$editRoleModal : ui.$editPermissionModal;
    var attrName  = isRole ? ui.attrRoleName : ui.attrPermissionName;
    var attrId    = isRole ? ui.attrRoleId : ui.attrPermissionId;
    
    modal.find(`input[name="${attrName}"]`).val(name);
    modal.find(`input[name="${attrId}"]`).val(id);

    modal.modal('show');
  }

  var applyBulkActions = function(){
     var action = $(this).val();

     if(action == "" || typeof action === "undefined") return;

     toggleCheck(action == select_all ? true : false);  
  }

  var toggleCheck = function(checked = true){  
      ui.$permissionCheckboxes.prop('checked', checked);
  }

  var init = function(){
    ui = bindUI();
    bindEvents();
  };

  return {
    init
  };
})();

$(document).ready(function() {
  RolesAndPermissions.init();   
});