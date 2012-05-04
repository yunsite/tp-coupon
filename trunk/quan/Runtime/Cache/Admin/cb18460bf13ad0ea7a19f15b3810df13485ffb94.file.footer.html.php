<?php /* Smarty version Smarty-3.1.6, created on 2012-05-04 14:14:21
         compiled from "D:\APMServ5.2.6\www\htdocs\quan\Tpl\Admin\Public\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:56044fa373bdd49459-37194148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb18460bf13ad0ea7a19f15b3810df13485ffb94' => 
    array (
      0 => 'D:\\APMServ5.2.6\\www\\htdocs\\quan\\Tpl\\Admin\\Public\\footer.html',
      1 => 1324912166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56044fa373bdd49459-37194148',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4fa373bddab7d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa373bddab7d')) {function content_4fa373bddab7d($_smarty_tpl) {?>						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="ajax-loading"></div>
</body>
<script type="text/javascript">

jQuery(function($){
	updateBodyDivHeight();
	$(window).resize(function(){
		updateBodyDivHeight();
	});
});

function updateBodyDivHeight()
{
	jQuery(".body-table-div").height(jQuery(".fanwe-body").height() - 36);
	if(jQuery(".body-table-div").get(0).scrollHeight > jQuery(".body-table-div").height())
	{
		var width = jQuery(".body-table-div").width() - 16;
		jQuery(".body-table-div > *").each(function(){
			if(!$(this).hasClass('ajax-loading'))
			{
				$(this).width(width)	
			}
		});
	}
}

</script>
</html>
<?php }} ?>