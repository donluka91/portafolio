<?php

/**
 * @version     $Id: default.php 19013 2012-11-28 04:48:47Z thailv $
 * @package     JSNUniform
 * @subpackage  Form
 * @author      JoomlaShine Team <support@joomlashine.com>
 * @copyright   Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.
 * @license     GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.joomlashine.com
 * Technical Support:  Feedback - http://www.joomlashine.com/contact-us/get-support.html
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
// Display messages
if ( JFactory::getApplication()->input->getInt( 'ajax' ) != 1 ) {
	echo $this->msgs;
}
$edition = defined( 'JSN_MOBILIZE_EDITION' ) ? JSN_MOBILIZE_EDITION : "free";
?>
<div class="jsn-page-settings jsn-bootstrap">
	<div id="setStyle">
		<style></style>
	</div>
	<form name="adminForm" method="post" id="adminForm" class="hide jsn-mobilize-form">
		<?php echo $this->_form->getInput( 'profile_id' ) ?>
		<div class="jsn-tabs">
			<ul>
				<li class="active">
					<a id="li-general" href="#general">
						<i class="icon-home"></i><?php echo JText::_( 'JSN_MOBILIZE_PROFILE_GENERAL' ); ?>
					</a>
				</li>
				<li>
					<a id="li-design" href="#design">
						<i class="icon-color-palette"></i><?php echo JText::_( 'JSN_MOBILIZE_PROFILE_DESIGN' ); ?>
					</a>
				</li>
			</ul>
			<div class="tab-pane active" id="general">
				<div class="row-fluid form-horizontal">
					<div class="span6">
						<fieldset>
							<legend><?php echo JText::_( 'JSN_MOBILIZE_PROFILE_DETAILS' ); ?></legend>
							<div class="control-group">
								<label class="control-label "
								       original-title="<?php echo JText::_( 'JSN_MOBILIZE_SET_THE_PROFILE_TITLE' ); ?>"><?php echo JText::_( 'JSN_MOBILIZE_PROFILE_TITLE' ); ?></label>

								<div class="controls">
									<?php echo $this->_form->getInput( 'profile_title' ) ?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label "
								       original-title="<?php echo JText::_( 'JSN_MOBILIZE_SET_THE_PROFILE_DES' ); ?>"><?php echo JText::_( 'JSN_MOBILIZE_PROFILE_DESC' ); ?></label>

								<div class="controls">
									<?php echo $this->_form->getInput( 'profile_description' ) ?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label "
								       original-title="<?php echo JText::_( 'JSN_MOBILIZE_SELECT_THE_PROFILE_STATUS_TO_INDICATE' ); ?>"><?php echo JText::_( 'JSTATUS' ); ?></label>

								<div class="controls">
									<?php echo $this->_form->getInput( 'profile_state' ) ?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label jsn-tipsy"
								       original-title="<?php echo JText::_( 'JSN_MOBILIZE_MINIFY_ASSETS_DESC' ); ?>"><?php echo JText::_( 'JSN_MOBILIZE_MINIFY_ASSETS_LABEL' ); ?></label>

								<div class="controls">
									<?php echo $this->_form->getInput( 'profile_minify' ) ?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label jsn-tipsy"
								       original-title="<?php echo JText::_( 'JSN_MOBILIZE_OPTIMIZE_IMAGE_DESC' ); ?>"><?php echo JText::_( 'JSN_MOBILIZE_OPTIMIZE_IMAGE_LABEL' ); ?></label>

								<div class="controls">
									<?php echo $this->_form->getInput( 'profile_optimize_images' ) ?>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="span6">
						<fieldset>
							<legend><?php echo JText::_( 'JSN_MOBILIZE_PROFILE_OPTIONS' ); ?></legend>
							<div class="control-group">
								<label class="control-label " original-title="<?php echo JText::_( 'JSN_MOBILIZE_SELECT_THE_PROFILE_OS_SUPPORT' ); ?>"><?php echo JText::_( 'JSN_MOBILIZE_PROFILE_OS_SUPPORT' ); ?></label>

								<div class="controls">
									<div id="os-support" class="jsn-items-list-container">
										<div class="jsn-items-list ui-sortable">
											<?php
											foreach ( $this->_os as $os ) {
												$check = "";
												if ( in_array( $os->os_id, $this->_osSupport ) || ! $this->_item->profile_id ) {
													$check = 'checked="true"';
												}
												?>
												<div class="jsn-item ui-state-default" style="">
													<label
													  class="checkbox">
														<input <?php echo $check;?> type="checkbox" name="ossupport[]" value="<?php echo $os->os_id;?>">
														<?php echo $os->os_title;?>
													</label>
												</div>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
			<div id="design">
				<div class="jsn-mobilize">
					<div class="jsn-form-bar">
						<div class="btn-group jsn-inline">
							<button type="button" class="btn mobilize_view_layout" id="mobile_ui_enabled">
								<i class="icon-mobile"></i><?php echo JText::_( 'JSN_MOBILIZE_TITLE_SMARTPHONE' ); ?>
							</button>
							<button type="button" class="btn mobilize_view_layout" id="tablet_ui_enabled">
								<i class="icon-tablet"></i><?php echo JText::_( 'JSN_MOBILIZE_TITLE_TABLET' ); ?>
							</button>
						</div>
						<div class="pull-right">
							<button onclick="return false;" class="btn" id="select_profile_css">
								</i><?php echo JText::_( 'JSN_MOBILIZE_ADD_CUSTOM_CSS' );?>
							</button>
							<button onclick="return false;" class="btn" id="select_profile_style">
								<i class="icon-loop"></i><?php echo JText::_( 'JSN_MOBILIZE_LOAD_STYLE' );?>
							</button>
							<div class="jsn-bootstrap" id="container-select-style">
								<div class="popover bottom">
									<div class="arrow"></div>
									<h3 class="popover-title"><?php echo JText::_( 'JSN_MOBILIZE_LOAD_STYLE' );?></h3>

									<div class="popover-content">
										<div id="profile-style-list" class="jsn-columns-container jsn-columns-count-three"></div>
									</div>
								</div>
							</div>
							<div id="container-custom-css-hide" class="hide"><ul id="custom-css-list-file"><?php
								if ( ! empty( $this->_dataDesign[ 'mobilize-custom-css-files' ] ) ) {
									foreach ( $this->_dataDesign[ 'mobilize-custom-css-files' ] as $file ) {
										echo '<li class="jsn-item ui-state-default" ><label class="checkbox"><input type="hidden" value="' . $file . '" name="mobilize_custom_css_files[]">' . $file . '</label></li>';
									}
								}
								?></ul><input type="hidden" name="mobilize_custom_css_code" id="custom-css-code"></div>
							<div class="jsn-bootstrap" id="container-custom-css">
								<!-- CSS files -->
								<div class="control-group jsn-items-list-container ig-modal-content">
									<label class="control-label"><?php echo JText::_( 'JSN_MOBILIZE_CUSTOM_CSS_FILES' );?>
										<i data-title="<?php echo JText::_( 'JSN_MOBILIZE_DATA_TITLE_CUSTOM_CSS_FILES' );?>" class="jsn-tipsy icon-question-sign" original-title=""></i></label>

									<div class="controls">
										<div class="jsn-buttonbar">
											<button class="btn btn-small" id="items-list-edit">
												<i class="icon-pencil"></i>Edit
											</button>
											<button class="btn btn-small btn-primary hide" id="items-list-save">
												<i class="icon-ok"></i>Done
											</button>
										</div>
										<ul class="jsn-items-list ui-sortable css-files-container">
											<?php
											if ( ! empty( $this->_dataDesign[ 'mobilize-custom-css-files' ] ) ) {
												foreach ( $this->_dataDesign[ 'mobilize-custom-css-files' ] as $file ) {
													echo '<li class="jsn-item ui-state-default" ><label class="checkbox"><input type="hidden" value="' . $file . '" name="mobilize_custom_css_files[]">' . $file . '</label></li>';
												}
											}
											?>
										</ul>
										<div class="items-list-edit-content hide">
											<textarea rows="5" class="jsn-input-xxlarge-fluid"></textarea></div>
									</div>
								</div>
								<!-- Custom CSS code -->
								<div class="control-group jsn-items-list-container ig-modal-content">
									<label class="control-label"><?php echo JText::_( 'JSN_MOBILIZE_CUSTOM_CSS_CODE' );?>
										<i data-title="<?php echo JText::_( 'JSN_MOBILIZE_DATA_TITLE_CUSTOM_CSS_CODE' );?>" class="jsn-tipsy icon-question-sign" original-title=""></i></label>

									<div class="controls">
										<textarea rows="10" class="jsn-input-xxlarge-fluid css-code"  id="custom-css"><?php echo isset( $this->_dataDesign['mobilize-custom-css-code'] ) ? $this->_dataDesign['mobilize-custom-css-code'] : '';?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="container-fluid">
						<div class="jsn-mobilize-settings">
							<div id="mobilize" class="jsn-sortable">
								<div class="jsn-pane jsn-bgpattern pattern-sidebar">
									<div class="mobilize-title jsn-section-header">
										<h1>
											<?php echo JText::_( 'JSN_MOBILIZE_TITLE_TABLET' ); ?>
										</h1>

										<div class="jsn-page-actions jsn-buttonbar">
											<button class="btn mobilize-preview" text-disable="<?php echo JText::_( 'JSN_MOBILIZE_BTN_DISABLE_PREVIEW' ); ?>" text-enable="<?php echo JText::_( 'JSN_MOBILIZE_BTN_ENABLE_PREVIEW' ); ?>">
												<i class="icon-eye-open"></i><?php echo JText::_( 'JSN_MOBILIZE_BTN_ENABLE_PREVIEW' ); ?>
											</button>
											</a>
										</div>
									</div>
									<div id="mobilize-design" class="jsn-section-content">
										<div id="jsn-mobilize" class="jsn-layout">
											<div class="jsn-row-container row-fluid">
												<div id="jsn-menu" class="jsn-column-container clearafter">
													<ul class="mobilize-menu nav nav-pills jsn-mainmenu jsn-iconbar-trigger pull-left">
														<?php echo $this->_JSNMobilize->getItemsMenuIcon( 'mobilize-menu', 'JSN_MOBILIZE_MENU', 'text', 'icon-list-alt', $this->_styleIcon ); ?>
													</ul>
													<ul class="mobilize-menu nav nav-pills jsn-sidetool pull-right">
														<?php echo $this->_JSNMobilize->getItemsMenuIcon( 'mobilize-search', 'JSN_MOBILIZE_MENU_SEARCH', 'text', 'icon-search', $this->_styleIcon ); ?>
														<?php echo $this->_JSNMobilize->getItemsMenuIcon( 'mobilize-login', 'JSN_MOBILIZE_MENU_LOGIN', 'text', 'icon-user', $this->_styleIcon ); ?>
													</ul>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="menu" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleMenu = ! empty( $this->_style->jsn_menu ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_menu ) : $this->_style->jsn_menu : ''; ?>
													<input type="hidden" id="input_style_jsn_menu" class="jsn-input-style" name="style[jsn_menu]" value='<?php echo  htmlentities( $styleMenu );?>' />
												</div>
											</div>
											<div class="jsn-row-container row-fluid">
												<div id="jsn-logo" class="jsn-column-container clearafter">
													<div class="jsn-iconbar-trigger">
														<?php echo $this->_JSNMobilize->getItemsLogo( 'mobilize-logo', 'JSN_MOBILIZE_SELECT_LOGO' ); ?>
													</div>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="logo" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleLogo = ! empty( $this->_style->jsn_logo ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_logo ) : $this->_style->jsn_logo : ''; ?>
													<input type="hidden" id="input_style_jsn_logo" class="jsn-input-style" name="style[jsn_logo]" value='<?php echo  htmlentities( $styleLogo );?>' />
												</div>
											</div>
											<div class="jsn-row-container row-fluid">
												<div id="jsn-mobile-tool" class="jsn-column-container clearafter">
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-mobile-tool-left", "span6" ); ?>
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-mobile-tool-right", "span6" ); ?>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="module" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleTool = ! empty( $this->_style->jsn_mobile_tool ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_mobile_tool ) : $this->_style->jsn_mobile_tool : ''; ?>
													<input type="hidden" id="input_style_jsn_mobile_tool" class="jsn-input-style" name="style[jsn_mobile_tool]" value='<?php echo  htmlentities( $styleTool );?>' />
												</div>
											</div>

											<div class="jsn-row-container row-fluid">
												<div id="jsn-content-top" class="jsn-column-container clearafter">
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-content-top-left", "span6" ); ?>
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-content-top-right", "span6" ); ?>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="module" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleContentTop = ! empty( $this->_style->jsn_content_top ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_content_top ) : $this->_style->jsn_content_top : ''; ?>
													<input type="hidden" id="input_style_jsn_content_top" class="jsn-input-style" name="style[jsn_content_top]" value='<?php echo  htmlentities( $styleContentTop );?>' />
												</div>
											</div>
											<div class="jsn-row-container row-fluid">
												<div id="jsn-user-top" class="jsn-column-container clearafter">
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-user-top-left", "span6" ); ?>
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-user-top-right", "span6" ); ?>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="module" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleUserTop = ! empty( $this->_style->jsn_user_top ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_user_top ) : $this->_style->jsn_user_top : ''; ?>
													<input type="hidden" id="input_style_jsn_user_top" class="jsn-input-style" name="style[jsn_user_top]" value='<?php echo  htmlentities( $styleUserTop );?>' />
												</div>
											</div>
											<div class="jsn-row-container row-fluid">
												<div id="jsn-mainbody" class="jsn-column-container clearafter">
													<h2><?php echo JText::_( 'JSN_MOBILIZE_COMPONENT_OUTPUT_GO_HERE' ); ?></h2>

													<p>
														Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rutrum convallis ligula. Duis vehicula convallis velit nec sodales. Nulla facilisi. Phasellus non malesuada velit, vel dignissim enim.
													</p>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="mainbody" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleMainBody = ! empty( $this->_style->jsn_mainbody ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_mainbody ) : $this->_style->jsn_mainbody : ''; ?>
													<input type="hidden" id="input_style_jsn_mainbody" class="jsn-input-style" name="style[jsn_mainbody]" value='<?php echo  htmlentities( $styleMainBody );?>' />
												</div>
											</div>

											<div class="jsn-row-container row-fluid">
												<div id="jsn-user-bottom" class="jsn-column-container clearafter">
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-user-bottom-left", "span6" ); ?>
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-user-bottom-right", "span6" ); ?>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="module" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleUserBottom = ! empty( $this->_style->jsn_user_bottom ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_user_bottom ) : $this->_style->jsn_user_bottom : ''; ?>
													<input type="hidden" id="input_style_jsn_user_bottom" class="jsn-input-style" name="style[jsn_user_bottom]" value='<?php echo  htmlentities( $styleUserBottom );?>' />
												</div>
											</div>
											<div class="jsn-row-container row-fluid">

												<div id="jsn-content-bottom" class="jsn-column-container clearafter">
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-content-bottom-left", "span6" ); ?>
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-content-bottom-right", "span6" ); ?>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="module" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleContentBottom = ! empty( $this->_style->jsn_content_bottom ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_content_bottom ) : $this->_style->jsn_content_bottom : ''; ?>
													<input type="hidden" id="input_style_jsn_content_bottom" class="jsn-input-style" name="style[jsn_content_bottom]" value='<?php echo  htmlentities( $styleContentBottom );?>' />
												</div>
											</div>
											<div class="jsn-row-container row-fluid">
												<div id="jsn-footer" class="jsn-column-container clearafter" style="<?php echo isset( $this->_styleContainer[ "jsn_footer" ] ) ? implode( "; ", $this->_styleContainer[ "jsn_footer" ] ) : "";?>">
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-footer-left", "span6" ); ?>
													<?php echo $this->_JSNMobilize->getBlockContent( "mobilize-footer-right", "span6" ); ?>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="module" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleFooter = ! empty( $this->_style->jsn_footer ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_footer ) : $this->_style->jsn_footer : ''; ?>
													<input type="hidden" id="input_style_jsn_footer" class="jsn-input-style" name="style[jsn_footer]" value='<?php echo  htmlentities( $styleFooter );?>' />
												</div>
											</div>
											<div class="jsn-row-container row-fluid">
												<div id="jsn-switcher" class="jsn-column-container clearafter">
													<?php echo $this->_JSNMobilize->getItemsMenuIcon( 'mobilize-switcher', 'JSN_MOBILIZE_SWITCHER', '' ); ?>
												</div>
												<div class="jsn-iconbar jsn-vertical">
													<a data-action="switcher" title="<?php echo jText::_( 'JSN_MOBILIZE_EDIT_STYLE' );?>" href="javascript:void(0);"><i class="icon-pencil"></i></a>
													<?php $styleSwitcher = ! empty( $this->_style->jsn_switcher ) ? ( get_magic_quotes_gpc() == true || get_magic_quotes_runtime() == true ) ? stripslashes( $this->_style->jsn_switcher ) : $this->_style->jsn_switcher : ''; ?>
													<input type="hidden" id="input_style_jsn_switcher" class="jsn-input-style" name="style[jsn_switcher]" value='<?php echo  htmlentities( $styleSwitcher );?>' />
												</div>
											</div>
											<?php
											if ( strtolower( $edition ) == "free" ) {
												?>
												<div class="jsn-iconbar-trigger">
													<div class="jsn-text-center">
														<a target="_blank" href="http://www.joomlashine.com/joomla-extensions/jsn-mobilize.html">Mobile Joomla Display</a> by
														<a target="_blank" href="http://www.joomlashine.com">JoomlaShine</a>
													</div>
													<div class="jsn-iconbar">
														<a class="element-delete" title="Delete footer coppyright" onclick="return false;" href="#"><i class="icon-trash"></i></a>
													</div>
												</div>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<input type="hidden" name="option" value="com_mobilize" />
<input type="hidden" name="task" value="" />
<?php echo JHtml::_( 'form.token' ); ?>
</form>
</div>
<?php
if ( JFactory::getApplication()->input->getVar( 'tmpl', '' ) != 'component' ) {
	JSNHtmlGenerate::footer();
}
