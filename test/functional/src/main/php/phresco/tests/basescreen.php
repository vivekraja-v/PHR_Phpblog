<?php /*
 * ###
 * PHR_PhpBlog
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
<?php 
/*	Author by {phresco} QA Automation Team	*/

      
  //LoginDetails 
  define ('PHP_LOGIN_LINK',"login");
  define ('PHP_LOGIN_UNAME_TBOX',"//input[@id='adminEmail']");
  define ('PHP_LOGIN_PASS_TBOX', "//input[@id='adminPassword']");
  define ('PHP_LOGIN_SUBMIT',"//input[@name='Submit']");
  define ('PHP_LOGIN_MSG',"Welcome");
  
  //LogoutDetails
  define ('PHP_LOGOUT_LINK',"logout");
  define ('PHP_TXT_LOGOUT',"Logout");
  define ('PHP_LOGOUT_CONFIRM',"Login");
  
  
  //RegisterDetails  
  define ('PHP_REG_LINK',"Register");
  define ('PHP_REG_UNAME_TBOX',"//input[@id='userName']");
  define ('PHP_REG_EMAIL_TBOX', "//input[@id='userEmail']");
  define ('PHP_REG_PASS_TBOX', "//input[@id='userPassword']");
  define ('PHP_REG_SUBMIT',"//input[@name='Submit']");
  define ('PHP_REG_MSG',"Your registration was successful, Now you can login ");
  
  
  //UpdateAccount
  define ('PHP_UPDATE_LINK',"Dashboard");
  define ('PHP_UPDATE_LINK1',"Myaccount");
  define ('PHP_UPDATE_UNAME',"//input[@id='userName']");
  define ('PHP_UPDATE_EMAIL',"//input[@id='userEmail']");
  define ('PHP_UPDATE_PASS',"//input[@id='userPassword']");
  define ('PHP_UPDATE_STATUS',"//input[@name='userStatus']");
  define ('PHP_UPDATE_SUBMIT',"//input[@name='Submit']");
  define ('PHP_UPDATE_MSG',"Account has been updated successfully");
  define ('PHP_UPDATE_LOGOFF',"Logoff");
  
  //SearchBarDetails
  define ('PHP_SEARCH_LINK',"//input[@id='searchTerm']");
  define ('PHP_SEARCHIN_AREAS',"//form[@id='search']/div[3]/select");
  define ('PHP_SEARCH_AREA',"Both");
  define ('PHP_SEARCH_BUTT', "//input[@name='Submit']");
  define ('PHP_SEARCH_ICON', "Topics");
  
  //Dashboard Add Category
  define ('PHP_DBCAT_LINK',"Dashboard");
  define ('PHP_DBCAT_LINK1',"Categories");
  define ('PHP_DBCAT_LINK2',"//a[contains(text(),'Add')]");
  define ('PHP_DBCAT_CATNAME',"//input[@id='catTitle']");
  define ('PHP_DBCAT_CATDEC',"//textarea[@id='catDesc']");
  define ('PHP_DBCAT_SUBMIT',"//input[@name='Submit']");
  define ('PHP_DBCAT_MSG',"Category has been added successfully.");
  
  //Add dashBoard topics
  define ('PHP_DBOARD_LINK',"Dashboard");
  define ('PHP_DBOARD_LINK1',"//a[contains(text(),'Add')]");
  define ('PHP_DBOARD_CNAME',"//select[@id='catID']");
  define ('PHP_DBOARD_TOPIC',"Cell phone");
  define ('PHP_DBOARD_TTITLE',"//input[@id='topicTitle']");
  define ('PHP_DBOARD_TTEXT',"//textarea[@id='topicText']");
  define ('PHP_DBOARD_SBUTT', "//form[@id='posts']/input[3]");
  define ('PHP_DBOARD_LOGOFF', "Logoff");
  define ('PHP_DBOARD_MSG', "Topic has been added successfully.");
  
  //DashboardCategory EditTopic
  define ('PHP_DBCATEDIT_LINK',"Dashboard");
  define ('PHP_DBCATEDIT_LINK1',"Categories");
  define ('PHP_DBCATEDIT_LINK2',"//a[contains(text(),'Edit')]");
  define ('PHP_DBCATEDIT_CATNAME',"//input[@id='catTitle']");
  define ('PHP_DBCATEDIT_CATDEC',"//textarea[@id='catDesc']");
  define ('PHP_DBCATEDIT_SUBMIT',"//input[@name='Submit']");
  define ('PHP_DBCATEDIT_MSG',"Category has been updated successfully");
  define ('PHP_DBCATEDIT_LOGOFF', "Logoff");
   
   //DashBoard EditTopic
  define ('PHP_DBEDIT_LINK',"Dashboard");
  define ('PHP_DBEDIT_EDIT',"//form[@id='posts']/div[12]/a");
  define ('PHP_DBEDIT_CNAME',"//select[@id='catID']");
  define ('PHP_DBEDIT_TOPIC',"Cell phone");
  define ('PHP_DBEDIT_TTITLE',"//input[@id='topicTitle']");
  define ('PHP_DBEDIT_TTEXT',"//textarea[@id='topicText']");
  define ('PHP_DBEDIT_SBUTT',"//form[@id='posts']/input[3]");
  define ('PHP_DBEDIT_MSG',"Topic has been updated successfully");
  define ('PHP_DBEDIT_LOGOFF', "Logoff");
    
  //DashboardDeleteTopic
  define ('PHP_DBDELETE_LINK',"Dashboard");
  define ('PHP_DBDELETE_DEL',"//a[contains(text(),'Delete')]");
  define ('PHP_DBDELETE_MSG',"Topic has been removed successfully ");
  define ('PHP_DBDELETE_LOGOFF', "Logoff");
  
  
  //DashboardDeleteCategory
  define ('PHP_DBCATDELETE_LINK',"Dashboard");
  define ('PHP_DBCATDELETE_LINK1',"Categories");
  define ('PHP_DBCATDELETE_LINK2',"//div[7]/a[2]");
  define ('PHP_DBCATDELETE_MSG',"Category has been removed successfully");
  define ('PHP_DBCATDELETE_LOGOFF', "Logoff");
  ?>