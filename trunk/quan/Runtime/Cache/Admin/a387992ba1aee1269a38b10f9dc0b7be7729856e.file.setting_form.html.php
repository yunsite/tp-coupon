<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:30
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\SysConf\setting_form.html" */ ?>
<?php /*%%SmartyHeaderCode:17864fa373c6d65294-30579180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a387992ba1aee1269a38b10f9dc0b7be7729856e' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\SysConf\\setting_form.html',
      1 => 1324998508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17864fa373c6d65294-30579180',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'var' => 0,
    'k' => 0,
    'opt' => 0,
    'lang' => 0,
    'key' => 0,
    'op_key' => 0,
    'op' => 0,
    'countries' => 0,
    'region' => 0,
    '_CFG' => 0,
    'provinces' => 0,
    'cities' => 0,
    'lang_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373c75a72c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373c75a72c')) {function content_4fa373c75a72c($_smarty_tpl) {?>      <tr>
        <th width="190" class="first"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
:</th>
        <td>
          <?php if ($_smarty_tpl->tpl_vars['var']->value['type']=="text"){?>
          <input name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" size="40" />

          <?php }elseif($_smarty_tpl->tpl_vars['var']->value['type']=="password"){?>
          <input name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" type="password" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" size="40" />

          <?php }elseif($_smarty_tpl->tpl_vars['var']->value['type']=="textarea"){?>
          <textarea name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" cols="40" rows="5"><?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
</textarea>

          <?php }elseif($_smarty_tpl->tpl_vars['var']->value['type']=="select"){?>
          <?php  $_smarty_tpl->tpl_vars['opt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['opt']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['var']->value['store_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['opt']->key => $_smarty_tpl->tpl_vars['opt']->value){
$_smarty_tpl->tpl_vars['opt']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['opt']->key;
?>
          <label for="value_<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><input type="radio" name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" id="value_<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
"
            <?php if ($_smarty_tpl->tpl_vars['var']->value['value']==$_smarty_tpl->tpl_vars['opt']->value){?>checked="true"<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['var']->value['code']=='rewrite'){?>
              onclick="return ReWriterConfirm(this);"
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['var']->value['code']=='smtp_ssl'&&$_smarty_tpl->tpl_vars['opt']->value==1){?>
              onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['lang']->value['smtp_ssl_confirm'];?>
');"
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['var']->value['code']=='enable_gzip'&&$_smarty_tpl->tpl_vars['opt']->value==1){?>
              onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['lang']->value['gzip_confirm'];?>
');"
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['var']->value['code']=='retain_original_img'&&$_smarty_tpl->tpl_vars['opt']->value==0){?>
              onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['lang']->value['retain_original_confirm'];?>
');"
            <?php }?>
          /><?php echo $_smarty_tpl->tpl_vars['var']->value['display_options'][$_smarty_tpl->tpl_vars['k']->value];?>
</label>
          <?php } ?>

          <?php }elseif($_smarty_tpl->tpl_vars['var']->value['type']=="options"){?>
          <select name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" id="value_<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
            <?php  $_smarty_tpl->tpl_vars['op'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['op']->_loop = false;
 $_smarty_tpl->tpl_vars['op_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lang']->value['cfg_range'][$_smarty_tpl->tpl_vars['var']->value['code']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['op']->key => $_smarty_tpl->tpl_vars['op']->value){
$_smarty_tpl->tpl_vars['op']->_loop = true;
 $_smarty_tpl->tpl_vars['op_key']->value = $_smarty_tpl->tpl_vars['op']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['op_key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['op_key']->value==$_smarty_tpl->tpl_vars['var']->value['value']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['op']->value;?>
</option>
            <?php } ?>
          </select>

          <?php }elseif($_smarty_tpl->tpl_vars['var']->value['type']=="file"){?>
          <input name="<?php echo $_smarty_tpl->tpl_vars['var']->value['code'];?>
" type="file" size="40" />
          <?php if (($_smarty_tpl->tpl_vars['var']->value['code']=="shop_logo"||$_smarty_tpl->tpl_vars['var']->value['code']=="no_picture"||$_smarty_tpl->tpl_vars['var']->value['code']=="watermark"||$_smarty_tpl->tpl_vars['var']->value['code']=="shop_slagon"||$_smarty_tpl->tpl_vars['var']->value['code']=="wap_logo")&&$_smarty_tpl->tpl_vars['var']->value['value']){?>
            <a href=""><img src="images/no.gif" alt="Delete" border="0" /></a> <img src="images/yes.gif" border="0" onmouseover="showImg('<?php echo $_smarty_tpl->tpl_vars['var']->value['code'];?>
_layer', 'show')" onmouseout="showImg('<?php echo $_smarty_tpl->tpl_vars['var']->value['code'];?>
_layer', 'hide')" />
            <div id="<?php echo $_smarty_tpl->tpl_vars['var']->value['code'];?>
_layer" style="position:absolute; width:100px; height:100px; z-index:1; visibility:hidden" border="1">
              <img src="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" border="0" />
            </div>
          <?php }else{ ?>
            <?php if ($_smarty_tpl->tpl_vars['var']->value['value']!=''){?>
            <img src="images/yes.gif" alt="yes" />
            <?php }else{ ?>
            <img src="images/no.gif" alt="no" />
            <?php }?>
          <?php }?>
          <?php }elseif($_smarty_tpl->tpl_vars['var']->value['type']=="manual"){?>

            <?php if ($_smarty_tpl->tpl_vars['var']->value['code']=="shop_country"){?>
              <select name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" id="selCountries" onchange="region.changed(this, 1, 'selProvinces')">
                <option value=''><?php echo $_smarty_tpl->tpl_vars['lang']->value['select_please'];?>
</option>
                <?php  $_smarty_tpl->tpl_vars['region'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['region']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['region']->key => $_smarty_tpl->tpl_vars['region']->value){
$_smarty_tpl->tpl_vars['region']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['region']->value['region_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['region']->value['region_id']==$_smarty_tpl->tpl_vars['_CFG']->value['shop_country']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['region']->value['region_name'];?>
</option>
                <?php } ?>
              </select>
                  <?php }elseif($_smarty_tpl->tpl_vars['var']->value['code']=="shop_province"){?>
              <select name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
                <option value=''><?php echo $_smarty_tpl->tpl_vars['lang']->value['select_please'];?>
</option>
                <?php  $_smarty_tpl->tpl_vars['region'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['region']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['provinces']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['region']->key => $_smarty_tpl->tpl_vars['region']->value){
$_smarty_tpl->tpl_vars['region']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['region']->value['region_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['region']->value['region_id']==$_smarty_tpl->tpl_vars['_CFG']->value['shop_province']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['region']->value['region_name'];?>
</option>
                <?php } ?>
              </select>
            <?php }elseif($_smarty_tpl->tpl_vars['var']->value['code']=="shop_city"){?>
              <select name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]" id="selCities">
                <option value=''><?php echo $_smarty_tpl->tpl_vars['lang']->value['select_please'];?>
</option>
                <?php  $_smarty_tpl->tpl_vars['region'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['region']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['region']->key => $_smarty_tpl->tpl_vars['region']->value){
$_smarty_tpl->tpl_vars['region']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['region']->value['region_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['region']->value['region_id']==$_smarty_tpl->tpl_vars['_CFG']->value['shop_city']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['region']->value['region_name'];?>
</option>
                <?php } ?>
              </select>
            <?php }elseif($_smarty_tpl->tpl_vars['var']->value['code']=="lang"){?>
                  <select name="value[<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
]">
                  <?php  $_smarty_tpl->tpl_vars['op'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['op']->_loop = false;
 $_smarty_tpl->tpl_vars['op_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lang_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['op']->key => $_smarty_tpl->tpl_vars['op']->value){
$_smarty_tpl->tpl_vars['op']->_loop = true;
 $_smarty_tpl->tpl_vars['op_key']->value = $_smarty_tpl->tpl_vars['op']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['op_key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['op_key']->value==$_smarty_tpl->tpl_vars['var']->value['value']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['op']->value;?>
</option>
                  <?php } ?>
                  </select>
            <?php }elseif($_smarty_tpl->tpl_vars['var']->value['code']=="invoice_type"){?>
            <table>
              <tr>
                <th scope="col"><?php echo $_smarty_tpl->tpl_vars['lang']->value['invoice_type'];?>
</th>
                <th scope="col"><?php echo $_smarty_tpl->tpl_vars['lang']->value['invoice_rate'];?>
</th>
              </tr>
              <tr>
                <td><input name="invoice_type[]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['invoice_type']['type'][0];?>
" /></td>
                <td><input name="invoice_rate[]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['invoice_type']['rate'][0];?>
" /></td>
              </tr>
              <tr>
                <td><input name="invoice_type[]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['invoice_type']['type'][1];?>
" /></td>
                <td><input name="invoice_rate[]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['invoice_type']['rate'][1];?>
" /></td>
              </tr>
              <tr>
                <td><input name="invoice_type[]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['invoice_type']['type'][2];?>
" /></td>
                <td><input name="invoice_rate[]" type="text" value="<?php echo $_smarty_tpl->tpl_vars['_CFG']->value['invoice_type']['rate'][2];?>
" /></td>
              </tr>
            </table>
            <?php }?>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['var']->value['desc']){?>
          <br />
          <span class="fontgray" id="notice<?php echo $_smarty_tpl->tpl_vars['var']->value['code'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['var']->value['desc']);?>
</span>
          <?php }?>
        </td>
      </tr><?php }} ?>