					PoundCake Control Panel

	Requirements:
	
1. CakePHP 1.2
2. MySQL
3. PHP 5


	Steps for the new CakePHP istallation

1. Make sure the directory app/tmp/ and its subdirectories are writable (assign 777 permission to them).
2. Change the value of 'Security.salt' in app/config/core.php to a salt value specific to your application.
3. Create a database if it has not been created yet.
4. Rename the database configuration file config/database.php.default to config/database.php
5. Configure the default database settings in config/database.php.


	Steps for the plugin installation
	
1. Create mysql tables and initial data using plugins/bcp/config/sql/bcp.sql file.

2. Extract archive and copy the files to plugins directory.

3. Add DatabaseMenus component in your AppController, f. ex.:
"public $components = array('Acl', 'Auth', 'Security', 'Bcp.DatabaseMenus');"
(To use plugin layouts add 'Bcp.Layouts' to the components array.)

4. Add DatabaseMenus helper in your AppController, f. ex.:
"$helpers = array('Bcp.DatabaseMenus');"

5. Create or modify beforeFilter function in your AppController:
function beforeFilter(){
	//Configure AuthComponent
	$this->Auth->authError = __('You do not have permission to access the page you just selected.', true);
	$this->Auth->loginAction = array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'login');
	$this->Auth->logoutRedirect = array('plugin' => 'bcp', 'controller' => 'users', 'action' => 'login');
	$this->Auth->loginRedirect = array('plugin' => '', 'controller' => 'pages', 'action' => 'index');
}

6. Include main menu to your layout:
"<div id="bcpMainMenuContainer"><?php echo $databaseMenus->makeMenu($mainMenu); ?></div>"

7. Add login, logout and change passwords links to your layout if necessary:
"<div><?php echo $databaseMenus->auth_links(); ?></div>"

8. Include plugin stylesheets to your layout before you stylesheet:
"echo $html->css(array('/bcp/css/css_menu', '/bcp/css/bcp'));"

9. Include extra menu to your layout:
"<div class="bcp_act"><?php echo $databaseMenus->makeMenu($extraMenu, 'extra'); ?></div>"

10. Add following code to your layout just after your flash message. This would enable multiple messages.
if($messages = $session->read('Message.multiFlash')){
	foreach($messages as $k => $v){
		$session->flash('multiFlash.'.$k);
	}
}

11. Add authorization error message to your layout if necessary:
"$session->flash('auth');"

	