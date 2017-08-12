<?php

$build_page_style = $config_page_style = $publish_page_style = 'style="display:none;"';
$build_step_class = $config_step_class = $publish_step_class = '';

$normalized_form_name = function_exists("mb_strimwidth")? mb_strimwidth($data->form_name, 0, 22, "..."): $data->form_name;

switch($data->active_step) {
    
    case 'config':
        $config_page_style = "";
        $config_step_class = "rm-wizard-activated";
        break;
    
    case 'publish':
        $publish_page_style = "";
        $publish_step_class = "rm-wizard-activated";
        break;
    
    default:
        $build_page_style = "";
        $build_step_class = "rm-wizard-activated";
        break;
}

?>
<link rel="stylesheet" type="text/css" href="<?php echo RM_BASE_URL . 'admin/css/'; ?>style_rm_form_dashboard.css">
<link rel="stylesheet" type="text/css" href="<?php echo RM_BASE_URL . 'admin/css/'; ?>style_rm_formflow.css">
<script type="text/javascript" src="<?php echo RM_BASE_URL . 'admin/js/'; ?>script_rm_formflow.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="rm-formflow-top-bar">
 
     <!-- Step 1 -->
     <div class="rm-formflow-top-section" style="text-align: left">
         <div class="rm-formflow-top-action" >
             <span><a href="<?php echo admin_url( 'admin.php?page=rm_form_manage'); ?>"><i class="material-icons">keyboard_arrow_left</i> All Forms</a></span>
         </div>
     </div>
     <!-- Step 1 -->
 
     <!-- Step 2 -->
     <div class="rm-formflow-top-section" style="text-align: center">
         <div class="rm-formflow-top-action  rm-formflow-top-action-center" >
             
             <span ></span>
         </div>
     </div>
     <!-- Step 2 -->
 
     <!-- Step 3 -->
     <div class="rm-formflow-top-section" style="text-align: right">
         <div class="rm-formflow-top-action rm-formflow-top-action-right" >
             
             <span><a href="<?php echo admin_url( 'admin.php?page=rm_form_sett_manage&rm_form_id='.$data->form_id); ?>">Form Dashboard <i class="material-icons">keyboard_arrow_right</i></a></span>
         </div>
     </div>
 
 </div>

<div id="rm_formflow_build" class="rm_formflow_page" <?php echo $build_page_style; ?> >
<?php include RM_ADMIN_DIR."views/template_rm_field_manager.php"; ?>
</div>

<div id="rm_formflow_publish" class="rm_formflow_page" <?php echo $publish_page_style; ?> >
<?php include RM_ADMIN_DIR."views/template_rm_formflow_publish.php"; ?>
</div>


